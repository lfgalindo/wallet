<?php

namespace App\Services\Transaction;

use Illuminate\Support\Facades\DB;
use App\Services\Authorization\Contracts\AuthorizationService;
use App\Services\Notification\Contracts\NotificationService;
use App\Services\Transaction\Contracts\TransactionService as TransactionServiceContract;
use App\Repositories\Contracts\{
    TransactionRepository, 
    UserRepository, 
    WalletRepository
};
use Exception;
use Throwable;

class TransactionService implements TransactionServiceContract 
{
    private $transactionRepository;
    private $userRepository;
    private $walletRepository;
    private $authorizationService;
    private $notificationService;

    public function __construct (
        TransactionRepository $transactionRepository,
        UserRepository $userRepository,
        WalletRepository $walletRepository,
        AuthorizationService $authorizationService,
        NotificationService $notificationService
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
        $this->authorizationService = $authorizationService;
        $this->notificationService = $notificationService;
    }

    public function validateTransaction(array $dataTransaction): array
    {
        $payer = $this->userRepository->getUserByIdWithWallet($dataTransaction['payer']);

        if (!$payer->canSendMoney()) {
            throw new Exception('Você não pode enviar dinheiro!', 400);
        }

        $payee = $this->userRepository->getUserByIdWithWallet($dataTransaction['payee']);

        return $this->performTransaction($payer, $payee, $dataTransaction['value']);
    }

    private function performTransaction($payer, $payee, float $value): array
    {
        $transaction = $this->transactionRepository->begin($payer->id, $payee->id, $value);

        DB::beginTransaction();

        try {

            if (!$this->authorizationService->authorizeTransaction()) {
                throw new Exception('Essa transação não foi autorizada', 401);
            }

            if (!$this->walletRepository->chargeIfHasSufficientBalance($payer->wallet, $value)) {
                throw new Exception('Você não possui saldo suficiente!', 400);
            }

            $this->walletRepository->addCredit($payee->wallet, $value);

            $this->notificationService->send();

            DB::commit();

            return [
                'resource' => $this->transactionRepository->endWithSuccess($transaction),
                'message' => 'Dinheiro enviado com sucesso!',
                'code' => 201
            ];
        } catch (Throwable $exception) {
            DB::rollback();

            return [
                'resource' => $this->transactionRepository->endWithError($transaction),
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ];
        }
    }
}

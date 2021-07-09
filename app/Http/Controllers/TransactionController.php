<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionStoreRequest;
use App\Services\Transaction\Contracts\TransactionService;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct (TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function store(TransactionStoreRequest $request)
    {
        try {
            $transaction = $this->transactionService->validateTransaction($request->input());

            return response()->json([
                'resource' => $transaction
            ], 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }
}

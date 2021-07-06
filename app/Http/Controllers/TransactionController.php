<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionStoreRequest;

class TransactionController extends Controller
{
    public function store(TransactionStoreRequest $request)
    {
        try {
            $transaction = $request->input();

            return response()->json([
                'resource' => $transaction
            ], 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }
}

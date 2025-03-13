<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'assistance_id' => 'required|exists:assistances,id',
            'address_id' => 'required|exists:addresses,id',
            'schedule_id' => 'required|exists:schedules,id',
            'document_upload_id' => 'required|exists:document_uploads,id',
        ]);

        // Create transaction
        $transaction = Transactions::create($validated);

        return response()->json(['message' => 'Transaction created successfully', 'transaction' => $transaction], 201);
    }
}

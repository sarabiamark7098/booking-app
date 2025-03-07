<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BeneficiaryDatas;
use Illuminate\Http\Request;

class BeneficiaryDatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function preliminaryStore(Request $request, BeneficiaryDatas $beneficiaryData )
    {
        $validated = $request->validate([
            "firstName" => "string|required",
            "middleName" => "string|nullable",
            "lastName" => "string|required",
            "extensionName" => "string|nullable",
            "contactNumber" => "string|required",
            "email" => "string|required|email|unique:users,email",
        ]);
        try {
            DB::beginTransaction();
    
            $user = User::create([
                'name' => $request->firstName,
                'email' => $request->email,
            ]);
    
            BeneficiaryDatas::create([
                'user_id' => $user->id,
                'firstName' => $request->firstName,
                'middleName' => $request->middleName,
                'lastName' => $request->lastName,
                'extensionName' => $request->extensionName,
                'contactNumber' => $request->contactNumber,
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Beneficiary and User created successfully'
            ], 201);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function secondaryStore(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        "email" => "required|email|exists:beneficiary_datas,email", // Ensure email exists
        "sex" => "required",
        "date_of_birth" => "date|required",
        "occupation" => "string|nullable",
        "salary" => "integer|nullable",
        "status_report" => "string|nullable"
    ]);

    // Find the existing user by email
    $profile = BeneficiaryDatas::where('email', $validated['email'])->first();

    if (!$profile) {
        return response()->json([
            'success' => false,
            'message' => 'User not found.'
        ], 404);
    }

    // Update the existing record
    $profile->update([
        "sex" => $validated['sex'],
        "date_of_birth" => $validated['date_of_birth'],
        "occupation" => $validated['occupation'],
        "salary" => $validated['salary'],
        "status_report" => $validated['status_report']
    ]);

    return response()->json([
        'success' => true,
        'message' => 'User information updated successfully.',
        'user' => $profile,
    ], 200);
}

    /**
     * Display the specified resource.
     */
    public function show(BeneficiaryDatas $beneficiaryDatas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeneficiaryDatas $beneficiaryDatas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeneficiaryDatas $beneficiaryDatas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeneficiaryDatas $beneficiaryDatas)
    {
        //
    }
}

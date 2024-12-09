<?php

namespace App\Http\Controllers;

use App\Models\BeneficiaryData;
use Illuminate\Http\Request;

class BeneficiaryDataController extends Controller
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
    public function store(Request $request, BeneficiaryData $beneficiaryData )
    {
        $validated = $request->validate([
            "first_name" => "string|required",
            "middle_name" => "string",
            "last_name" => "string|required",
            "ext_name" => "string",
            "sex" => "required",
            "date_of_birth" => "date|required",
            "occupation" => "string",
            "salary" => "integer",
            "contact_number" => "string|required",
            "status_report" => "string"
        ]);
        $profile = BeneficiaryData::create([
            $first_name = $request->first_name,
            $middle_name = $request->middle_name,
            $last_name = $request->last_name,
            $ext_name = $request->ext_name
        ]);
        
        return response()->json([
            'success' => true,
            'user' => $profile,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BeneficiaryData $beneficiaryData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeneficiaryData $beneficiaryData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeneficiaryData $beneficiaryData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeneficiaryData $beneficiaryData)
    {
        //
    }
}

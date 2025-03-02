<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeneficiaryDatasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResource('beneficiary-data', BeneficiaryDatasController::class)
// ->middleware('check.beneficiary');
Route::post('/client/preliminary', [BeneficiaryDatasController::class,'preliminaryStore']);
Route::post('/client/secondary', [BeneficiaryDatasController::class,'secondaryStore']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/auth/token', [AuthController::class,'index']);

// Route::post("/register", AuthController::class, "store")->name("registerclient");
// Route::patch("/client/update/{id}", AuthController::class, "update")->name("updateclient");
// Route::get("/client/{id}", AuthController::class, "show")->name("clientdetails");
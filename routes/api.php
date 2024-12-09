<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/auth/token', [AuthController::class,'index']);
Route::post("/register", AuthController::class, "store")->name("registerclient");
// Route::patch("/client/update/{id}", AuthController::class, "update")->name("updateclient");
// Route::get("/client/{id}", AuthController::class, "show")->name("clientdetails");
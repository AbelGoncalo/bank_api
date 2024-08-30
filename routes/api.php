<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return [
        'sucess'=>'Api Bank Wallet'
    ];
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::prefix('auth')->group(function(){
    Route::post('register',[AuthenticationController::class,'register']);
});


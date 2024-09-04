<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/students',[StudentController::class,'index']);
Route::post('/students',[StudentController::class,'store']);
Route::get('/students/{id}',[StudentController::class,'show']);
Route::delete('/students/{id}',[StudentController::class,'destroy']);
Route::put('/students/{id}',[StudentController::class,'update']);




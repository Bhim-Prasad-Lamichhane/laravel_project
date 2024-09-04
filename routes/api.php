<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/students',[StudentController::class,'index']);
// Route::post('/students',[StudentController::class,'store']);
// Route::get('/students/{id}',[StudentController::class,'show']);
// Route::delete('/students/{id}',[StudentController::class,'destroy']);
// Route::put('/students/{id}',[StudentController::class,'update']);

// Route::get('/students/search/query',[StudentController::class,'search']);



// In above route we can see that StudentController is used in every route so we can optimise this way by grouping StudentController::class
Route::controller(StudentController::class)->group(function(){

    Route::get('/students','index');
    Route::post('/students','store');
    Route::get('/students/{id}','show');
    Route::delete('/students/{id}','destroy');
    Route::put('/students/{id}','update');
    
    Route::get('/students/search/query','search');
});
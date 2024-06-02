<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
    http method:
        -get
        -post
        -put/patch
        -delete
*/

Route::middleware(['auth'])->group(function(){

    Route::get("/",[StudentController::class,'index']);
    Route::get("/add",[StudentController::class,'openAdd']);
    Route::post("/add",[StudentController::class,'add']);
    Route::get("/view",[StudentController::class,'View']);
    Route::get('/update/{id}',[StudentController::class,'openUpdate']);
    Route::put('/update',[StudentController::class,'update']);
    Route::delete('/delete',[StudentController::class,'delete']);
    Route::get('/search',[StudentController::class,'search']);


    Route::get('/logout',[UserController::class,'openlogout']);
    Route::post('/logout',[UserController::class,'logout']);
});




Route::get('/login',[UserController::class,'openLogin'])->name('login');
Route::post('/login',[UserController::class,'login']);
Route::get('/register',[UserController::class,'openRegister']);
Route::post('/register',[UserController::class,'register']);


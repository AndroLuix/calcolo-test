<?php

use App\Http\Controllers\KXPOController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/',[KXPOController::class,'submit']);
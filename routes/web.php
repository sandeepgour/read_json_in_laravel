<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadJsonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('json', [ReadJsonController::class,'index']);



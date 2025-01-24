<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;

//dd('In API Route Above');

Route::get('one-post' , [UserController::class , 'singlePost']);

Route::get('user-data' , [CountryController::class , 'allDataAboutUser']);

//dd('In API Route Below');

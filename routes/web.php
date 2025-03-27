<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\DalelController; // Importing the DalelController
use App\Http\Controllers\Auth\LoginController; // Importing the LoginController
use App\Http\Controllers\ChartOfAccountController; // Importing the ChartOfAccountController

Route::resource('entries', EntryController::class);
Route::get('chart-of-accounts', [ChartOfAccountController::class, 'show'])->name('accounts.chart');
Route::resource('accounts', ChartOfAccountController::class);
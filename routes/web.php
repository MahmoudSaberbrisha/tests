<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;

// Add your routes here
Route::resource('entries', EntryController::class);
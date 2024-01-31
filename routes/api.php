<?php

use App\Http\Controllers\Api\PopulationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('state/population-records/{state:slug}', [PopulationController::class, 'populationRecords']);
Route::get('state/population-records/{state:slug}/avg', [PopulationController::class, 'populationRecordsAvg']);

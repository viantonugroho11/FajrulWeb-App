<?php

use App\Http\Controllers\Api\Sertifikat\SertifikatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['throttle:none']], function ($router) {
    //sertifikat api
    Route::post('/py/certificate/store', [SertifikatController::class, 'store']);
    Route::post('/py/certificate/update/{id}', [SertifikatController::class, 'update']);
});

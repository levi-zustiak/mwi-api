<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Controller;
use App\Models\Content;
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

/**
 * Content
 */
Route::apiResource('content', ContentController::class);

/**
 * Contact
 */
Route::apiResource('contact', ContactController::class);

// Route::get('content', function() {
// 	return Content::all();
// });
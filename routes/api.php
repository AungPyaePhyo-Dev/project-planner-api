<?php

use App\Http\Controllers\ProjectController;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






Route::get('project', [ProjectController::class, 'index']);
Route::post('project', [ProjectController::class, 'store']);
Route::get('project/{id}', [ProjectController::class, 'show']);
Route::patch('project/{id}', [ProjectController::class, 'update']);
Route::delete('project/{id}', [ProjectController::class, 'destroy']);


// Route::apiResource('/project', ProjectController::class);


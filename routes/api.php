<?php

use App\Http\Controllers\Api\{
    CourseController,
    LessonController,
    ModuleController,
    SupportController,
};
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

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lessons/{id}', [LessonController::class, 'show']);


Route::get('/supports', [SupportController::class, 'index']);

Route::post('/supports{id}', [SupportController::class, 'createReply']);

Route::get('/', function(){
    return response()->json([
        'sucess' => true
    ]);
});

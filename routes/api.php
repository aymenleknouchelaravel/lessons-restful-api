<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RelationshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Lesson;



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


Route::group(['prefix' => '/v1'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('lessons', LessonController::class);

    Route::get('users/{id}/lessons', [RelationshipController::class, 'user_lessons']);
    Route::get('lessons/{id}/tags', [RelationshipController::class, 'lesson_tags']);
    Route::get('tags/{id}/lessons', [RelationshipController::class, 'tag_lessons']);

    // Route::redirect('lesson', 'lessons');

    Route::any(
        'lesson',
        function () {
            $message = "this is message";
            return Response::json([
                'data' => $message,
                'link' => url('documentation/api'),
            ], 404);
        }
    );
});

// Route::group(['prefix' => '/v2'], function () {

// });

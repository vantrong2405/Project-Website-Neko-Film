<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorRelController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeRelController;
use App\Http\Controllers\UpFileController;
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

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'movie'], function () {
        Route::post('/create', [MovieController::class, 'store']);
        Route::post('/delete', [MovieController::class, 'destroy']);
        Route::post('/update', [MovieController::class, 'update']);
        Route::post('/get-data', [MovieController::class, 'data']);
        Route::post('/get-one-movie', [MovieController::class, 'dataOneMovie']);
        Route::post('/get-detail', [MovieController::class, 'dataDetail']);
    });
    Route::group(['prefix' => 'language'], function () {
        Route::post('/create', [LanguageController::class, 'store']);
        Route::post('/delete', [LanguageController::class, 'destroy']);
        Route::post('/update', [LanguageController::class, 'update']);
        Route::post('/get-data', [LanguageController::class, 'data']);
    });
    Route::group(['prefix' => 'episode'], function () {
        Route::post('/create', [EpisodeController::class, 'store']);
        Route::post('/delete', [EpisodeController::class, 'destroy']);
        Route::post('/update', [EpisodeController::class, 'update']);
        Route::post('/get-data', [EpisodeController::class, 'data']);
        Route::post('/get-ep', [EpisodeController::class, 'getDataEpisode']);
    });
    Route::group(['prefix' => 'author'], function () {
        Route::post('/create', [AuthorController::class, 'store']);
        Route::post('/delete', [AuthorController::class, 'destroy']);
        Route::post('/update', [AuthorController::class, 'update']);
        Route::post('/get-data', [AuthorController::class, 'data']);
    });
    Route::group(['prefix' => 'country'], function () {
        Route::post('/create', [CountryController::class, 'store']);
        Route::post('/delete', [CountryController::class, 'destroy']);
        Route::post('/update', [CountryController::class, 'update']);
        Route::post('/get-data', [CountryController::class, 'data']);
    });
    Route::group(['prefix' => 'type'], function () {
        Route::post('/create', [TypeController::class, 'store']);
        Route::post('/delete', [TypeController::class, 'destroy']);
        Route::post('/update', [TypeController::class, 'update']);
        Route::post('/get-data', [TypeController::class, 'data']);
        Route::post('/search', [TypeController::class, 'search']);
    });
    Route::group(['prefix' => 'client'], function () {
        Route::post('/create', [ClientController::class, 'store']);
        Route::post('/delete', [ClientController::class, 'destroy']);
        Route::post('/update', [ClientController::class, 'update']);
        Route::post('/get-data', [ClientController::class, 'data']);
        Route::post('/login', [ClientController::class, 'login']);
        Route::post('/check-token', [ClientController::class, 'check']);
        Route::post('/get-data-user', [ClientController::class, 'getDataUser']);
        Route::post('/update-data-user', [ClientController::class, 'updateDataUser']);
        Route::post('/change-pass-user', [ClientController::class, 'changePass']);
    });
    Route::group(['prefix' => 'employee'], function () {
        Route::post('/create', [EmployeeController::class, 'store']);
        Route::post('/delete', [EmployeeController::class, 'destroy']);
        Route::post('/update', [EmployeeController::class, 'update']);
        Route::post('/get-data', [EmployeeController::class, 'data']);
        Route::post('/login', [EmployeeController::class, 'login']);
        Route::post('/check-token', [EmployeeController::class, 'check']);
    });

    Route::group(['prefix' => 'actor-rel'], function () {
        Route::post('/create', [ActorRelController::class, 'store']);
        Route::post('/delete', [ActorRelController::class, 'destroy']);
        Route::post('/update', [ActorRelController::class, 'update']);
        Route::post('/get-data', [ActorRelController::class, 'data']);
        Route::post('/get-data-choosed', [ActorRelController::class, 'dataChoosed']);
    });
    Route::group(['prefix' => 'actor'], function () {
        Route::post('/create', [ActorController::class, 'store']);
        Route::post('/delete', [ActorController::class, 'destroy']);
        Route::post('/update', [ActorController::class, 'update']);
        Route::post('/get-data', [ActorController::class, 'data']);
        Route::post('/search', [ActorController::class, 'search']);
    });
    // Route::group(['prefix' => 'favourite'], function () {
    //     Route::post('/create', [FavouritesController::class, 'store']);
    //     Route::post('/delete', [FavouritesController::class, 'destroy']);
    //     Route::post('/update', [FavouritesController::class, 'update']);
    //     Route::post('/get-data', [FavouritesController::class, 'data']);
    // });
    Route::group(['prefix' => 'type-rel'], function () {
        Route::post('/create', [TypeRelController::class, 'store']);
        Route::post('/delete', [TypeRelController::class, 'destroy']);
        Route::post('/update', [TypeRelController::class, 'update']);
        Route::post('/get-data', [TypeRelController::class, 'data']);
        Route::post('/get-data-choosed', [TypeRelController::class, 'dataChoosed']);
    });

    Route::post('/up-file', [UpFileController::class, 'upFile']);
});

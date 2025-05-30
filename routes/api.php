<?php

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


Route::post('/forms/feedback', [App\Http\Controllers\Site\FormController::class, 'feedback']);
Route::post('/forms/buy', [App\Http\Controllers\Site\FormController::class, 'buy']);
Route::post('/forms/presentation', [App\Http\Controllers\Site\FormController::class, 'presentation']);
Route::get('/presentation/download/{file}', [App\Http\Controllers\Site\FileController::class, 'downloadPresentation']);
Route::get('/faq', [App\Http\Controllers\Site\FaqController::class, 'index']);
Route::get('/download/{file}',  [App\Http\Controllers\Site\UserMemoController::class, 'download'])->name('downloadFile');


Route::middleware(['auth.ips'])->group(function(){
    Route::prefix('auth')->group(function () {

        Route::post('login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);

        Route::middleware(['auth:jwt/login'])->group(function(){
            Route::post('tfa',[App\Http\Controllers\Admin\Auth\TFAController::class, 'check'])->name('api.admin.auth.tfa');
            Route::get('tfa/forgot',[App\Http\Controllers\Admin\Auth\TFAController::class, 'forgot']);
        });

        Route::middleware(['auth:jwt/refresh'])->group(function(){
            Route::post('refresh-tokens',[App\Http\Controllers\Admin\Auth\LoginController::class, 'refresh'])->name('api.admin.auth.refresh');
        });

        Route::middleware(['auth:jwt/base'])->group(function(){
            Route::post('logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout']);
        });

    });

    Route::middleware(['auth:jwt/base'])->group(function(){


        //News
        Route::get('news', [App\Http\Controllers\Admin\NewsController::class, 'index']);
        Route::get('news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'edit']);
        Route::post('news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'update']);
        Route::delete('news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'destroy']);
        Route::post('news', [App\Http\Controllers\Admin\NewsController::class, 'store']);


//        Route::get('prices', [App\Http\Controllers\Admin\PriceController::class, 'index']);
//        Route::get('prices/{id}', [App\Http\Controllers\Admin\Store\PriceController::class, 'edit']);
//        Route::post('prices/{id}', [App\Http\Controllers\Admin\Store\PriceController::class, 'update']);
//        Route::delete('prices/{id}', [App\Http\Controllers\Admin\Store\PriceController::class, 'destroy']);
//        Route::post('prices', [App\Http\Controllers\Admin\Store\PriceController::class, 'store']);


        Route::get('videos', [App\Http\Controllers\Admin\VideoController::class, 'index']);
        Route::get('videos/{id}', [App\Http\Controllers\Admin\VideoController::class, 'edit']);
        Route::post('videos/{id}', [App\Http\Controllers\Admin\VideoController::class, 'update']);
        Route::delete('videos/{id}', [App\Http\Controllers\Admin\VideoController::class, 'destroy']);
        Route::post('videos', [App\Http\Controllers\Admin\VideoController::class, 'store']);

        Route::get('faqs', [App\Http\Controllers\Admin\FaqController::class, 'index']);
        Route::get('faqs/{id}', [App\Http\Controllers\Admin\FaqController::class, 'edit']);
        Route::post('faqs/{id}', [App\Http\Controllers\Admin\FaqController::class, 'update']);
        Route::delete('faqs/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy']);
        Route::post('faqs', [App\Http\Controllers\Admin\FaqController::class, 'store']);

        Route::get('users/memos/types', [App\Http\Controllers\Admin\UserMemo\TypeController::class, 'index']);
        Route::get('users/memos/types/{id}', [App\Http\Controllers\Admin\UserMemo\TypeController::class, 'edit']);
        Route::post('users/memos/types/{id}', [App\Http\Controllers\Admin\UserMemo\TypeController::class, 'update']);
        Route::delete('users/memos/types/{id}', [App\Http\Controllers\Admin\UserMemo\TypeController::class, 'destroy']);
        Route::post('users/memos/types', [App\Http\Controllers\Admin\UserMemo\TypeController::class, 'store']);

        Route::get('users/memos', [App\Http\Controllers\Admin\UserMemo\UserMemoController::class, 'index']);
        Route::get('users/memos/{id}', [App\Http\Controllers\Admin\UserMemo\UserMemoController::class, 'edit']);
        Route::post('users/memos/{id}', [App\Http\Controllers\Admin\UserMemo\UserMemoController::class, 'update']);
        Route::delete('users/memos/{id}', [App\Http\Controllers\Admin\UserMemo\UserMemoController::class, 'destroy']);
        Route::post('users/memos', [App\Http\Controllers\Admin\UserMemo\UserMemoController::class, 'store']);


        Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
        Route::get('users/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
        Route::post('users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
        Route::delete('users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
        Route::post('users', [App\Http\Controllers\Admin\UserController::class, 'store']);

        Route::get('roles', [App\Http\Controllers\Admin\RoleController::class, 'index']);
        Route::get('roles/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit']);
        Route::post('roles/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update']);
        Route::delete('roles/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy']);
        Route::post('roles', [App\Http\Controllers\Admin\RoleController::class, 'store']);

        Route::get('resources', [App\Http\Controllers\Admin\ResourceController::class, 'index']);


        //Support service
        Route::get('files', [App\Http\Controllers\Admin\FileController::class, 'index']);
        Route::get('files/{id}',[App\Http\Controllers\Admin\FileController::class, 'show']);
        Route::delete('files/{id}', [App\Http\Controllers\Admin\FileController::class, 'destroy']);
        Route::post('files',[App\Http\Controllers\Admin\FileController::class, 'store']);

        Route::get('images', [App\Http\Controllers\Admin\ImageController::class, 'index']);
        Route::get('images/{id}',[App\Http\Controllers\Admin\ImageController::class, 'show']);
        Route::delete('images/{id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy']);
        Route::post('images',[App\Http\Controllers\Admin\ImageController::class, 'store']);

        Route::get('account/menus',[App\Http\Controllers\Admin\MenuController::class, 'index']);
        Route::post('account/password',[App\Http\Controllers\Admin\AccountController::class, 'password']);
        Route::post('account/email',[App\Http\Controllers\Admin\AccountController::class, 'email']);
        Route::get('account',[App\Http\Controllers\Admin\AccountController::class, 'index']);

    });

});

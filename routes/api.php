<?php

use App\Http\Controllers\Api\AvatarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/initials', [AvatarController::class, 'initials']);

Route::get('/hello', function(){
    $reesponse =  Http::dd('http://avatary.test/api/initials');

    ddd($reesponse);
});
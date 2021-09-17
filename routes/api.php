<?php

use App\Service\ColorPicker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AvatarController;
use App\Services\AvatarGenerator;
use App\Services\Initials;

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


Route::get('/initials', [AvatarController::class, 'initials'])->name('generateInitials');

Route::get('/hello', function () {
    // $reesponse =  Http::dd('http://avatary.test/api/initials');

    // ddd($reesponse);
    // $omg = new AvatarGenerator(name:"hello", background_color:"fafafa");
    // return $omg->generateColor();

    return Initials::generate('مرحبا بالعالم');
});

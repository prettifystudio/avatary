<?php

use App\Models\User;
use App\Services\Initials;
use ArPHP\I18N\Arabic;
use Illuminate\Support\Facades\Route;
use AtmCode\ArPhpLaravel\ArPhpLaravel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function(){

    return hello();
});


function makeInitialsFromSingleWord(string $name) : string
{
    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
        return mb_substr(implode('', $capitals[1]), 0, 2, 'utf-8');
    }
    return strtoupper(substr($name, 0, 2));
}


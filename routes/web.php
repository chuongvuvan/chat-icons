<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/detect', function () {
    $string = Emoji\Detect\replace_emoji('I like 🌮 and 👵🤴🤴💁🙍💆💇💇', ':', ':');
    echo $string;
});
Auth::routes();

Route::get('/', 'AppController@index')->middleware('auth');

Route::get('/messages', 'MessageController@index')->middleware('auth');

Route::post('/messages', 'MessageController@store')->middleware('auth');

Route::get('/{any}', 'AppController@index')->where('any', '.*')->middleware('auth'); // catch all routes or else it will return 404 with Vue router in history mode


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'chat', 'as' => 'chat.', 'middleware' => ['auth']], function () {
    Route::get('/', 'ChatController@index')->name('index');
    Route::get('rooms', 'ChatController@rooms')->name('rooms');
    Route::get('/{room_id}/messages', 'ChatController@messages')->name('messages');
    Route::post('/{room_id}/new-message', 'ChatController@newChatMessage')->name('newMessage');
    Route::delete('/{chat_id}', 'ChatController@chatDelete')->name('chatDelete');
    Route::delete('/{chat_id}/file/{file_id}', 'ChatController@deleteSingleFile')->name('deleteSingleFile');
});

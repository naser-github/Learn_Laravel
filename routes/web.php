<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


 
// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => '/'],function(){

    Route::get('/', 'App\Http\Controllers\HomesController@func_homepage')->name('homepage');
    Route::get('/trending_places', 'App\Http\Controllers\HomesController@func_trending_places')->name('trending');
    Route::get('/blog', 'App\Http\Controllers\HomesController@func_blog')->name('blog');

});

Route::get('/table', 'App\Http\Controllers\PersonsController@see')->name('table');


Route::group(['prefix' => '/data'], function(){
    
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('create');
    Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('store');
    
    Route::get('show', 'App\Http\Controllers\CategoryController@show')->name('show');
    
    Route::get('edit/{name}', 'App\Http\Controllers\CategoryController@edit')->name('edit')->where(['id'=>'[0-9]+'] );
    Route::patch('edit/{name}', 'App\Http\Controllers\CategoryController@update')->name('update');

    Route::delete('delete/{delete}', 'App\Http\Controllers\CategoryController@delete')->name('delete');
}); 

Route::group(['prefix'=>'relation'], function(){
    Route::get('show','App\Http\Controllers\PostController@show')->name('relations');
    Route::get('more/{id}','App\Http\Controllers\PostController@more')->name('more');
});

Route::group(['prefix'=>'inventors'],function(){
    Route::get('create','App\Http\Controllers\InventorsController@create')->name('i_create');
    Route::post('store','App\Http\Controllers\InventorsController@store')->name('i_store');

    Route::get('edit/{id}','App\Http\Controllers\InventorsController@edit')->name('i_edit');
    Route::patch('edit/{id}','App\Http\Controllers\InventorsController@update')->name('i_update');    
    
    Route::get('show','App\Http\Controllers\InventorsController@show')->name('i_show');
    Route::get('profile/{id}','App\Http\Controllers\InventorsController@profile')->name('i_profile');
    Route::delete('delete/{id}','App\Http\Controllers\InventorsController@delete')->name('i_delete');
});

Route::group(['prefix'=>'author'],function(){

    Route::get('create','App\Http\Controllers\AuthorsController@create')->name('a_create');
    Route::post('store','App\Http\Controllers\AuthorsController@store')->name('a_store');
    Route::get('show','App\Http\Controllers\AuthorsController@show')->name('a_show');
});

Route::group(['prefix'=>'book'],function(){

    Route::get('create','App\Http\Controllers\BooksController@create')->name('b_create');
    Route::post('store','App\Http\Controllers\BooksController@store')->name('b_store');
    
    Route::get('show','App\Http\Controllers\BooksController@show')->name('b_show');
    
    Route::get('edit/{id}','App\Http\Controllers\BooksController@edit')->name('b_edit');
    Route::patch('edit/{id}','App\Http\Controllers\BooksController@update')->name('b_update');
});

Route::get('/sendmail', 'App\Http\Controllers\MailController@sendmail')->name('sendmail');
Route::post('/sendmail', 'App\Http\Controllers\MailController@sending')->name('sending');

Route::get('/fileup', 'App\Http\Controllers\FileUpController@upload')->name('upload_file');
Route::post('/fileup', 'App\Http\Controllers\FileUpController@store')->name('uploaded_file');

Route::group(['prefix'=>'upload_image'],function(){
    
    Route::get('/create', 'App\Http\Controllers\Upload_imageController@create')->name('upload_create');
    Route::post('/store', 'App\Http\Controllers\Upload_imageController@store')->name('upload_sending');

    Route::get('/images', 'App\Http\Controllers\Upload_imageController@image')->name('upload_images');
    
});

Route::resource('/Upload_Video', 'App\Http\Controllers\Upload_VideoController');

Route::resource('Upload_Post', 'App\Http\Controllers\UpPostController');

Route::post('/Upload_Video/{id}/comment', 'App\Http\Controllers\CommentController@video')->name('video_comment');

Route::post('/Upload_Post/{id}/comment', 'App\Http\Controllers\CommentController@post')->name('post_comment');

Route::get('/comments','App\Http\Controllers\CommentController@index')->name('comment_table');

Route::resource('/tags', 'App\Http\Controllers\TagController');

Route::get('/login/e','App\Http\Controllers\LoginController@create')->name('login')->middleware('auth');
Route::post('/login/e','App\Http\Controllers\LoginController@index')->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



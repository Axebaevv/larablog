<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 | routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BlogsController@index');
// Route::view('sample', 'sample');
// Route::view('example', 'example');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Blogs
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');
Route::get('/blogs/{slug}', 'BlogsController@show')->name('blogs.show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
Route::delete('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');
// Keep Trashed Routes Here
Route::get('/blogs/index/trash', 'BlogsController@trash')->name('blogs.trash');
Route::get('/blogs/blogs/trash/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
Route::delete('/blogs/blogs/trash/{id}/permanentDelete', 'BlogsController@permanentDelete')->name('blogs.permanentDelete');
//End Keep Trashed Routes Here
// End Blogs

// ADMIN ROUTES
Route::get('/dashboard', 'AdminController@index')->name('dashboard'); //->middleware(['admin', 'auth']);
// how to work middleware with routes
Route::get('/admin/blogs', 'AdminController@blogs')->name('admin.blogs'); //->middleware(['admin', 'auth']);

Route::get('/admin/users', 'UserController@index')->name('admin.users');
Route::patch('/admin/users/{id}/update', 'UserController@update')->name('admin.users.update');
Route::delete('/admin/users/{id}/delete', 'UserController@destroy')->name('admin.users.delete');
// Author Of Blogs
Route::get('/author/{name}', 'UserController@show')->name('users.show');
// --END Author Of Blogs
// END ADMIN ROUTES

// --START Route Resources Category
Route::resource('categories', 'CategoryController');
Route::get('/categories/index/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/categories/trash/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::delete(
    '/categories/trash/{id}/permanentDelete',
    'CategoryController@permanentDelete'
)->name('categories.permanentDelete');
// --END Route Resources

// File Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// --END File Manager
Route::get('tiny', function () {
    return view('experiment.tinymce');
});

// Mail
Route::get('contact', 'MailController@contact')->name('contact');
Route::post('contact/send', 'MailController@send')->name('mail.send');
// --END Mail

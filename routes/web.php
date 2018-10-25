<?php

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

Route::name("api.")->prefix("api/")->group(function (){
    Route::post("role/remove", "RolesController@remove")->name("role.remove");
    Route::post("role/add", "RolesController@add")->name("role.add");
    Route::post("permission/remove", "Permissions@remove")->name("permission.remove");
    Route::post("permission/add", "Permissions@add")->name("permission.add");
});

Route::name("article.")->group(function (){
    Route::get("/search", "ArticleController@search")->name("search");
});

Route::name("forum.")->prefix("forum")->group(function (){

});

Route::name("admin.")->prefix("admin/")->group(function(){
        Route::get("/users", "AdminController@users")->name("users");
        Route::get("/users/search", "AdminController@usersSearch")->name("users.search");
});

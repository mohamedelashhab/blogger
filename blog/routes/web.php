<?php

use App\models\Page;
use App\models\Menu;


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {


    Route::get('index',function(){
        return view("dashboard.index");
    })->name('index');


    // user
    Route::get('Userslist','Dashboard\UserController@list')->name('users.list');
    Route::get('users','Dashboard\UserController@index')->name('users.index');
    Route::get('users/{user}/show','Dashboard\UserController@show')->name('users.show');
    Route::get('users/create','Dashboard\UserController@create')->name('users.create');
    Route::post('users/store','Dashboard\UserController@store')->name('users.store');
    Route::get('users/{user}/edit','Dashboard\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update','Dashboard\UserController@update')->name('users.update');
    Route::delete('users/{user}/delete','Dashboard\UserController@destroy')->name('users.delete');
    // end user

    // post
    Route::get('Postslist','Dashboard\PostController@list')->name('posts.list');
    Route::get('posts','Dashboard\PostController@index')->name('posts.index');
    Route::get('posts/{post}/show','Dashboard\PostController@show')->name('posts.show');
    Route::get('posts/create','Dashboard\PostController@create')->name('posts.create');
    Route::post('posts/store','Dashboard\PostController@store')->name('posts.store');
    Route::get('posts/{post}/edit','Dashboard\PostController@edit')->name('posts.edit');
    Route::put('posts/{post}/update','Dashboard\PostController@update')->name('posts.update');
    Route::delete('posts/{post}/delete','Dashboard\PostController@destroy')->name('posts.delete');
    // end post

    // page
    Route::get('Pageslist','Dashboard\PageController@list')->name('pages.list');
    Route::get('pages','Dashboard\PageController@index')->name('pages.index');
    Route::get('pages/{page}/show','Dashboard\PageController@show')->name('pages.show');
    Route::get('pages/create','Dashboard\PageController@create')->name('pages.create');
    Route::post('pages/store','Dashboard\PageController@store')->name('pages.store');
    Route::get('pages/{page}/edit','Dashboard\PageController@edit')->name('pages.edit');
    Route::put('pages/{page}/update','Dashboard\PageController@update')->name('pages.update');
    Route::delete('pages/{page}/delete','Dashboard\PageController@destroy')->name('pages.delete');
    // end page

    // menu
    Route::get('Menuslist','Dashboard\MenuController@list')->name('menus.list');
    Route::get('menus','Dashboard\MenuController@index')->name('menus.index');
    Route::get('menus/{menu}/show','Dashboard\MenuController@show')->name('menus.show');
    Route::get('menus/create','Dashboard\MenuController@create')->name('menus.create');
    Route::post('menus/store','Dashboard\MenuController@store')->name('menus.store');
    Route::get('menus/{menu}/edit','Dashboard\MenuController@edit')->name('menus.edit');
    Route::put('menus/{menu}/update','Dashboard\MenuController@update')->name('menus.update');
    Route::delete('menus/{menu}/delete','Dashboard\MenuController@destroy')->name('menus.delete');
    // end menu


    // settings
    Route::get("settings/site", 'Dashboard\SettingController@site')->name("settings.site");
    Route::post("settings/site/post", 'Dashboard\SettingController@postSetting')->name("settings.post");
    //end settings

    });

    Route::group(['prefix' => '', 'as' => 'posts.'], function () {
        Route::get('posts/','Frontend\PostController@index')->name('index');
        Route::get('posts/{post}','Frontend\PostController@show')->name('show');
    });

    Route::get('/', function () {
        return redirect()->route('posts.index');
    })->name('home');

    Route::get('frontend/{custome}', function ($custome) {
        $page = Page::where('slug', '=',$custome)->firstOrFail();  
        $body = $page->description;
        return view("frontend.custome", ["body"=>$body]);
    })->name('custome');

    // Route::get('/welcome/menus', function () {
    //     $menus = Menu::all();
    //     return view("welcome", ["menus" => $menus]);
    // });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

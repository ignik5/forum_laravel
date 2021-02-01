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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/message', 'messageController@message')->name('message');
Route::get('/dia/{name}', 'diaController@show')->name('show');
Route::get('/dia', 'diacontroller@index')->name('dia');

route::group([

    'middleware'=>['auth']
    
    ],function(){
Route::match(['get', 'post'],'/create', 'diacontroller@create')->name('create');
      }  );
route::match(['get', 'post'], '/profile', 'profilecontroller@update')->name('updateprofile');
route::get('/userid/{user}', 'profilecontroller@userid')->name('userid');





route::group([
    'prefix'=>'admin',
    'namespace'=>'admin',
    'as'=>'admin.',
    'middleware'=>['auth','is_admin']
    
    ],function(){
        
    
    //Route::get('/','Newscontroller@index')->name('index');
    //Route::match(['get','post'], '/createnews','Newscontroller@createnews')->name('createnews');
    //Route::get( '/edit/{news}','Newscontroller@edit')->name('edit');
    //Route::post( '/update/{news}','Newscontroller@update')->name('update');
    //Route::get( '/destroy/{news}','Newscontroller@destroy')->name('destroy');
    Route::get('/users','userscontroller@index')->name('updateuser');
    Route::get('/users/toggleAdmin/{user}','userscontroller@toggleAdmin')->name('toggleAdmin');
   
    
    
    
    Route::resource('/dia', 'Temacontroller')->except('show');
 

    
    });
    Route::get('/clear','cache@index', function(){
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
    })->name('clear');
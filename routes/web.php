<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/demoroute',function(){
    return view('first');
});


// Route::view('/first','first');
//When you only need to return a view without any extra logic. you can use single  line Route...here first value is route and second value is filename

Route::get('/demoroute/second',function(){
    return view('second');
})->name('demo');
//name is used to define the route's name


Route::get('/post/{id?}',function(string $id =null){

    if ($id){
        return view('post', ['id' => $id]);
    }
    else{
        return "<h1>No ID found...</h1>";
    }
})->whereNumber('id');
//this validate that the id must be numeric

Route::redirect("/damage",'/');
//this redirects the /damage route to home route.




Route::prefix('news')->group(function(){
    Route::get('/sports', function () {
        return view('news.sports'); //news.sports means inside sports file is inside news directory
    })->name('sports');
    
    
    Route::get('/international',function(){
        return view('news.international');
    })->name('international');

    Route::get('/national',function(){
        return view('news.national');
    })->name('national');
    
});

//when no routes matches them use fall back method..
Route::fallback(function(){
    return view('error.404'); //error.404 means there is 404 blade file inside error directory 
});
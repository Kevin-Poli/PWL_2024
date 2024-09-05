<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/hello', function () {
//     return 'Hello World';
// });

Route::get('/world',function (){
    return 'World';
});

Route::get('/selamat',function (){
    return 'Selamat Datang';
});

// Route::get('/about',function (){
//     return '2241760125 Kevin Arullah Herdiansyah';
// });

Route::get('/user/{name}', function ($name) { 
    return 'Nama Saya '.$name; 
    }); 

Route::get('/posts/{post}/comments/{comments}',function ($postId,$commentId){
return 'Pos ke-'.$postId."Komentar ke-: ".$commentId;
});

Route::get('/articles/{articles}/id/{id}' ,function($id,$articles){
    return 'Halaman Artikel ke - '.$articles."Id ke - ".$id;
});

// Route::get('/user/{name?}',function($name=null){
//     return 'Nama Saya'.$name;
// });

Route::get('/user/{name?}',function($name='mpin'){
    return 'Nama Saya '.$name;
});

Route::get('hello', [WelcomeController::class,'hello']);

Route::get('index', [HomeController::class,'index']);
Route::get('about', [AboutController::class,'about']);
Route::get('articles/id/{id}', [ArticleController::class,'dinamis']);

Route::resource('photos', PhotoController::class)->only([ 'index', 'show' ]); 
Route::resource('photos', PhotoController::class)->except([ 'create', 'store', 'update', 'destroy' ]);

// Route::get('/greeting',function(){
//     return view('blog.hello',['name'=>'Mpin']);
// });

Route::get('/greeting',[WelcomeController::class,'greeting']);
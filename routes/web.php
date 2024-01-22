<?php

use App\Http\Controllers\HomeController;
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
Route::get('/public', function () {

    return "Hello World";
});

//Home page
Route::get('/post', function () {

    return view('post');
});

//Articles
Route::get('/post2', function() {
    return view('post2');
});

Route::get('post/{post2}', function($slug) {
    $path = __DIR__ . "/../resources/post2/{$slug}.html";

    if (! file_exists($path)){
        //return redirect('post');
        dd('file does not exist');
        //abort(404);
    }

    $post2 = file_get_contents($path);

    return view('post2', [
        'post2' => $post2
    ]);
});

/*
Route::get('post/{post2}', function ($slug) {

    $path = __DIR__ ."/../resources/post2/{$slug}.html";

    if (! file_exists($path)){
        return redirect('post');
        //dd('file does not exist');
        //abort(404);
    }

    $post2 = file_get_contents($path);

    return view('post2', [
        'post2' => $post2
    ]);

});




*/
// Using the index() method in the HomeController class
Route::get('/', [HomeController::class, 'index']); // PREFERRED WAY

// Not using any controllers, instead returning the view directly from the router file
/*
 *
 Route::get("/post", function () {
    return view("post");
});

*/

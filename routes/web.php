<?php

use App\Http\Controllers\HomeController;
use App\Models\Post2;
use Illuminate\Support\Facades\Route;
//Blade Project
use App\Http\Controllers\FormController;


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
//Route::get('/post2', function() {
//   return view('post2');
// });

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





//Home page
/*
Route::get('/post', function () {
   // $post = Post2::all();

   // ddd($post);

  /*  $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($path) (
        resource_path('post2/my-fourth-post.html')
    );

    ddd($document);
    */
   // return view('post', [
     //   'post' => Post2::all()
   // ]);

// });




/*Route::get('post/{post2}', function($slug) {
    $post2 = Post2::find( $slug);

    return view('post2', [
        'post2' => Post2::find($slug)
    ]);
})->where('post2', '[A-z_\-]+');




    if (! file_exists($path =  __DIR__ . "/../resources/post2/{$slug}.html")) {
        return redirect('post');
        //ddd('file does not exist');
        //abort(404);
    }

    $post2 = cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));

    return view('post2', ['post2' => $post2]);

})->where('post2', '[A-z_\-]+');


// Using the index() method in the HomeController class
Route::get('/', [HomeController::class, 'index']); // PREFERRED WAY

// Not using any controllers, instead returning the view directly from the router file
/*

 Route::get("/post", function () {
    return view("post"); // $post2 || '<h1>Hello World</h1>'
});
*/


//Blade Project

//MOVIES
// Create
Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
// Home
Route::get('/', [FormController::class, 'index'])->name('home');
// Show Form
Route::get('/form/{id}', [FormController::class, 'show'])->name('form'); // Add search option and 1- display each
// Submit Form
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
// Edit
Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
// Update
Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
// Delete
Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');
//Search
Route::get('/search', [FormController::class, 'search'])->name('search');
//Show Details
Route::get('/movie/{id}', [FormController::class, 'showDetails'])->name('details');







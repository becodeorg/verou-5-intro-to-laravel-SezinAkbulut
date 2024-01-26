<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post2
{
    public static function all()
    {
        $files = File::files(resource_path("post2/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {

       // base_path();
        if (! file_exists($path =  resource_path("post2/{$slug}.html"))) {
           // return redirect('posts');
            //ddd('file does not exist');
            //abort(404);
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'movies';

    // Define the primary key for the model
    protected $primaryKey = 'id';

    // Define the fillable attributes for the model
    protected $fillable = ['title', 'description'];

    // Timestamps
    public $timestamps = true;
}

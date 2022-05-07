<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $fillable=[
        'name',
        'author',
        'published_date',
        'publisher',
        'info'
    ];
}

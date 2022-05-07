<?php

namespace App\Models;

use App\Models\Traits\BookFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, BookFilter;

    public $fillable=[
        'name',
        'author',
        'published_date',
        'publisher',
        'info'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const MEMBER = 2;
    
    public $fillable = [
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

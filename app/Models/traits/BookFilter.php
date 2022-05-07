<?php

namespace App\Models\Traits;

use App\Models\Book;
use App\Models\Filters\Date;
use App\Models\Filters\Name;
use Illuminate\Database\Eloquent\Builder;

trait BookFilter {
    static $filters = [
        'name' => Name::class,
        'date' => Date::class
    ];

    public static function filter($requestFilters){
        $builder = Book::query();

        foreach($requestFilters as $key => $value)
        {   
            if(!isset(self::$filters[$key]) || !$value) continue;
            $builder = self::$filters[$key]::apply($builder, $value);
        }

        return $builder;
    }
}
<?php

namespace App\Models\Filters;

use Illuminate\Database\Eloquent\Builder;

class Name {
    public static function apply(Builder $builder, $value)
    {
        if(!$value)
            return $builder;

        return $builder->where('name', 'like', "%{$value}%");
    }
}
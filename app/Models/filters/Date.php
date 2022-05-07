<?php

namespace App\Models\Filters;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Date {
    const FIVE_YEARS_AGO = 5;
    const TEN_YEARS_AGO = 10;


    public static function apply(Builder $builder, $value)
    {
        $rawDate = DB::raw('date(published_date)');
        if($value == 1)
             $builder->where($rawDate, Carbon::now()->subYears(self::FIVE_YEARS_AGO)->toDateString());
        
        if($value == 2)
             $builder->where($rawDate,  Carbon::now()->subYears(self::TEN_YEARS_AGO)->toDateString());

        if($value == 3)
             $builder->where($rawDate, '<', Carbon::now()->subYears(self::TEN_YEARS_AGO)->toDateString());

        return $builder;
    }
}
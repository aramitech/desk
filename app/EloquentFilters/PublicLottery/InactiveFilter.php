<?php

namespace App\EloquentFilters\PublicLottery;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class InactiveFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('company_id','!=',NULL);
        // if($value == 'on'){
        //     return $builder->whereDate('return_for_the_period_of', "<=", request()->get('from'))
        //         ->whereDate('return_for_the_period_to', ">=", request()->get('to'));
        // } else {
        //     return $builder->whereDate('return_for_the_period_of', ">=", request()->get('from'))
        //         ->whereDate('return_for_the_period_to', "<=", request()->get('to'));
        // }
    }
}
<?php

namespace App\EloquentFilters\Publicgamings;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class FromFilter extends Filter
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
        if(request()->get('inactive') == 'on')
        {
            return $builder->whereDate('return_for_the_period_of', "<", $value);
        }
        else{
            return $builder->whereDate('return_for_the_period_of', ">=", $value);
        }

    }
}
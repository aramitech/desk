<?php

namespace App\EloquentFilters\BookmarkersCompany;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class PaybillnoFilter extends Filter
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
        
        
      
  if($value == 'HavePayBill'){
            return $builder->where('paybillno', "!=", NULL);
        } else {
            return $builder->where('paybillno', NULL);
        }

    }
}
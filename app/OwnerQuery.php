<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;

class OwnerQuery extends Builder
{
    public function filterBy(QueryFilter $filters, array $data)
    {
        return $filters->applyTo($this,$data);
    }

}
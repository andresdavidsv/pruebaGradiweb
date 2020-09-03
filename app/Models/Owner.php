<?php

namespace App\Models;


use App\OwnerQuery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Owner extends Model
{
    use SoftDeletes;

    protected $fillable = ['doc_id',
                            'name',
                            'last_name',
                            'phone',
                            'avatarOwner'
                        ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new OwnerQuery($query);
    }

}

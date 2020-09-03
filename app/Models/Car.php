<?php

namespace App\Models;
use App\CarQuery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = ['plate',
                            'car_brand',
                            'car_config',
                            'owner_id',
                            'avatarCar'
                        ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new CarQuery($query);
    }
}

<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OwnerFilter extends QueryFilter
{
    protected $aliases = [
        'date' => 'created_at',
    ];

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'from' => 'date_format:d/m/Y',
            'to' => 'date_format:d/m/Y',
            'order' => 'in:doc_id,name,last_name,phone,created_at',
            'direction' => 'in:asc,desc',
        ];
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('name','like',"%{$search}%")
                    ->orWhere('doc_id','like',"%{$search}%")
                    ->orWhere('last_name','like',"%{$search}%")
                    ->orWhere('phone','like',"%{$search}%");

        });
    }

    public function from($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);

        $query->whereDate('created_at', '>=', $date);
    }

    public function to($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);

        $query->whereDate('created_at', '<=', $date);
    }

    public function order($query, $value)
    {
        if (Str::endsWith($value, '-desc')) {
            $query->orderByDesc($this->getColumnName(Str::substr($value, 0, -5)));
        } else {
            $query->orderBy($this->getColumnName($value));
        }
    }

    protected function getColumnName($alias)
    {
        return $this->aliases[$alias] ?? $alias;
    }
}
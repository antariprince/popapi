<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'collection_id',
        'number',
        'image',
        'shop',
        'average_value',
    ];

    public function collection()
    {
        return $this->hasOne('App\Collection', 'id');
    }
}
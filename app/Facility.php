<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function properties() {
        return $this->belongsToMany(Property::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'id',
        'property_type',
        'square_feet',
        'address'
    ];

    public function facilities() {
        return $this->hasMany(Facility::class);
    }

    public function contracts() {
        return $this->belongsToMany(Contract::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'id',
        'property_id',
        'owner_id',
        'tenant_id',
        'description',
        'start_date',
        'end_date'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function property() {
        return $this->hasOne(Property::class);
    }
}

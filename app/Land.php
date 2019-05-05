<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = [
        'electricity','size','tapwater','nearestSchool','nearestRailway','nearestBusStop'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }

    public function offers(){

        return $this->hasMany(Offer::class);

    }

    public function reportproperties(){

        return $this->hasMany(ReportProperty::class);

    }
}

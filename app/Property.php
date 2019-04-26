<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'latitude', 'longitude','type','amount','city','postalCode','province','description','images','availability','contactNo','contatctEmail'
    ];

    public function house(){

        return $this->belongsTo(House::class);

    }

    public function land(){

        return $this->belongsTo(Land::class);

    }

    public function building(){

        return $this->belongsTo(Building::class);

    }

    public function apartment(){

        return $this->belongsTo(Apartment::class);

    }

    public function user(){

        return $this->belongsTo(User::class);
        
    }
}

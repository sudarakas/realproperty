<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportProperty extends Model
{
    public function property(){

        return $this->belongsTo(Property::class);
        
    }
}

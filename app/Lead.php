<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    public function lead_phone(){
         return $this->belongsTo('App\Lead_phone','phone_id');
    }
}

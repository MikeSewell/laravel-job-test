<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead_phone extends Model
{
    public function leads(){
        return $this->hasOne('App\Lead');
    }
}

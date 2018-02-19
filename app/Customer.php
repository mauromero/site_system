<?php

namespace App;

class Customer extends Model
{
    public function assessments(){
        return $this->hasMany(Assessment::class, 'customer_id');
    }
}

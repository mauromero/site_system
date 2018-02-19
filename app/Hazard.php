<?php

namespace App;

class Hazard extends Model
{


    public function hazards_taks(){
        return $this->hasMany(hazard_task::class, 'hazard_id');
    }


}

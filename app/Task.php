<?php

namespace App;

class Task extends Model
{
    public function assessments(){
        return $this->belongsTo(Assessment::class);
    } 

    public function hazards_taks(){
        return $this->belongstoMany(hazard_task::class, 'hazard_id');
    }
}

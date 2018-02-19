<?php

namespace App;

class Task extends Model
{
    public function assessments(){
        return $this->belongsTo(Assessment::class);
    } 

    public function hazards(){
        return $this->belongsToMany(Hazard::class);
    }
}

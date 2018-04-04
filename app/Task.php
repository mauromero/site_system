<?php

namespace App;

class Task extends Model
{
    public function assessments(){
        return $this->belongsTo(Assessment::class);
    } 

    // public function hazards_taks(){
    //     return $this->belongstoMany(hazard_task::class);
    // }

    public function hazards(){
        return $this->belongsToMany(Task::class,'hazard_task', 'hazard_id');
    }

}

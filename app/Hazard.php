<?php

namespace App;

class Hazard extends Model
{


    // public function hazards_taks(){
    //     return $this->belongsToMany(hazard_task::class);
    // }
    public function taks(){
        return $this->belongsToMany(Task::class,'hazard_task', 'task_id');
    }


}
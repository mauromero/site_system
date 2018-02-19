<?php

namespace App;


class hazard_task extends Model
{
    public $table = "hazard_task";

    public function tasks(){
        return $this->belongsToMany(Task::class, 'task_id');
    }

    public function hazards(){
        return $this->belongsTo(Hazard::class, 'hazard_id');
    }
}

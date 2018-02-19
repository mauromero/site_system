<?php

namespace App;

class Hazard extends Model
{
    public function task(){
        return $this->belongsToMany(Task::class);
    }
}

<?php

namespace App;

class MedicalFacility extends Model
{
    public function assessments(){
        return $this->hasMany(Assessment::class,'medical_facility_id');
    }
}

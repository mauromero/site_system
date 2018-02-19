<?php

namespace App;

class Assessment extends Model
{
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medical_facility(){
        return $this->belongsTo(MedicalFacility::class,'medical_facility_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

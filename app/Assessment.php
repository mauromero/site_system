<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;

class Assessment extends Model
{
    use Sortable;
    public $sortable = ['job_number',
                        'submitted',
                        'user_id',
                        'created_at'];

   protected $dates = ['submitted_at','start_date','exp_date'];    

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

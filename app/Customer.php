<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use Sortable;
    public $sortable = ['company',
                        'name',
                        'last_name'];

    public function assessments(){
        return $this->hasMany(Assessment::class, 'customer_id');
    }
}
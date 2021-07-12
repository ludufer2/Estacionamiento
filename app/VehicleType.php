<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = "vehicle_types";

    protected $fillable = [
        'name','pay','rate_per_minute','payment_frequency_id'
    ];

    public function payment_frequency(){
        return $this->hasOne('App\PaymentFrequency','id','payment_frequency_id');
    }

    public function vehicles(){
        return $this->hasMany('App\Vehicle','vehicle_type_id','id');
    }
}

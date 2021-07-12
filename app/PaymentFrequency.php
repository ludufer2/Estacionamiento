<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentFrequency extends Model
{
    protected $table = "payment_frequencies";

    protected $fillable = [
        'name'
    ];

    public function vehicle_types(){
        return $this->hasMany('App\VehicleType','payment_frequency_id','id');
    }
}

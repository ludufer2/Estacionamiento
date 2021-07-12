<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = "vehicles";

    protected $fillable = [
        'vehicle_type_id','license_plate','restarted_on','minute_counter'
    ];

    public function vehicle_type(){
        return $this->hasOne('App\VehicleType','id','vehicle_type_id');
    }

    public function stays(){
        return $this->hasMany('App\Stay','vehicle_id','id');
    }
}

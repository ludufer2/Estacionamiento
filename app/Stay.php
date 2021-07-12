<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stay extends Model
{
    protected $table = "stays";

    protected $fillable = [
        'vehicle_id','start_date_time','end_date_time','total' 
    ];

    public function vehicle(){
        return $this->hasOne('App\Vehicle','id','vehicle_id');
    }
}

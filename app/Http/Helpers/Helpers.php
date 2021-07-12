<?php
use Carbon\Carbon;

function format_license_plate($license_plate){
    return strtoupper(str_replace(' ','',$license_plate));
}

function calculate_minutes($start_date_time, $end_date_time){
    $start_date_time = Carbon::parse($start_date_time);
    $end_date_time = Carbon::parse($end_date_time);

    return $difference = $start_date_time->diffInMinutes($end_date_time);
}

function calculate_price($minutes, $rate_per_minute){
    return $minutes * $rate_per_minute;
}
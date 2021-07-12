<?php

namespace App\Http\Controllers\API;

use App\Vehicle;
use App\Stay;
use App\PaymentFrequency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::with('vehicle_type','stays')->get();
        return response()->json($vehicle, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::with('vehicle_type','stays')->find(Vehicle::create($request->all())->id);
        return response()->json($vehicle, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return response()->json($vehicle, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json(null, 204);
    }

    public function reset_counters(){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $end_date_time = date("Y-m-d H:i:s");
        $vehicles = Vehicle::where('minute_counter','<>',0)->update(["minute_counter" => 0, "restarted_on" => $end_date_time]);
        return response()->json($vehicles, 200);
    }

    public function reset_counter(Vehicle $vehicle){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $end_date_time = date("Y-m-d H:i:s");
        $vehicle->update(["minute_counter" => 0, "restarted_on" => $end_date_time]);
        return response()->json($vehicle, 200);
    }

    public function generate_payment_report(Request $request){
        $paymentfrequency = PaymentFrequency::with('vehicle_types','vehicle_types.vehicles')->find(2);
        return response()->json($paymentfrequency, 200);
    }
}

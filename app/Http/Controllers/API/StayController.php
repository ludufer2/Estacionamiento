<?php

namespace App\Http\Controllers\API;

use App\Stay;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $stay = Stay::with('vehicle', 'vehicle.vehicle_type')->get();
=======
        $stay = Stay::with('vehicle')->get();
>>>>>>> b8acb1704da1ca5d838300e887200515f0464ec2
        return response()->json($stay, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        // Busca el ID por la matricula, en caso que no exista o este actualmente en el estacionamiento devuelve error sino reserva el estacionamiento
        $vehicle = Vehicle::where('license_plate', format_license_plate($request->license_plate))->with('vehicle_type','stays')->first();
        if(!is_null($vehicle)){
            if($vehicle->stays->where('end_date_time',null)->count() == 0){
                $data = array(
                    'vehicle_id' => $vehicle->id,
                    'start_date_time' => date("Y-m-d H:i:s")
                );
                $stay = Stay::with('vehicle', 'vehicle.vehicle_type')->find(Stay::create($data)->id);
                return response()->json($stay, 201);
            }else{
                // Devuelve 403 en caso de que el recurso no este disponible
                return response()->json(array("error" => array("status" => "403")), 200);
            }
        }else{
            // Devuelve 404 en caso de que el recurso no se encuentre
            return response()->json(array("error" => array("status" => "404")), 200);
        }
        
=======
        $stay = Stay::create($request->all());
        return response()->json($stay, 201);
>>>>>>> b8acb1704da1ca5d838300e887200515f0464ec2
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function show(Stay $stay)
    {
        return response()->json($stay, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stay $stay)
    {
        $stay->update($request->all());
        return response()->json($stay, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stay $stay)
    {
        $stay->delete();
        return response()->json(null, 204);
<<<<<<< HEAD
    }

    public function stayCompleted()
    {
        $stay = Stay::where('end_date_time','<>', null)->with('vehicle','vehicle.vehicle_type')->get();
        return response()->json($stay, 200);
    }

    public function stayUncompleted()
    {
        $stay = Stay::where('end_date_time', null)->with('vehicle','vehicle.vehicle_type')->get();
        return response()->json($stay, 200);
    }

    public function end(Request $request, Stay $stay)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $end_date_time = date("Y-m-d H:i:s");
        if($stay->vehicle->vehicle_type->pay === 1){
            if($stay->vehicle->vehicle_type->payment_frequency_id === 1){
                $data = array(
                    'end_date_time' => $end_date_time,
                    'total' => calculate_minutes($stay->start_date_time,$end_date_time) * $stay->vehicle->vehicle_type->rate_per_minute
                );
            }else if($stay->vehicle->vehicle_type->payment_frequency_id === 2){
                $data = array(
                    'end_date_time' => $end_date_time
                );
                // Suma los minutos de la estadia que acaba de finalizar
                $stay->vehicle->update(['minute_counter' => $stay->vehicle->minute_counter + calculate_minutes($stay->start_date_time,$end_date_time)]);
            }
        }else{
            $data = array(
                'end_date_time' => $end_date_time
            );
        }
        $stay->update($data);
        $stay->minutes = calculate_minutes($stay->start_date_time,$end_date_time);
        return response()->json($stay, 200);
=======
>>>>>>> b8acb1704da1ca5d838300e887200515f0464ec2
    }
}

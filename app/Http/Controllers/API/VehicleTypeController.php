<?php

namespace App\Http\Controllers\API;

use App\VehicleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicletype = VehicleType::with('payment_frequency','vehicles')->get();
        return response()->json($vehicletype, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicletype = VehicleType::create($request->all());
        return response()->json($vehicletype, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicletype)
    {
<<<<<<< HEAD
        return response()->json($vehicletype, 200);
=======
        return response()->json($vehicleTypes, 200);
>>>>>>> b8acb1704da1ca5d838300e887200515f0464ec2
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleType $vehicletype)
    {
        $vehicletype->update($request->all());
        return response()->json($vehicletype, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleType $vehicletype)
    {
        $vehicletype->delete();
        return response()->json(null, 204);
    }
}

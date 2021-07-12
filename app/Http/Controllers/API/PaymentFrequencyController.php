<?php

namespace App\Http\Controllers\API;

use App\PaymentFrequency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentFrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentfrequency = PaymentFrequency::with('vehicle_types')->get();
        return response()->json($paymentfrequency, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentfrequency = PaymentFrequency::create($request->all());
        return response()->json($paymentfrequency, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentFrequency  $paymentFrequency
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentFrequency $paymentfrequency)
    {
        return response()->json($paymentfrequency, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentFrequency  $paymentFrequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentFrequency $paymentfrequency)
    {
        $paymentfrequency->update($request->all());
        return response()->json($paymentfrequency, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentFrequency  $paymentFrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentFrequency $paymentfrequency)
    {
        $paymentfrequency->delete();
        return response()->json(null, 204);
    }
}

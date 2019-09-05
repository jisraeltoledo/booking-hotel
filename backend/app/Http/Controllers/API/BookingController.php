<?php

namespace App\Http\Controllers\API;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_start' => 'required',
            'date_end' => 'required',
            'customer_fullname' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'total_nights' => 'required',
            'total_price' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson ();
        }
        $booking = Booking::create($request->all());
        return response()->json($booking, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return $booking;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return response()->json($booking, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(null, 204);
    }
}

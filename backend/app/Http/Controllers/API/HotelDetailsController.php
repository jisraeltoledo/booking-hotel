<?php

namespace App\Http\Controllers\API;

use App\HotelDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HotelDetails::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotelDetails = HotelDetails::create($request->all());
        return response ()->json ($hotelDetails, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelDetails  $hotelDetails
     * @return \Illuminate\Http\Response
     */
    public function show(HotelDetails $hotelDetail)
    {
        return $hotelDetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelDetails  $hotelDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelDetails $hotelDetail)
    {
        $hotelDetail->update($request->all ());        
        return response()->json ($hotelDetail, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelDetails  $hotelDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelDetails $hotelDetail)
    {
        $hotelDetail->delete ();
        return response()->json(null, 204);
    }
}

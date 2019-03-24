<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedules;
use Auth;
class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedules::all();
        return $schedules;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = array(
        array(
            'sellers_id' => Auth::user()->id,
            'day' => $request->day,
            'start_hour' => $request->start_hour,
            'finish_hour' => $request->finish_hour),
        array(
            'sellers_id' => Auth::user()->id,
            'day' => $request->day2,
            'start_hour' => $request->start_hour2,
            'finish_hour' => $request->finish_hour2),
        array(
            'sellers_id' => Auth::user()->id,
            'day' => $request->day3,
            'start_hour' => $request->start_hour3,  
            'finish_hour' => $request->finish_hour3),
        array(
            'sellers_id' => Auth::user()->id,
            'day' => $request->day4,
            'start_hour' => $request->start_hour4,  
            'finish_hour' => $request->finish_hour4),
        array(
            'sellers_id' => Auth::user()->id,
            'day' => $request->day5,
            'start_hour' => $request->start_hour5,  
            'finish_hour' => $request->finish_hour5),

        );
        Schedules::insert($data);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

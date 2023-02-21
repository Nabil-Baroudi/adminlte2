<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Appointment;
use App\Models\Time_slot;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Appointment::with('time')->orderBy('id', 'desc')->get();

        return view('home')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slot = [];
        return view('addAppointment', compact('slot'));
    }

    public function step1(Request $request)
    {
        $ids = Appointment::where('date', $request->date)->where('section', $request->section)->pluck('slot_id');
        $slot = Time_slot::whereNotIn('id', $ids)->get();
        return view('addAppointment')->with(['slot' => $slot, 'date' => $request->date, 'section' => $request->section]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $appointment = new Appointment();
        $appointment->patient = $request->patient;
        $appointment->section = $request->section2;
        $appointment->date = $request->date2;
        $appointment->slot_id = $request->time;

        $appointment->save();
        return view('addAppointment')->with(['successMsg' => 'New Appointment Added .']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Appointment::find($id);

        return view('certainAppointment', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $appointment = Appointment::find($id);
        $ids = Appointment::where('date', $request->date)->where('section', $request->section)->pluck('slot_id');
        $slot = Time_slot::whereNotIn('id', $ids)->get();
        return view('editAppointment')->with(['slot' => $slot, 'date' => $request->date, 'section' => $request->section, 'appointment' => $appointment]);
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
        $update = [
            "patient" => $request->patient,
            "section" => $request->section,
            "date" => $request->date,
            "slot_id" => $request->time,
        ];
        Appointment::where('id', $id)->update($update);
        $msg = "Appointment Updated .";
        return redirect("appointments/" . $id)->with('successMsg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        } else {
            Appointment::destroy($id);
            return redirect('appointments')->with('successMsg', 'Appointment Deleted !');
        }
    }
}

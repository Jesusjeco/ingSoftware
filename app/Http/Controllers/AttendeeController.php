<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;
use App\Person;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendees = Attendee::all();
        return view('attendees.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendees = Attendee::create($request->all());
        return redirect()->route('attendees.index')->with('status', 'attendees created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee $attendee)
    {
        return view('attendees.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        return view('attendees.edit', compact('attendee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        $attendee->fill($request->all());
        $attendee->save();
        return redirect()->route('attendees.index')->with('status', 'attendee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('attendees.index')->with('status', 'attendee destroyed!');
    }

    /**
     * Show the form for create a new person and add it to an event
     */
    public function create_attendee()
    {
        return view('attendees.create_attendee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_attendee(Request $request)
    {
        //return $request->all();

        $person_data = [
            "name" => $request->name,
            "last_name" => $request->last_name,
            "birthday" => $request->birthday,
            "address" => $request->address,
            "number" => $request->number,
            "email" => $request->email
        ];
        $person = Person::create($person_data);

        $attendee_data = [
            "person_id" => $person->id,
            "event_id" => $request->event_id
        ];
        $attendees = Attendee::create($attendee_data);
        return redirect()->route('attendees.index')->with('status', 'attendees created!');
    }
}

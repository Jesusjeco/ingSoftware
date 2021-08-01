<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AttendeePostRequest;
use App\Attendee;


class AttendeeController extends Controller
{

    public function index()
    {
        $attendees = Attendee::all();
        return view('attendees.index', compact('attendees'));
    }

    public function show(Request $request, Attendee $attendee)
    {
        return view('attendees.show', compact('attendee'));
    }

    public function create()
    {
        return view('attendees.create');
    }

    public function store(AttendeePostRequest $request)
    {
        $data = $request->validated();
        $attendee = Attendee::create($data);
        return redirect()->route('attendees.index')->with('status', 'Attendee created!');
    }

    public function edit(Request $request, Attendee $attendee)
    {
        return view('attendees.edit', compact('attendee'));
    }

    public function update(AttendeePostRequest $request, Attendee $attendee)
    {
        $data = $request->validated();
        $attendee->fill($data);
        $attendee->save();
        return redirect()->route('attendees.index')->with('status', 'Attendee updated!');
    }

    public function destroy(Request $request, Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('attendees.index')->with('status', 'Attendee destroyed!');
    }
}

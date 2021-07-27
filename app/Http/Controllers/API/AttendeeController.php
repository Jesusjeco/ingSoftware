<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\AttendeePostRequest;
use App\Http\Controllers\Controller;
use App\Attendee;

class AttendeeController extends Controller
{


    public function index()
    {
        return Attendee::all();
    }

    public function show(Request $request, Attendee $attendee)
    {
        return $attendee;
    }

    public function store(AttendeePostRequest $request)
    {
        $data = $request->validated();
        $attendee = Attendee::create($data);
        return $attendee;
    }

    public function update(AttendeePostRequest $request, Attendee $attendee)
    {
        $data = $request->validated();
        $attendee->fill($data);
        $attendee->save();

        return $attendee;
    }

    public function destroy(Request $request, Attendee $attendee)
    {
        $attendee->delete();
        return $attendee;
    }

}

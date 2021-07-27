<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventPostRequest;
use App\Event;


class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show(Request $request, Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventPostRequest $request)
    {
        $data = $request->validated();
        $event = Event::create($data);
        return redirect()->route('events.index')->with('status', 'Event created!');
    }

    public function edit(Request $request, Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(EventPostRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->fill($data);
        $event->save();
        return redirect()->route('events.index')->with('status', 'Event updated!');
    }

    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('status', 'Event destroyed!');
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\EventPostRequest;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{


    public function index()
    {
        return Event::all();
    }

    public function show(Request $request, Event $event)
    {
        return $event;
    }

    public function store(EventPostRequest $request)
    {
        $data = $request->validated();
        $event = Event::create($data);
        return $event;
    }

    public function update(EventPostRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->fill($data);
        $event->save();

        return $event;
    }

    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return $event;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityPostRequest;
use App\Activity;


class ActivityController extends Controller
{

    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function show(Request $request, Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(ActivityPostRequest $request)
    {
        $data = $request->validated();
        $activity = Activity::create($data);
        return redirect()->route('activities.index')->with('status', 'Activity created!');
    }

    public function edit(Request $request, Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(ActivityPostRequest $request, Activity $activity)
    {
        $data = $request->validated();
        $activity->fill($data);
        $activity->save();
        return redirect()->route('activities.index')->with('status', 'Activity updated!');
    }

    public function destroy(Request $request, Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('status', 'Activity destroyed!');
    }
}

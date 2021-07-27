<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityPostRequest;
use App\Http\Controllers\Controller;
use App\Activity;

class ActivityController extends Controller
{


    public function index()
    {
        return Activity::all();
    }

    public function show(Request $request, Activity $activity)
    {
        return $activity;
    }

    public function store(ActivityPostRequest $request)
    {
        $data = $request->validated();
        $activity = Activity::create($data);
        return $activity;
    }

    public function update(ActivityPostRequest $request, Activity $activity)
    {
        $data = $request->validated();
        $activity->fill($data);
        $activity->save();

        return $activity;
    }

    public function destroy(Request $request, Activity $activity)
    {
        $activity->delete();
        return $activity;
    }

}

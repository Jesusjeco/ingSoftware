<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\PersonPostRequest;
use App\Http\Controllers\Controller;
use App\Person;

class PersonController extends Controller
{


    public function index()
    {
        return Person::all();
    }

    public function show(Request $request, Person $person)
    {
        return $person;
    }

    public function store(PersonPostRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return $person;
    }

    public function update(PersonPostRequest $request, Person $person)
    {
        $data = $request->validated();
        $person->fill($data);
        $person->save();

        return $person;
    }

    public function destroy(Request $request, Person $person)
    {
        $person->delete();
        return $person;
    }

}

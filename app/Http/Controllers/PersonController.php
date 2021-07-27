<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonPostRequest;
use App\Person;


class PersonController extends Controller
{

    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function show(Request $request, Person $person)
    {
        return view('people.show', compact('person'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(PersonPostRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return redirect()->route('people.index')->with('status', 'Person created!');
    }

    public function edit(Request $request, Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(PersonPostRequest $request, Person $person)
    {
        $data = $request->validated();
        $person->fill($data);
        $person->save();
        return redirect()->route('people.index')->with('status', 'Person updated!');
    }

    public function destroy(Request $request, Person $person)
    {
        $person->delete();
        return redirect()->route('people.index')->with('status', 'Person destroyed!');
    }
}

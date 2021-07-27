<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrivilegePostRequest;
use App\Privilege;


class PrivilegeController extends Controller
{

    public function index()
    {
        $privileges = Privilege::all();
        return view('privileges.index', compact('privileges'));
    }

    public function show(Request $request, Privilege $privilege)
    {
        return view('privileges.show', compact('privilege'));
    }

    public function create()
    {
        return view('privileges.create');
    }

    public function store(PrivilegePostRequest $request)
    {
        $data = $request->validated();
        $privilege = Privilege::create($data);
        return redirect()->route('privileges.index')->with('status', 'Privilege created!');
    }

    public function edit(Request $request, Privilege $privilege)
    {
        return view('privileges.edit', compact('privilege'));
    }

    public function update(PrivilegePostRequest $request, Privilege $privilege)
    {
        $data = $request->validated();
        $privilege->fill($data);
        $privilege->save();
        return redirect()->route('privileges.index')->with('status', 'Privilege updated!');
    }

    public function destroy(Request $request, Privilege $privilege)
    {
        $privilege->delete();
        return redirect()->route('privileges.index')->with('status', 'Privilege destroyed!');
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\PrivilegePostRequest;
use App\Http\Controllers\Controller;
use App\Privilege;

class PrivilegeController extends Controller
{


    public function index()
    {
        return Privilege::all();
    }

    public function show(Request $request, Privilege $privilege)
    {
        return $privilege;
    }

    public function store(PrivilegePostRequest $request)
    {
        $data = $request->validated();
        $privilege = Privilege::create($data);
        return $privilege;
    }

    public function update(PrivilegePostRequest $request, Privilege $privilege)
    {
        $data = $request->validated();
        $privilege->fill($data);
        $privilege->save();

        return $privilege;
    }

    public function destroy(Request $request, Privilege $privilege)
    {
        $privilege->delete();
        return $privilege;
    }

}

@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Role Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$role->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Description</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$role->description}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h2>Privileges</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('privileges.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </tr>
                </thead>
                <tbody>
                    @foreach($role->privileges as $privilege)
                    <tr>
                        <td>
                        <a href="{{route('privileges.show',['privilege'=>$privilege] )}}">Show</a>
                        <a href="{{route('privileges.edit',['privilege'=>$privilege] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-privilege-{{$privilege->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-privilege-{{$privilege->id}}" action="{{route('privileges.destroy',['privilege'=>$privilege])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection
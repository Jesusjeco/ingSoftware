@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Person Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Last Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->last_name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Birthday</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->birthday}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Address</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->address}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Number</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->number}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$person->email}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection
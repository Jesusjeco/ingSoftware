@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Event Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$event->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Description</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$event->description}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Address</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$event->address}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Date</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$event->date}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection
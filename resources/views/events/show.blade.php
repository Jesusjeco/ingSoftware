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

                        <div class="card-header">
        <h2>Attendees</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('attendees.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                                                                                                                                            </tr>
                </thead>
                <tbody>
                    @foreach($event->attendees as $attendee)
                    <tr>
                        <td>
                        <a href="{{route('attendees.show',['attendee'=>$attendee] )}}">Show</a>
                        <a href="{{route('attendees.edit',['attendee'=>$attendee] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-attendee-{{$attendee->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-attendee-{{$attendee->id}}" action="{{route('attendees.destroy',['attendee'=>$attendee])}}" method="POST" style="display: none;">
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
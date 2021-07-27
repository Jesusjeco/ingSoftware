@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Attendee Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('attendees.update',['attendee'=>$attendee->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        <div class="form-group">
            <label for="person_id">Person</label>
            <select class="form-control" name="person_id" id="person_id">
                @foreach((\App\Person::all() ?? [] ) as $person)
                <option value="{{$person->id}}"
                    @if($attendee->person_id == old('person_id', $person->id))
                    selected="selected"
                    @endif
                >{{$person->name}}</option>

                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="event_id">Event</label>
            <select class="form-control" name="event_id" id="event_id">
                @foreach((\App\Event::all() ?? [] ) as $event)
                <option value="{{$event->id}}"
                    @if($attendee->event_id == old('event_id', $event->id))
                    selected="selected"
                    @endif
                >{{$event->name}}</option>

                @endforeach
            </select>
        </div>
                

                                                                                                <div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection
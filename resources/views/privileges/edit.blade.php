@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Privilege Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('privileges.update',['privilege'=>$privilege->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        <div class="form-group">
            <label for="activity_id">Activity</label>
            <select class="form-control" name="activity_id" id="activity_id">
                @foreach((\App\Activity::all() ?? [] ) as $activity)
                <option value="{{$activity->id}}"
                    @if($privilege->activity_id == old('activity_id', $activity->id))
                    selected="selected"
                    @endif
                >{{$activity->name}}</option>

                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" name="role_id" id="role_id">
                @foreach((\App\Role::all() ?? [] ) as $role)
                <option value="{{$role->id}}"
                    @if($privilege->role_id == old('role_id', $role->id))
                    selected="selected"
                    @endif
                >{{$role->name}}</option>

                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="person_id">Person</label>
            <select class="form-control" name="person_id" id="person_id">
                @foreach((\App\Person::all() ?? [] ) as $person)
                <option value="{{$person->id}}"
                    @if($privilege->person_id == old('person_id', $person->id))
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
                    @if($privilege->event_id == old('event_id', $event->id))
                    selected="selected"
                    @endif
                >{{$event->name}}</option>

                @endforeach
            </select>
        </div>
                

                                                                                                        <div class="form-group">
            <label for="date">Date</label>
                    <input class="form-control Date"  type="date"  name="date" id="date" value="{{old('date',$privilege->date)}}"
                                    >
                    @if($errors->has('date'))
            <p class="text-danger">{{$errors->first('date')}}</p>
            @endif
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
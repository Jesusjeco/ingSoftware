@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Privilege Create </h1>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul> @endif <form action="{{route('privileges.store')}}" method="POST" novalidate>
        @csrf
                        <div class="form-group">
            <label for="activity_id">Activity</label>
            <select class="form-control" name="activity_id" id="activity_id">
                @foreach((\App\Activity::all() ?? [] ) as $activity)
                <option value="{{$activity->id}}">
                    {{$activity->name}}</option>
                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" name="role_id" id="role_id">
                @foreach((\App\Role::all() ?? [] ) as $role)
                <option value="{{$role->id}}">
                    {{$role->name}}</option>
                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="person_id">Person</label>
            <select class="form-control" name="person_id" id="person_id">
                @foreach((\App\Person::all() ?? [] ) as $person)
                <option value="{{$person->id}}">
                    {{$person->name}}</option>
                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="event_id">Event</label>
            <select class="form-control" name="event_id" id="event_id">
                @foreach((\App\Event::all() ?? [] ) as $event)
                <option value="{{$event->id}}">
                    {{$event->name}}</option>
                @endforeach
            </select>
        </div>
                
                                                                                                        <div class="form-group">
            <label for="date">Date</label>
                        <input class="form-control Date"  type="date"  name="date" id="date" value="{{old('date')}}"                         >
                        @if($errors->has('date'))
            <p class="text-danger">{{$errors->first('date')}}</p>
            @endif
        </div>
                                                        <div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1> Events </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('events.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($events))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Name</td>
                
                                                <td>Description</td>
                
                                                <td>Address</td>
                
                                                <td>Date</td>
                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>
                    <a href="{{route('events.show',['event'=>$event] )}}">Show</a>
                    <a href="{{route('events.edit',['event'=>$event] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-event-{{$event->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-event-{{$event->id}}" action="{{route('events.destroy',['event'=>$event])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$event->name}}</td>
                                                                <td>{{$event->description}}</td>
                                                                <td>{{$event->address}}</td>
                                                                <td>{{$event->date}}</td>
                                                                                                
            </tr>
            @empty
            <p>No Events</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
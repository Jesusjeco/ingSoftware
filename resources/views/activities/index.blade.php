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
            <h1> Activities </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('activities.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($activities))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Name</td>
                
                                                <td>Description</td>
                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($activities as $activity)
            <tr>
                <td>
                    <a href="{{route('activities.show',['activity'=>$activity] )}}">Show</a>
                    <a href="{{route('activities.edit',['activity'=>$activity] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-activity-{{$activity->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-activity-{{$activity->id}}" action="{{route('activities.destroy',['activity'=>$activity])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$activity->name}}</td>
                                                                <td>{{$activity->description}}</td>
                                                                                                
            </tr>
            @empty
            <p>No Activities</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
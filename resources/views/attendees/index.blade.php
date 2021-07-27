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
            <h1> Attendees </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('attendees.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($attendees))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($attendees as $attendee)
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
            @empty
            <p>No Attendees</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
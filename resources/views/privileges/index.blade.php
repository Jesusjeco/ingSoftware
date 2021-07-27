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
            <h1> Privileges </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('privileges.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($privileges))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                
                                
                                
                                                <td>Date</td>
                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($privileges as $privilege)
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
                                                                                                                                                                                                                <td>{{$privilege->date}}</td>
                                                                                                
            </tr>
            @empty
            <p>No Privileges</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
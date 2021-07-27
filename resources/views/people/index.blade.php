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
            <h1> People </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('people.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($people))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Name</td>
                
                                                <td>Last Name</td>
                
                                                <td>Birthday</td>
                
                                                <td>Address</td>
                
                                                <td>Number</td>
                
                                                <td>Email</td>
                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($people as $person)
            <tr>
                <td>
                    <a href="{{route('people.show',['person'=>$person] )}}">Show</a>
                    <a href="{{route('people.edit',['person'=>$person] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-person-{{$person->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-person-{{$person->id}}" action="{{route('people.destroy',['person'=>$person])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$person->name}}</td>
                                                                <td>{{$person->last_name}}</td>
                                                                <td>{{$person->birthday}}</td>
                                                                <td>{{$person->address}}</td>
                                                                <td>{{$person->number}}</td>
                                                                <td>{{$person->email}}</td>
                                                                                                
            </tr>
            @empty
            <p>No People</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection
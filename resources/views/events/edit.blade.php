@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Event Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('events.update',['event'=>$event->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        

                                        <div class="form-group">
            <label for="name">Name</label>
                    <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$event->name)}}"
                                    required="required"
                        >
                    @if($errors->has('name'))
            <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="description">Description</label>
                    <input class="form-control String"  type="text"  name="description" id="description" value="{{old('description',$event->description)}}"
                                    required="required"
                        >
                    @if($errors->has('description'))
            <p class="text-danger">{{$errors->first('description')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="address">Address</label>
                    <input class="form-control String"  type="text"  name="address" id="address" value="{{old('address',$event->address)}}"
                                    required="required"
                        >
                    @if($errors->has('address'))
            <p class="text-danger">{{$errors->first('address')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="date">Date</label>
                    <input class="form-control Date"  type="date"  name="date" id="date" value="{{old('date',$event->date)}}"
                                    required="required"
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
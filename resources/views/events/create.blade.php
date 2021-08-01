@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Event Create </h1>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul> @endif <form action="{{route('events.store')}}" method="POST" novalidate>
        @csrf
                        
                                        <div class="form-group">
            <label for="name">Name</label>
                        <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name')}}"             maxlength="250"
                                    required="required"
                        >
                        @if($errors->has('name'))
            <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="description">Description</label>
                        <input class="form-control String"  type="text"  name="description" id="description" value="{{old('description')}}"             maxlength="500"
                                    >
                        @if($errors->has('description'))
            <p class="text-danger">{{$errors->first('description')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="address">Address</label>
                        <input class="form-control String"  type="text"  name="address" id="address" value="{{old('address')}}"             maxlength="250"
                                    >
                        @if($errors->has('address'))
            <p class="text-danger">{{$errors->first('address')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="date">Date</label>
                        <input class="form-control Date"  type="date"  name="date" id="date" value="{{old('date')}}"                         required="required"
                        >
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

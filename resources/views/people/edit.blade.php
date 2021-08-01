@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Person Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('people.update',['person'=>$person->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        

                                        <div class="form-group">
            <label for="name">Name</label>
                    <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$person->name)}}"
                                    required="required"
                        >
                    @if($errors->has('name'))
            <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="last_name">Last Name</label>
                    <input class="form-control String"  type="text"  name="last_name" id="last_name" value="{{old('last_name',$person->last_name)}}"
                                    required="required"
                        >
                    @if($errors->has('last_name'))
            <p class="text-danger">{{$errors->first('last_name')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="birthday">Birthday</label>
                    <input class="form-control Date"  type="date"  name="birthday" id="birthday" value="{{old('birthday',$person->birthday)}}"
                                    required="required"
                        >
                    @if($errors->has('birthday'))
            <p class="text-danger">{{$errors->first('birthday')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="address">Address</label>
                    <input class="form-control String"  type="text"  name="address" id="address" value="{{old('address',$person->address)}}"
                                    >
                    @if($errors->has('address'))
            <p class="text-danger">{{$errors->first('address')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="number">Number</label>
                    <input class="form-control String"  type="text"  name="number" id="number" value="{{old('number',$person->number)}}"
                                    >
                    @if($errors->has('number'))
            <p class="text-danger">{{$errors->first('number')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="email">Email</label>
                    <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email',$person->email)}}"
                                    >
                    @if($errors->has('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
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
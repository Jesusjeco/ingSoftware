@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mb-4">

            <div class="card-header">
                <h1> Attendee Show </h1>
            </div>

            <div class="card-body">
                <ul>
                    <li>Evento: {{ $attendee->event->name}}</li>
                    <li>Nombre: {{ $attendee->person->name}}</li>
                    <li>Apellido: {{ $attendee->person->last_name }}</li>
                </ul>
            </div>

        </div>



        <a href="{{ url()->previous() }}">Back</a>
    </div>
@endsection

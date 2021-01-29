@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointments</div>

                <div class="card-body">
                    @foreach ($appointments as $appointment)
                        <a href="{{ url('doctor/appointment/' . $appointment->id) }}"><li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$appointment['user']['name']}}
                            <span class="badge badge-primary badge-pill">{{$appointment->serial_id}}</span>
                        </li></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
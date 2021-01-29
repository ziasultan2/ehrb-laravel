@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as admin!
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="sidebar">
                <a class="active" href="{{url('/admin/district')}}">District</a>
                <a href="{{url('/admin/thana')}}">Thana</a>
                <a href="{{url('/admin/hospital')}}">Hospital</a>
                <a href="{{url('/admin/ambulance')}}">Ambulance</a>
                <a href="{{url('/admin/doctor')}}">Doctor</a>
              </div>
        </div>
    </div>
</div>
@endsection
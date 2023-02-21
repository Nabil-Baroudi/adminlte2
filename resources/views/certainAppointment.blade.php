@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $data->patient }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if (Session::has('successMsg'))
                                <div class="alert alert-success">
                                    <h6 style=" text-align:center !important;"><b>Successfully updated! </b></h6>
                                </div>
                            @endif
                            <div class="card m-2" style="width:400px">
                                <img class="card-img-top"
                                    src="https://www.nicepng.com/png/detail/87-874647_red-cross-hospital-logo-hospital-logo-red-cross.png"
                                    alt="">
                                <div class="card-body">
                                    <h4 class="card-title">Patient Name: {{ $data['patient'] }}</h4>
                                    <h4 class="card-text">wanted section: {{ $data['section'] }}</h4>
                                    <p class="class-text">appointment date: {{ $data['date'] }}</p>
                                    <p class="class-text">appointment time:{{ $data->time->from }} - {{ $data->time->to }}
                                    </p>
                                    <a href="/appointments/{{ $data['id'] }}/edit" class="btn btn-primary">Edit
                                        Appointment</a>
                                    <a href="/appointments" class="btn btn-primary">Appointments List</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

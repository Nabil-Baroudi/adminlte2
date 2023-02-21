@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $appointment->patient }}</h1>
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
                            <div class="m-2">
                                <form action="/appointments/{{ $appointment['id'] }}" method="post">
                                    <div class="form-group">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-6">
                                            <label>input patient name:</label>
                                            <input type="text" name="patient" id="patient"
                                                placeholder="patient name..." class="form-control mb-2"
                                                value="{{ $appointment->patient }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>choose the section wich the patient will visit</label>
                                            <select type="text" name="section" id="section" class="form-control mb-2"
                                                required>
                                                <option value="" disabled>{{ $appointment->section }}</option>
                                                <option value="Heart section">Heart section</option>
                                                <option value="bone section">bone section</option>
                                                <option value="skin section">skin section</option>
                                                <option value="x-ray section">x-ray section</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>set the date of the appointment:</label>
                                            <input type="date" name="date" id="date" class="form-control mb-2"
                                                value="{{ $appointment->date }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>pick a time from availabe times</label>
                                            <select type="time" name="time" id="time" class="form-control mb-2"
                                                required>
                                                <option value="" disabled>{{ $appointment->time->from }}
                                                    -
                                                    {{ $appointment->time->to }}</option>
                                                @foreach ($slot as $option)
                                                    <option value={{ $option->id }} type="time" id="time"
                                                        name="time">
                                                        {{ $option->from }} , {{ $option->to }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="submit" value="update" class="btn btn-primary mb-2">
                                            <a href="/appointments" class="btn btn-primary mb-2"> Appointments List</a>
                                        </div>

                                    </div>
                            </div>
                            </form>
                            @if (!empty($successMsg))
                                <div class="alert alert-success"> {{ $successMsg }}</div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        date.min = new Date().toISOString().split("T")[0];
    </script>
@endsection

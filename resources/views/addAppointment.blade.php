@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">add appointment</h1>
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

                            @isset($successMsg)
                                <div class="alert alert-success"> {{ $successMsg }}</div>
                            @endisset
                            @isset($section)
                                <form action="{{ route('appointements.store') }}" method="post">
                                @else
                                    <form action="{{ route('appointements.step1') }}" method="post">
                                    @endisset
                                    <div class="form-group">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>choose the section wich the patient will visit</label>
                                            @isset($section)
                                                <input type="hidden" name="date2" value="{{ $date }}" />
                                                <input type="hidden" name="section2" value="{{ $section }}" />
                                                <select type="text" name="section" id="section" class="form-control mb-2"
                                                    required disabled>
                                                    <option value="">Select a Section</option>
                                                    @if ($section == 'heart section')
                                                        <option value="heart section" selected>Heart section</option>
                                                    @else
                                                        <option value="heart section">Heart section</option>
                                                    @endif

                                                    @if ($section == 'bone section')
                                                        <option value="bone section" selected>Bone section</option>
                                                    @else
                                                        <option value="bone section">Bone section</option>
                                                    @endif

                                                    @if ($section == 'skin section')
                                                        <option value="skin section" selected>Skin section</option>
                                                    @else
                                                        <option value="skin section">Skin section</option>
                                                    @endif

                                                    @if ($section == 'x-ray section')
                                                        <option value="x-ray section" selected>X-ray section</option>
                                                    @else
                                                        <option value="x-ray section">X-ray section</option>
                                                    @endif

                                                </select>
                                            @else
                                                <select type="text" name="section" id="section" class="form-control mb-2"
                                                    required>
                                                    <option value="">Select a Section</option>
                                                    <option value="heart section">Heart section</option>

                                                    <option value="bone section">bone section</option>

                                                    <option value="skin section">skin section</option>

                                                    <option value="x-ray section">x-ray section</option>
                                                </select>
                                            @endisset
                                        </div>
                                        <div class="col-md-6">
                                            <label>set the time of the appointment:</label>
                                            @isset($date)
                                                <input type="date" name="date" id="date" class="form-control mb-2"
                                                    value="{{ $date }}" required disabled>
                                                <label>pick a time from availabe times</label>
                                                <select type="time" name="time" id="time" class="form-control mb-2"
                                                    required>
                                                    <option value="">choose appointment time</option>
                                                    @foreach ($slot as $option)
                                                        <option value={{ $option->id }} type="time" id="time"
                                                            name="time">
                                                            {{ $option->from }} , {{ $option->to }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="date" name="date" id="date" class="form-control mb-2"
                                                    required>
                                            @endisset

                                        </div>
                                        @isset($date)
                                            <div class="col-md-6">
                                                <label>input patient name:</label>
                                                <input type="text" name="patient" id="patient"
                                                    placeholder="patient name..." class="form-control mb-2" required>
                                            </div>
                                        @endisset

                                        <div class="col-md-6">
                                            <input type="submit" value="next" class="btn btn-primary mb-2">
                                            <a href="/appointments" class="btn btn-primary mb-2"> Appointments List</a>
                                            @isset($date)
                                                <a class="btn btn-primary mb-2" href="/addAppointment">Back</a>
                                            @endisset
                                        </div>

                                    </div>
                                </form>

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

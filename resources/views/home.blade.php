@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments list</h1>
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
                                    <h6 style=" text-align:center !important;"><b>Successfully Deleted! </b></h6>
                                </div>
                            @endif
                            @can('cpanel')
                                <a href="/cpanel" class="btn btn-primary mb-2">Admin Panel</a>
                            @endcan
                            <a class="btn btn-primary mb-2" href="/addAppointment">Add new Appointment</a>
                            <div class="container">
                                @if ($data->count())
                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Section</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Open Appointment</th>
                                                <th>Delete Appointment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->patient }}</td>
                                                    <td>{{ $item->section }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->time->from }} - {{ $item->time->to }}</td>
                                                    <td><a href="/appointments/{{ $item->id }}"
                                                            class="btn">&#9998;</a>
                                                    </td>
                                                    <td>
                                                        <form action="/appointments/{{ $item->id }}" method="POST"
                                                            id="EditForm">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn" data-toggle="tooltip"
                                                                title='Delete' onclick="submitResult(event)"
                                                                aria-hidden="true">&#128465;</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            </p>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function submitResult(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    document.getElementById("EditForm").submit();
                }
            })
        }
    </script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('styles')
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

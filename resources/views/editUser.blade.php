@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $user->id }}</h1>
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

                                <form action="/cpanel/{{ $user->id }}" method="post">
                                    <div class="form-group">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-6">
                                            <label>input User name:</label>
                                            <input type="text" name="patient" id="patient" placeholder="Change name..."
                                                class="form-control mb-2" value="{{ $user->name }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="submit" value="update" class="btn btn-primary mb-2">
                                            <a href="/cpanel" class="btn btn-primary mb-2"> Admin Panel</a>
                                        </div>

                                </form>
                            </div>
                        </div>
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

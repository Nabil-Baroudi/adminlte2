@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $data->name }}</h1>
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

                            <a href="{{ url('/logout') }}" method="post" class="btn btn-primary m-2"> logout </a>
                            @if (Session::has('successMsg'))
                                <div class="alert alert-success">
                                    <h6 style=" text-align:center !important;"><b>Successfully updated! </b></h6>
                                </div>
                            @endif
                            <div class="card m-2" style="width:400px">
                                <img class="card-img-top"
                                    src="https://www.freeiconspng.com/thumbs/login-icon/user-login-icon-14.png"
                                    alt="">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $data['id'] }}</h3>
                                    <h4 class="card-text">User Name: {{ $data['name'] }}</h4>
                                    <p class="class-text">User Email: {{ $data['email'] }}</p>
                                    <a href="/cpanel/{{ $data['id'] }}/edit" class="btn">&#9998;</a>
                                    <a href="/cpanel" class="btn btn-primary">Users List</a>
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

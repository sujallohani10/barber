@extends('backend.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            @if (session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {!! session()->get('success') !!}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary float-right">Create Service</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Service</th>
                            <th style="width: 20%">Price</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $key => $service)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td><span class="badge bg-success">${{ $service->price }}</span></td>
                                    <td>{{ $service->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

@endsection

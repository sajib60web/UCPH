@extends('admin.master')
@section('title', 'Manage Customer')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Customer
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Manage Customer</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            @include('admin.massage')
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Manage Customer</h3>
                        <a href="{{ route('customers.create') }}" style="float: right;" class="btn btn-success btn-sm">
                            Create Customer
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Customer Name</th>
                                    <th>Customer ID Card / Registy Number</th>
                                    <th>Customer Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $key => $customer)
                                <tr>
                                    <td>{{ $customer->AcNo }}</td>
                                    <td>{{ $customer->CEName }}</td>
                                    <td>{{ $customer->CEIdCard }}</td>
                                    <td>{{ $customer->CEPhone }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['customers.destroy', $customer->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are You Sure to Delete');"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

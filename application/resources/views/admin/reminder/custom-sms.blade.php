@extends('admin.master')
@section('title', 'Custom SMS')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Custom SMS
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Custom SMS</a></li>
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
                        <h3 class="box-title">All Custom SMS</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('send.custom.sms') }}" method="post">
                            @csrf
                            <div style="text-align: center!important;">
                                <input type="submit" class="btn btn-success"  value="Send Custom SMS" style="margin-right: 20px;">
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Bill No</th>
                                    <th>Due Amount</th>
                                    <th>Meter Number</th>
                                    <th>Service Address</th>
                                    <th>Customer Name</th>
                                    <th>ID Card / Registry No</th>
                                    <th>Island / City</th>
                                    <th>Phone</th>
                                    <th>Tariff Code</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </form>
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

@extends('admin.master')
@section('title', 'SMS Reminder')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SMS Reminder
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> SMS Reminder</a></li>
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
                        <h3 class="box-title">All SMS Reminder</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('send.sms.reminder') }}" method="post">
                            @csrf
                            <div style="text-align: center!important;">
                                <input type="submit" class="btn btn-success"  value="Send SMS Reminder" style="margin-right: 20px;">
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

@extends('admin.master')
@section('title', 'Payment Receipt')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment Receipt
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Payment Receipt</a></li>
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
                        <h3 class="box-title">Payment Receipt</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('payment.receipt.print') }}" method="post">
                        @csrf
                    <div style="text-align: center!important;">
                        <input type="submit" class="btn btn-success" value="Print Payment Receipt" style="margin-right: 20px;">
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Receipt No</th>
                                    <th>Amount</th>
                                    <th>A/C Number</th>
                                    <th>Meter No</th>
                                    <th>Service Address</th>
                                    <th>Customer Name</th>
                                    <th>ID Card / Registry No</th>
                                    <th>Phone</th>
                                    <th>Tariff Code</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

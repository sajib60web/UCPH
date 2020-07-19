@extends('admin.master')
@section('title', 'Manage Bill')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Bill
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Manage Bill</a></li>
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
                        <h3 class="box-title">Manage Bill</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('bill.print.and.delete') }}" method="post">
                        @csrf
                    <div style="text-align: center!important;">
                        <input type="submit" name="printBill" class="btn btn-success" id="printBill" value="Print Bill" style="margin-right: 20px;">
                        <input type="submit" name="deleteBill" class="btn btn-danger" id="deleteBill" value="Delete Bill">
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Bill No</th>
                                    <th>Amount</th>
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
    <script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#printBill").click(function(){
                $("#printBill").val('printBill');
                $("#deleteBill").val('Delete Bill');
            });

            $("#deleteBill").click(function(){
                $("#deleteBill").val('deleteBill');
                $("#printBill").val('Print Bill');
            });
        });
    </script>
@endsection

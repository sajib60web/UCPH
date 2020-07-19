@extends('admin.master')
@section('title', 'Reports')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reports
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Reports</a></li>
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
                    <div class="box-body">
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="form-group">
                                <label>Meter Reports</label>
                                <input type="text" name="by_meter_number" class="form-control" placeholder="By Meter Number">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Generate</button>
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="form-group">
                                <label>Daily Reports</label>
                                <input type="text" name="by_meter_number" class="form-control datepicker" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Generate</button>
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="form-group">
                                <label>Monthly Reports</label>
                                <select class="form-control select2" name="month_name"  required>
                                    <option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Generate</button>
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="form-group">
                                <label>Yearly Reports</label>
                                <select class="form-control select2" name="year_name"  required>
                                    <option value="">Select Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Generate</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('reports.print') }}" method="post">
                            @csrf
                            <div style="text-align: center!important;">
                                <input type="submit" class="btn btn-success"  value="Print Report" style="margin-right: 20px;">
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bill / Receipt No</th>
                                        <th>Meter No</th>
                                        <th>Service Address</th>
                                        <th>Billing Month</th>
                                        <th>Previous Read</th>
                                        <th>Current Read</th>
                                        <th>Consumption</th>
                                        <th>Bill Amount</th>
                                        <th>Status</th>
                                        <th>Payment Date</th>
                                        <th>Paid</th>
                                        <th>Payment Method</th>
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

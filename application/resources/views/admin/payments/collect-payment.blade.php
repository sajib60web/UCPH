@extends('admin.master')
@section('title', 'Collect Payment')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Collect Payment
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Collect Payment</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            @include('admin.massage')
            <div class="col-sm-12">
                <!-- /.box -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Select</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                                <th>ID Card / Registry No</th>
                                <th>Island / City</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="customer_id" value="{{ $customer->id }}">
                                    </td>
                                    <td>{{ $customer->AcNo }}</td>
                                    <td>{{ $customer->CEName }}</td>
                                    <td>{{ $customer->CEIdCard }}</td>
                                    <td>{{ $customer->CECity }}</td>
                                    <td>{{ $customer->CEPhone }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="box-body">
{{--                    {!! Form::open(array('route' => 'save.change.owner.ship','method'=>'POST')) !!}--}}
                    <div class="col-sm-6">
                        <h3><b>Customer Information</b></h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Account Number:</label>
                                    {!! Form::text('AcNo', null, array('placeholder' => 'Customer Account Number','class' => 'form-control', 'id' => 'AcNo')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    {!! Form::text('CEName', null, array('placeholder' => 'Customer Name','class' => 'form-control', 'id' => 'CEName')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer ID Card / Registy Number:</label>
                                    {!! Form::text('CEIdCard', null, array('placeholder' => 'Customer ID Card / Registy Number','class' => 'form-control', 'id' => 'CEIdCard')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Island / City:</label>
                                    {!! Form::text('CECity', null, array('placeholder' => 'Customer Island / City','class' => 'form-control', 'id' => 'CECity')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Phone:</label>
                                    {!! Form::text('CEPhone', null, array('placeholder' => 'Customer Phone','class' => 'form-control', 'id' => 'CEPhone')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3><b>Number of the Due Bill</b></h3><br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Bill No</th>
                                    <th>Meter No</th>
                                    <th>Service Address</th>
                                    <th>Billing Month</th>
                                    <th>Billing Date</th>
                                    <th>Tariff Code</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Select</td>
                                    <td>Bill No</td>
                                    <td>Meter No</td>
                                    <td>Service Address</td>
                                    <td>Billing Month</td>
                                    <td>Billing Date</td>
                                    <td>Tariff Code</td>
                                    <td>Amount</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-sm-3 pull-right">
                            <label>Receipt No :</label>
                            {!! Form::text('CEPhone', null, array('placeholder' => 'Receipt No','class' => 'form-control')) !!}
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Details :</label>
                                {!! Form::text('CECity', null, array('placeholder' => 'Details','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-sm-4 payment">
                            <label>
                                <input type="radio" name="payment" class="flat-red" value="cash">
                                Cash
                            </label>
                        </div>
                        <div class="col-sm-4 payment">
                            <label>
                                <input type="radio" name="payment" class="flat-red" value="bank_deposit">
                                Bank Deposit
                            </label>
                        </div>
                        <div class="col-sm-4 payment">
                            <label>
                                <input type="radio" name="payment" class="flat-red" value="online">
                                Online
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-warning pull-right">Print</button>
                        <button type="submit" class="btn btn-success pull-right" style="margin-right: 20px;">Submit</button>
                    </div>
{{--                    {!! Form::close() !!}--}}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".customer_id").click(function(){
                var id = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{!! url("/select/customer/info") !!}/'+id,
                    success:function (data) {
                        // console.log(data);
                        $('#AcNo').val(data.AcNo);
                        $('#CEName').val(data.CEName);
                        $('#CEIdCard').val(data.CEIdCard);
                        $('#CECity').val(data.CECity);
                        $('#CEPhone').val(data.CEPhone);
                    }
                });
            });
        });
    </script>
@endsection

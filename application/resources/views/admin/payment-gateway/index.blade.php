@extends('admin.master')
@section('title', 'Payment Gateway')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment Gateway
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Payment Gateway</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            @include('admin.massage')
        </div>
        <div class="row">
            <div class="box">
                <div class="box-body">
{{--                    {!! Form::open(array('route' => 'save.change.owner.ship','method'=>'POST')) !!}--}}
                    <div class="col-sm-6">
                        <h3><b>Payment Gateway Information</b></h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Gateway Name:</label>
                                    {!! Form::text('AcNo', null, array('placeholder' => 'Gateway Name','class' => 'form-control', 'id' => 'AcNo')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Display User Name:</label>
                                    {!! Form::text('CEName', null, array('placeholder' => 'Customer Name','class' => 'form-control', 'id' => 'CEName')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Minimum Amount:</label>
                                    {!! Form::text('CEIdCard', null, array('placeholder' => 'Customer ID Card / Registy Number','class' => 'form-control', 'id' => 'CEIdCard')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Maximum Amount:</label>
                                    {!! Form::text('CECity', null, array('placeholder' => 'Customer Island / City','class' => 'form-control', 'id' => 'CECity')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Phone:</label>
                                    <select name="currency" class="form-control select2" style="width: 100%;">
                                        <option value="0">Select Currency</option>
                                        <option value="1">MVR</option>
                                        <option value="2">USD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>API Key:</label>
                            {!! Form::text('CECity', null, array('placeholder' => 'API Key','class' => 'form-control', 'id' => 'CECity')) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>XPUB Code:</label>
                            {!! Form::text('CECity', null, array('placeholder' => 'XPUB Code','class' => 'form-control', 'id' => 'CECity')) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Add Gateway Image (Support JPG, JPEG, PNG) :</label>
                            {!! Form::file('CECity', null, array('class' => 'form-control-file')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-success pull-right">Add Payment Gateway</button>
                    </div>
{{--                    {!! Form::close() !!}--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <select name="tariff_code" id="tariff_code" class="form-control">
                        <option value="0">Select Code to Add Rates</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <select name="tariff_code" id="tariff_code" class="form-control">
                        <option value="0">Select Gateway</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save Change">
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

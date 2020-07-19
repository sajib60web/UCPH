@extends('admin.master')
@section('title', 'Change OwnerShip')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change OwnerShip
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-adjust"></i> Change OwnerShip</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            @include('admin.massage')
            <div class="col-sm-6">
                <!-- /.box -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Select</th>
                                <th>Meter No</th>
                                <th>Service</th>
                                <th>A/C Number</th>
                                <th>Customer Name</th>
                                <th>Tariff Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($current_owners as $current_owner)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="meter_id" value="{{ $current_owner->ID }}">
                                    </td>
                                    <td>{{ $current_owner->MeterNo }}</td>
                                    <td>{{ $current_owner->EServingAdd }}</td>
                                    <td>{{ $current_owner->AcNo }}</td>
                                    <td>{{ $current_owner->CEName }}</td>
                                    <td>{{ $current_owner->TrCode }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-sm-6">
                <!-- /.box -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="exampleTwo" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Select</th>
                                <th>Customer Name</th>
                                <th>A/C Number</th>
                                <th>Phone</th>
                                <th>ID Card</th>
                                <th>Island / City</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($replacing_owners as $replacing_owner)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="customer_id" value="{{ $replacing_owner->id }}">
                                    </td>
                                    <td>{{ $replacing_owner->CEName }}</td>
                                    <td>{{ $replacing_owner->AcNo }}</td>
                                    <td>{{ $replacing_owner->CEPhone }}</td>
                                    <td>{{ $replacing_owner->CEIdCard }}</td>
                                    <td>{{ $replacing_owner->CECity }}</td>
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
        <div class="row">
            <div class="box">
                <div class="box-body">
                    {!! Form::open(array('route' => 'save.change.owner.ship','method'=>'POST')) !!}
                    <div class="col-sm-6">
                        <h3><b>Current Owner</b></h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Meter Number:</label>
                                    {!! Form::text('MeterNo', null, array('placeholder' => 'Meter Number','class' => 'form-control', 'id' => 'MeterNo')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Service Address:</label>
                                    {!! Form::text('EServingAdd', null, array('placeholder' => 'Service Address','class' => 'form-control', 'id' => 'EServingAdd')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Account Number:</label>
                                    {!! Form::text('cAcNo', null, array('placeholder' => 'Customer Account Number','class' => 'form-control', 'id' => 'cAcNo')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    {!! Form::text('cCEName', null, array('placeholder' => 'Customer Name','class' => 'form-control', 'id' => 'cCEName')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer ID Card / Registy Number:</label>
                                    {!! Form::text('cCEIdCard', null, array('placeholder' => 'Customer ID Card / Registy Number','class' => 'form-control', 'id' => 'cCEIdCard')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Island / City:</label>
                                    {!! Form::text('cCECity', null, array('placeholder' => 'Customer Island / City','class' => 'form-control', 'id' => 'cCECity')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Phone:</label>
                                    {!! Form::text('cCEPhone', null, array('placeholder' => 'Customer Phone','class' => 'form-control', 'id' => 'cCEPhone')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Tariff Code:</label>
                                    <select name="TrCode" class="form-control" id="TrCode">
                                        <option value="0">Select Tariff Code</option>
                                        <option value="Domestic">Domestic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3><b>Replacing Owner</b></h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Account Number:</label>
                                    {!! Form::text('rAcNo', null, array('placeholder' => 'Customer Account Number','class' => 'form-control', 'id' => 'rAcNo')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    {!! Form::text('rCEName', null, array('placeholder' => 'Customer Name','class' => 'form-control', 'id' => 'rCEName')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer ID Card / Registy Number:</label>
                                    {!! Form::text('rCEIdCard', null, array('placeholder' => 'Customer ID Card / Registy Number','class' => 'form-control', 'id' => 'rCEIdCard')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Island / City:</label>
                                    {!! Form::text('rCECity', null, array('placeholder' => 'Customer Island / City','class' => 'form-control', 'id' => 'rCECity')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Phone:</label>
                                    {!! Form::text('rCEPhone', null, array('placeholder' => 'Customer Phone','class' => 'form-control', 'id' => 'rCEPhone')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Submit Change OwnerShip</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".meter_id").click(function(){
                var id = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{!! url("/select/current/owner/info") !!}/'+id,
                    success:function (data) {
                        // console.log(data);
                        $('#MeterNo').val(data.MeterNo);
                        $('#EServingAdd').val(data.EServingAdd);
                        $('#cAcNo').val(data.AcNo);
                        $('#cCEName').val(data.customer.CEName);
                        $('#cCEIdCard').val(data.customer.CEIdCard);
                        $('#cCECity').val(data.customer.CECity);
                        $('#cCEPhone').val(data.customer.CEPhone);
                        $('#TrCode').val(data.TrCode);
                    }
                });
            });

            $(".customer_id").click(function(){
                var id = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{!! url("/select/replacing/owner/info") !!}/'+id,
                    success:function (data) {
                        // console.log(data);
                        $('#rAcNo').val(data.AcNo);
                        $('#rCEName').val(data.CEName);
                        $('#rCEIdCard').val(data.CEIdCard);
                        $('#rCECity').val(data.CECity);
                        $('#rCEPhone').val(data.CEPhone);
                    }
                });
            });
        });
    </script>
@endsection

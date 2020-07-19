@extends('admin.master')
@section('title', 'Create Meter')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Meter
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-user-plus"></i> Create Meter</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
        @include('admin.massage')
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('meters.index') }}" style="float: right;" class="btn btn-success btn-sm">
                        Manage Meter
                    </a>
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($customer, ['method' => 'POST','route' => ['meters.store', $customer->id]]) !!}
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    {!! Form::text('CEName', null, array('placeholder' => 'Customer Name','class' => 'form-control')) !!}
                                    {!! Form::hidden('AcNo', null, array('placeholder' => 'AcNo','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Address:</label>
                                    {!! Form::text('CEAddress', null, array('placeholder' => 'Customer Address','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer ID Card / Registy Number:</label>
                                    {!! Form::text('CEIdCard', null, array('placeholder' => 'Customer ID Card / Registy Number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Island / City:</label>
                                    {!! Form::text('CECity', null, array('placeholder' => 'Customer Island / City','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Customer Phone:</label>
                                    {!! Form::text('CEPhone', null, array('placeholder' => 'Customer Phone','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Meter Number:</label>
                                    {!! Form::text('MeterNo', null, array('placeholder' => 'Meter Number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Previous Reading:</label>
                                    {!! Form::text('PrevRead', null, array('placeholder' => 'Previous Reading','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Previous Reading Date:</label>
                                    {!! Form::text('PrevRDate', null, array('placeholder' => 'YYYY-MM-DD','class' => 'form-control datepicker')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Type Service Address in English Language:</label>
                                    {!! Form::text('EServingAdd', null, array('placeholder' => 'Service Address','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Type Service Address in Dhivehi Language (Optional):</label>
                                    {!! Form::text('DServingAdd', null, array('placeholder' => 'ްސެރްޑެއ ްސިވރާސ','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Tariff Code:</label>
                                    <select name="TrCode" class="form-control">
                                        <option value="0">Select Tariff Code</option>
                                        <option value="Domestic">Domestic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

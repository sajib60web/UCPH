@extends('admin.master')
@section('title', 'Create Customer')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Customer
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-user-plus"></i> Create Customer</a></li>
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
                        <a href="{{ route('customers.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage Customer
                        </a>
                    </div>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(array('route' => 'customers.store','method'=>'POST')) !!}
                        <div class="col-sm-6">
                            <h4>Type Customer Information in English Language</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Customer Name:</label>
                                        {!! Form::text('CEName', null, array('placeholder' => 'Customer Name','class' => 'form-control')) !!}
                                        <input type="hidden" name="AcNo" value="CN-{{ $customer_id }}">
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
                            <h4>Type Customer Information in Dhivehi Language (Optional)</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label style="color: #ffffff;">CDName</label>
                                        {!! Form::text('CDName', null, array('placeholder' => 'ްނަނ ރަމަޓްސަކ','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label style="color: #ffffff;">CDAddress</label>
                                        {!! Form::text('CDAddress', null, array('placeholder' => 'ްތާރާމިއ / ެގ ރަމަޓްސަކ','class' => 'form-control')) !!}
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


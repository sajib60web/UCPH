@extends('admin.master')
@section('title', 'Set Rates')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Set Rates
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-user-plus"></i> Set Rates</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
        @include('admin.massage')
        <!-- /.box -->
            <div class="box">
                <div class="box-body">
                    <h3>Add Ranges , Rates and the Fuel Surcharges (Manually)</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <form action="{{ route('save.code.type') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <input type="text" name="CodeType" class="form-control" placeholder="Code Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ShortCode" class="form-control" placeholder="Short Name">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success pull-right" style="margin-bottom: 15px;" value="Add">
                                </div>
                            </form>
                            <form action="{{ route('delete.code.type') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select name="TrCode" class="form-control select2">
                                        <option value="">Select Code to Add Rates</option>
                                        @foreach ($code_types as $code_type)
                                            <option value="{{ $code_type->CodeType }}">{{ $code_type->CodeType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger pull-right" value="Delete">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{ route('save.rate') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select name="TCode" class="form-control select2">
                                        <option value="0">Select Code to Add Rates</option>
                                        @foreach ($code_types as $code_type)
                                            <option value="{{ $code_type->CodeType }}">{{ $code_type->CodeType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="FRate" class="form-control" placeholder="Range">
                                </div>
                                <div class="text-center" style="margin-top: 7px;"><b>To</b></div>
                                <div class="form-group">
                                    <input type="text" name="TRate" class="form-control" placeholder="Range">
                                </div>
                                <div class="text-center" style="margin-top: 7px;"><b>Rate</b></div>
                                <div class="form-group">
                                    <input type="text" name="Rate" class="form-control" placeholder="Rate">
                                </div>
                                <div class="form-group pull-right">
                                    <input type="submit" class="btn btn-success" value="Add">
                                    <input type="reset" class="btn btn-danger" value="Clear">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{ route('add.fuel.sur.charge') }}" method="post">
                                @csrf
                                <div><b>Add Fuel SurCharge</b></div>
                                <div class="form-group">
                                    <select name="tariff_code" class="form-control select2">
                                        <option value="0">Select Code to Add Rates</option>
                                        @foreach ($code_types as $code_type)
                                            <option value="{{ $code_type->CodeType }}">{{ $code_type->CodeType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="FRatePerLtr" id="FRatePerLtr" class="form-control" placeholder="Diesel Rate / Liter">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="FRatePerUnit" id="FRatePerUnit" class="form-control" placeholder="Rate">
                                </div>
                                <div class="form-group pull-right">
                                    <input type="submit" class="btn btn-success" value="Add">
                                    <input type="submit" class="btn btn-danger" value="Clear">
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select name="tariff_code" id="tariff_code" class="form-control select2">
                                    <option value="0">Select Code to Add Rates</option>
                                    @foreach ($code_types as $code_type)
                                        <option value="{{ $code_type->CodeType }}">{{ $code_type->CodeType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Code Name</th>
                                        <th>Range</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>
                                <tbody id="contentId">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Rate LTR</th>
                                        <th>Rate/Unit</th>
                                        <th>Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="RateLTR"></td>
                                        <td id="RateUnit"></td>
                                        <td id="Code"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success pull-right" value="Save Changes">
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
            $("#FRatePerLtr").keyup(function(){
                var FRatePerLtr = $(this).val();
                var rate = (FRatePerLtr - 7.05) * 0.3;
                $("#FRatePerUnit").val(number_format(rate));
                if(FRatePerLtr == 0 || FRatePerLtr == ''){
                    $("#FRatePerUnit").val('');
                }
            });

            $("#tariff_code").change(function(){
                var id = $(this).val();
                var op= "";
                $.ajax({
                    type:'get',
                    url: '{!! url("/select/ltr/unit") !!}/'+id,
                    success:function (data) {
                        // console.log(data);
                        $("#RateLTR").html(data.FRatePerLtr);
                        $("#RateUnit").html(data.FRatePerUnit);
                        $("#Code").html(data.CodeType);
                    }
                });
                $.ajax({
                    type:'get',
                    url: '{!! url("/select/code/range/rate") !!}/'+id,
                    success:function (data) {
                        // console.log(data);
                        for (var i=0; i<data.length; i++) {
                            op +='<tr>\n' +
                                '                                    <td>'+data[i].TCode+'</td>\n' +
                                '                                    <td>'+data[i].RtId+' - '+data[i].TRate+'</td>\n' +
                                '                                    <td>'+data[i].Rate+'</td>\n' +
                                '                                </tr>';
                        }
                        $('#contentId').html(op);
                    }
                });
            });
        });

        //====================Format Money Content=========================//
        // start number format
        function number_format(number, decimals, dec_point, thousands_point) {
            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }
            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }
            if (!dec_point) {
                dec_point = '.';
            }
            if (!thousands_point) {
                thousands_point = ',';
            }
            number = parseFloat(number).toFixed(decimals);
            number = number.replace(".", dec_point);
            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);
            return number;
        }
        //====================Format Money Content=========================//
    </script>
@endsection



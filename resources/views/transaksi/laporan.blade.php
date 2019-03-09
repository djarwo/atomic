@extends('layouts.master')

@section('css')
    <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content scroll" >
            @include('layouts.notification')
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-file"></i>
                                <span class="caption-subject font-dark bold uppercase">Laporan Transaksi</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route('transaksi.laporanresult') }}" id="my-form" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tanggal Awal
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('tanggal_awal')? 'has-error' : '')}}">
                                                        <div class="input-group date date-picker"
                                                            data-date-start-date="+0d" id="start-date">
                                                            <input type="text" class="form-control" name="tanggal_awal" placeholder="Awal"
                                                                value="{{ old('tanggal_awal') }}" readonly required>
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <span class="text-danger" id="span_tanggal_awal">{{ $errors->first('tanggal_awal') }}</span>                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tanggal Akhir
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('tanggal_akhir')? 'has-error' : '')}}">
                                                        <div class="input-group date date-picker"
                                                            data-date-start-date="+0d" id="end-date">
                                                            <input type="text" class="form-control" name="tanggal_akhir" placeholder="Akhir"
                                                                value="{{ old('tanggal_akhir') }}" readonly required>
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <span class="text-danger" id="span_tanggal_akhir">{{ $errors->first('tanggal_akhir') }}</span>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Kategori
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('kategori')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <select name="kategori" class="form-control" id="select">
                                                                    <option value="semuaKategori">Semua</option>
                                                                @foreach($kategori as $dataKategori)
                                                                    <option value="{{ $dataKategori->id }}"
                                                                        {{ old('kategori') == $dataKategori->id ? 'selected' : '' }}>
                                                                        {{ $dataKategori->nama }}
                                                                    </option>
                                                                @endforeach                                                                                                                    
                                                            </select>
                                                            <span class="text-danger" id="span_kategori">{{ $errors->first('kategori') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Dompet
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('dompet')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <select name="dompet" class="form-control" id="select2">
                                                                    <option value="semuaDompet">Semua</option>
                                                                @foreach($dompet as $dataDompet)
                                                                    <option value="{{ $dataDompet->id }}"
                                                                        {{ old('dompet') == $dataDompet->id ? 'selected' : '' }}>
                                                                        {{ $dataDompet->nama }}
                                                                    </option>
                                                                @endforeach                                                                                                                    
                                                            </select>
                                                            <span class="text-danger" id="span_dompet">{{ $errors->first('dompet') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn green pull-left button-submit">Tampilkan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('close_html')
    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" type="text/javascript"></script>
@endsection

@section('add_script')
    <script>
        $(document).ready(function(){
            $('#select2').select2();
            $('#select').select2();
        });

        $(document).ready(function() {
            $(".date-picker").datepicker().on('input change', function(e) {
                var start = $("input[name=start]").val();

                var now = moment();
                console.log(now);
            });

            $("#start-date").datepicker().on('input change', function(e) {
                var start = $("input[name=start]").val();

                var now = moment();
                console.log(now);

                // INI SUKSES //
                var dateNow = new Date();
                var dateStart = new Date(start);
                var dateDiff = parseInt((dateStart.getTime()-dateNow.getTime())/(24*3600*1000))+1;
                var yearNow = dateNow.getFullYear();
                var monthNow = dateNow.getMonth();
                var dayNow = dateNow.getDate();
                var lastDay = new Date(dateNow.getFullYear(), dateNow.getMonth()+1, 0);
                lastDay = lastDay.getDate();
                var arrDateDisabled = new Array();
                for (var i = 0; i < dateDiff; i++) {
                  if ((parseInt(dayNow)+i) > lastDay) {
                    arrDateDisabled[i] = (parseInt(monthNow)+2).toString()+'/'+(parseInt(dayNow)+i-parseInt(lastDay)).toString()+'/'+yearNow.toString();
                  } else {
                    arrDateDisabled[i] = (parseInt(monthNow)+1).toString()+'/'+(parseInt(dayNow)+i).toString()+'/'+yearNow.toString();
                  }
                }
                // console.log(arrDateDisabled);
                $("#end-date").datepicker('setDatesDisabled', arrDateDisabled);
                // END SUKSES //

            });
        });
    </script>
@endsection

@extends('layouts.master')

@section('css')
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
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
                                <i class="fa fa-money"></i>
                                <span class="caption-subject font-dark bold uppercase">Tambah Dompet</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route('dompet.store') }}" id="my-form" role="form" class="form-horizontal" method="post">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Dompet
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            
                                        </div>

                                        <label class="control-label col-md-2">Nilai
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 ">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                   <span class="text-danger" id="span_address"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group margin-top-20">
                                        <label class="control-label col-md-2">Deskripsi</label>
                                        <div class="col-md-10">                                            
                                              <span class="text-danger" id="span_address"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ route('dompet.index') }}" class="btn default pull-left">Batal</a>
                                            <button type="submit" class="btn green pull-left button-submit">Tambah</button>
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
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" type="text/javascript"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Saldo\CreateSaldoFormRequest', '#my-form'); !!}
@endsection

@section('add_script')
    <script>
        $(".date-picker").datepicker();

        $(document).ready(function(){
            $('.select2').select2();
        });
    </script>
@endsection

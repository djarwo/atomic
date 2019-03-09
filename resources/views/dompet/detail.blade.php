@extends('layouts.master')

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
                                <span class="caption-subject font-dark bold uppercase">Detail Dompet</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Nama
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i></i>
                                                        <span class="text-default" id="span_nama">{{ $dompet->nama }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Referensi
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i></i>
                                                        <span class="text-default" id="span_referensi">{{ $dompet->referensi }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Deskripsi
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i></i>
                                                        <span class="text-default" id="span_deskripsi">{{ $dompet->deskripsi }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Status Dompet
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i></i>
                                                        <span class="text-default" id="span_status">{{ $dompet->dompetStatus()->first()->nama }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
@endsection

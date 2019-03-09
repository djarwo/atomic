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
                                <span class="caption-subject font-dark bold uppercase">Tambah Dompet Keluar</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route('transaksiout.store') }}" id="my-form" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Kode
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('kode')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <input readonly type="text" class="form-control" name="kode" placeholder="Kode" value="{{ old('kode',$kode) }}"/>
                                                            <span class="text-danger" id="span_kode">{{ $errors->first('kode') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tanggal
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('tanggal')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <input readonly type="text" class="form-control" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal',date('Y-m-d')) }}"/>
                                                            <span class="text-danger" id="span_tanggal">{{ $errors->first('tanggal') }}</span>
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
                                                    <label class="control-label col-md-4">Kategori
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('kategori_id')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <select name="kategori_id" class="form-control" id="select2">
                                                                @foreach($kategori as $dataKategori)
                                                                    <option value="{{ $dataKategori->id }}"
                                                                        {{ old('kategori_id') == $dataKategori->id ? 'selected' : '' }}>
                                                                        {{ $dataKategori->nama }}
                                                                    </option>
                                                                @endforeach                                                                                                                    
                                                            </select>
                                                            <span class="text-danger" id="span_kategori_id">{{ $errors->first('kategori_id') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Dompet
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('dompet_id')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <select name="dompet_id" class="form-control" id="select">
                                                                @foreach($dompet as $dataDompet)
                                                                    <option value="{{ $dataDompet->id }}"
                                                                        {{ old('dompet_id') == $dataDompet->id ? 'selected' : '' }}>
                                                                        {{ $dataDompet->nama }}
                                                                    </option>
                                                                @endforeach                                                                                                                    
                                                            </select>
                                                            <span class="text-danger" id="span_dompet_id">{{ $errors->first('dompet_id') }}</span>
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
                                                    <label class="control-label col-md-4">Nilai
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('nilai')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <input type="text" class="form-control" name="nilai" placeholder="Nilai" value="{{ old('nilai') }}"/>
                                                            <span class="text-danger" id="span_nilai">{{ $errors->first('nilai') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Deskripsi
                                                    </label>
                                                    <div class="col-md-10 {{($errors->has('deskripsi')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>                                                            
                                                            <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                                                            <span class="text-danger" id="span_deskripsi">{{ $errors->first('deskripsi') }}</span>
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
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" type="text/javascript"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Transactions\CreateTransaksiInFormRequest', '#my-form'); !!}
@endsection

@section('add_script')
    <script>
        $(document).ready(function(){
            $('#select2').select2();

            $('#select').select2();
        });
    </script>
@endsection

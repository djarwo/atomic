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
                                <i class="fa fa-list-alt"></i>
                                <span class="caption-subject font-dark bold uppercase">Edit Kategori</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route('kategori.update',$kategori->id) }}" id="my-form" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Nama
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('nama')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama',$kategori->nama) }}"/>
                                                            <span class="text-danger" id="span_nama">{{ $errors->first('nama') }}</span>
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
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10 {{($errors->has('deskripsi')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>                                                            
                                                            <textarea name="deskripsi" class="form-control">{{ old('deskripsi',$kategori->deskripsi) }}</textarea>
                                                            <span class="text-danger" id="span_deskripsi">{{ $errors->first('deskripsi') }}</span>
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
                                                    <label class="control-label col-md-4">Status
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8 {{($errors->has('status')? 'has-error' : '')}}">
                                                        <div class="input-icon right">
                                                            <i></i>
                                                            <select name="status" class="form-control" id="select2">
                                                                @foreach($kategoriStatus as $status)
                                                                    <option value="{{ $status->id }}"
                                                                        {{ old('status',$kategori->kategori_status_id) == $status->id ? 'selected' : '' }}>
                                                                        {{ $status->nama }}
                                                                    </option>
                                                                @endforeach                                                                                                                    
                                                            </select>
                                                            <span class="text-danger" id="span_status">{{ $errors->first('status') }}</span>
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
                                            <a href="{{ route('kategori.index') }}" class="btn default pull-left">Batal</a>
                                            <button type="submit" class="btn green pull-left button-submit">Edit</button>
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
    {!! JsValidator::formRequest('App\Http\Requests\Kategoris\UpdateKategoriFormRequest', '#my-form'); !!}
@endsection

@section('add_script')
    <script>
        $(document).ready(function(){
            $('#select2').select2();
        });
    </script>
@endsection

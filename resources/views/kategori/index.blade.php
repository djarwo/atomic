@extends('layouts.master')

@section('css')
  <link href="{{asset('assets/datatables/bootstrapmodal/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/datatables/bootstrapmodal/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @include('layouts.notification')
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="fa fa-list-alt"></i>
                                <span class="caption-subject bold uppercase">Kategori</span>
                            </div>
                            <div class="actions Kategori">
                                <a title="Kembali" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a title="Tambah Kategori" class="btn btn-circle btn-icon-only btn-default" href="{{ route('kategori.create') }}">
                                    <i class="fa fa-plus fa-3x"></i>
                                </a>
                                <button type="button" class="btn btn-primary">
                                    Kategori Aktif <span class="badge badge-light">{{$active}}</span>
                                </button>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>                                        
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @forelse($kategoris as $key => $kategori)                           
                                        <tr>
                                            <td class="text-center" width="5%">{{++$key}}</td>
                                            <td>{{$kategori->nama}}</td>                                            
                                            <td>{{$kategori->deskripsi}}</td>
                                            <td>{{$kategori->kategoriStatus()->first()->nama}}</td>
                                            <td class="act">
                                                <a href="{{ route('kategori.edit',$kategori->id) }}"
                                                    class="btn btn-outline btn-circle yellow btn-sm yellow" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="{{ route('kategori.show',$kategori->id) }}"
                                                    class="btn btn-outline btn-circle blue btn-sm blue" title="Edit">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                @if($kategori->kategoriStatus()->first()->nama == 'Tidak Aktif')
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('kategori.active', $kategori->id) }}"
                                                        data-token="{{ csrf_token() }}"
                                                        data-confirm="Anda akan mengaktifkan data ini"
                                                        class="btn btn-outline btn-circle dark btn-sm green btn-active"
                                                        title="Active">
                                                            <i class="fa fa-check"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('kategori.nonactive', $kategori->id) }}"
                                                        data-token="{{ csrf_token() }}"
                                                        data-confirm="Anda akan non-aktifkan data ini"
                                                        class="btn btn-outline btn-circle dark btn-sm red btn-nonactive"
                                                        title="Non Active">
                                                            <i class="fa fa-close"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h4>Data Tidak Ditemukan</h4>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection

  @section('close_html')
    <script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{asset('assets/datatables/bootstrapmodal/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/datatables/bootstrapmodal/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/datatables/bootstrapmodal/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/datatables/bootstrapmodal/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/datatables/bootstrapmodal/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
  @endsection

  @section('add_script')
    <script>
        $(document).ready(function(){
            $('.select2').select2();
        });
        $(document).ready(function() {
            $('#example').DataTable( {
                lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "ALL"]]
            } );
        } );    

        // Sweet Alert
        $(document).on("click", '.btn-active', function(){
            var _this = $(this);

            swal({
                title: "Apakah Anda Yakin Untuk Mengaktifkan Kategori?",
                text: _this.data().confirm,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak",
                closeOnConfirm: false
            }, function(){
                $.ajax({
                    url: _this.data().url,
                    method: 'get',
                    data: { '_token': _this.data().token },
                    success: function(response) {
                        swal({
                            title: "Berhasil Diaktifkan Kategori!",
                            text: response.message,
                            type: 'success'
                        }, function() {
                            if(response.redirect == window.location)
                            {
                                window.location.reload();
                            } else {
                                window.location.href = response.redirect;
                            }
                        })
                    },
                    error: function(response) {
                        swal('Gagal Mengaktifkan Kategori!', response.message, "error")
                    }
                });
            });
        });

        $(document).on("click", '.btn-nonactive', function(){
            var _this = $(this);

            swal({
                title: "Apakah Anda Yakin Untuk Non-Aktifkan Kategori?",
                text: _this.data().confirm,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak",
                closeOnConfirm: false
            }, function(){
                $.ajax({
                    url: _this.data().url,
                    method: 'get',
                    data: { '_token': _this.data().token },
                    success: function(response) {
                        swal({
                            title: "Berhasil Non-Aktifkan Kategori!",
                            text: response.message,
                            type: 'success'
                        }, function() {
                            if(response.redirect == window.location)
                            {
                                window.location.reload();
                            } else {
                                window.location.href = response.redirect;
                            }
                        })
                    },
                    error: function(response) {
                        swal('Gagal Non-Aktifkan Kategori!', response.message, "error")
                    }
                });
            });
        });
  </script>
@endsection

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
                                <i class="fa fa-money"></i>
                                <span class="caption-subject bold uppercase">Dompet</span>
                            </div>
                            <div class="actions Dompet">
                                <a title="Kembali" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a title="Tambah Dompet" class="btn btn-circle btn-icon-only btn-default" href="{{ route('dompet.create') }}">
                                    <i class="fa fa-plus fa-3x"></i>
                                </a>
                                <button type="button" class="btn btn-primary">
                                    Dompet Aktif <span class="badge badge-light">{{$active}}</span>
                                </button>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Referensi</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @forelse($dompets as $key => $dompet)                           
                                        <tr>
                                            <td class="text-center" width="5%">{{++$key}}</td>
                                            <td>{{$dompet->nama}}</td>
                                            <td>{{$dompet->referensi}}</td>
                                            <td>{{$dompet->deskripsi}}</td>
                                            <td>{{$dompet->dompetStatus()->first()->nama}}</td>
                                            <td class="act">
                                                <a href="{{ route('dompet.edit',$dompet->id) }}"
                                                    class="btn btn-outline btn-circle yellow btn-sm yellow" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                @if($dompet->dompetStatus()->first()->nama == 'Tidak Aktif')
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('dompet.active', $dompet->id) }}"
                                                        data-token="{{ csrf_token() }}"
                                                        data-confirm="Anda akan mengaktifkan data ini"
                                                        class="btn btn-outline btn-circle dark btn-sm green btn-active"
                                                        title="Active">
                                                            <i class="fa fa-check"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('dompet.nonactive', $dompet->id) }}"
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
                                        <td colspan="6" class="text-center">
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
                title: "Apakah Anda Yakin Untuk Mengaktifkan Dompet?",
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
                    method: 'delete',
                    data: { '_token': _this.data().token },
                    success: function(response) {
                        swal({
                            title: "Berhasil Diaktifkan!",
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
                        swal('Gagal Mengaktifkan Dompet!', response.message, "error")
                    }
                });
            });
        });

        $(document).on("click", '.btn-nonactive', function(){
            var _this = $(this);

            swal({
                title: "Apakah Anda Yakin Untuk Non-Aktifkan Dompet?",
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
                    method: 'delete',
                    data: { '_token': _this.data().token },
                    success: function(response) {
                        swal({
                            title: "Berhasil Non-Aktifkan Dompet!",
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
                        swal('Gagal Non-Aktifkan Dompet!', response.message, "error")
                    }
                });
            });
        });
  </script>
@endsection

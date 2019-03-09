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
                                <i class="fa fa-shopping-cart"></i>
                                <span class="caption-subject bold uppercase">Dompet Keluar</span>
                            </div>
                            <div class="actions Dompet Keluar">
                                <a title="Kembali" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a title="Tambah Dompet Keluar" class="btn btn-circle btn-icon-only btn-default" href="{{ route('transaksiout.create') }}">
                                    <i class="fa fa-plus fa-3x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>                                        
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori</th>
                                        <th>Nilai</th>
                                        <th>Dompet</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @forelse($transaksiOut as $key => $transaksi)                           
                                        <tr>
                                            <td class="text-center" width="5%">{{++$key}}</td>
                                            <td>{{$transaksi->date}}</td>                                            
                                            <td>{{$transaksi->code}}</td>
                                            <td>{{$transaksi->deskripsi}}</td>     
                                            <td>{{$transaksi->kategori()->first()->nama}}</td>                                       
                                            <td>(-) {{$transaksi->nilai}}</td>
                                            <td>{{$transaksi->dompet()->first()->nama}}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
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
  </script>
@endsection

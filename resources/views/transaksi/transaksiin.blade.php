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
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="4%">No</th>
                                        <th>Nama</th>
                                        <th width="14%">Tanggal</th>
                                        <th width="34%">Keterangan</th>
                                        <th width="10%">Debit</th>
                                        <th width="10%">Kredit</th>
                                        <th width="10%">Sisa</th>
                                    </tr>
                                </thead>
                                <tbody>                               
                                    <tr>
                                        <td class="text-center"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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

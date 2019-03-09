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
                                <span class="caption-subject bold uppercase">Riwayat Transaksi</span>
                            </div>
                            <div class="actions Riwayat Transaksi">
                                <a title="Kembali" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a title="Print Transaksi" class="btn btn-circle btn-icon-only btn-default" href="#" onclick="printmultiple(this,event,'transaksi')">
                                    <i class="fa fa-print"></i>
                                </a>
                                <a title="Download Transasi" class="btn btn-circle btn-icon-only btn-default" onclick="">
                                    <i class="fa fa-download"></i>
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
                                        <th>Dompet</th>
                                        <th>Kategori</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @php
                                     $masuk = 0;
                                     $keluar= 0;  
                                     $total= 0;   
                                    @endphp
                                    @forelse($transaksiResult as $key => $result)                           
                                        <tr>
                                            <td class="text-center" width="5%">{{++$key}}</td>
                                            <input type="hidden" id="{{$result->id}}" class="cek" name="cek[]">
                                            <td>{{date('Y-m-d',strtotime($result->date))}}</td>                                            
                                            <td>{{$result->code}}</td>
                                            <td>{{$result->deskripsi}}</td>
                                            <td>{{$result->dompet()->first()->nama}}</td>
                                            <td>{{$result->kategori()->first()->nama}}</td>
                                            @if($result->transaksiStatus()->first()->nama == 'Masuk')
                                                <td style="text-align:right">(+) {{"Rp " . number_format($result->nilai,2,',','.')}}</td>
                                                @php
                                                    $masuk  += $result->nilai;
                                                @endphp
                                            @else
                                                <td style="text-align:right">(-) {{"Rp " . number_format($result->nilai,2,',','.')}}</td>
                                                @php
                                                    $keluar += $result->nilai;
                                                @endphp
                                            @endif
                                            
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <h4>Data Tidak Ditemukan</h4>
                                        </td>
                                    </tr>
                                    @endforelse

                                    @php
                                        $total = $masuk - $keluar;
                                    @endphp
                                </tbody>
                                <tfoot>
                                    <tr style="text-align:right">
                                        <td colspan="6" >
                                            Total Uang Masuk
                                        </td>
                                        <td>
                                            (+) {{"Rp " . number_format($masuk,2,',','.')}}
                                        </td>
                                    </tr>

                                    <tr style="text-align:right">
                                        <td colspan="6" style="text-align:right">
                                            Total Uang Keluar
                                        </td>
                                        <td>
                                            (-) {{"Rp " . number_format($keluar,2,',','.')}}
                                        </td>
                                    </tr>

                                    <tr style="text-align:right">
                                        <td colspan="6" style="text-align:right">
                                            Total
                                        </td>
                                        <td>
                                            {{"Rp " . number_format($total,2,',','.')}}
                                        </td>
                                    </tr>
                                </tfoot>
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
        $(document).ready(function() {
            $('#example').DataTable( {
                lengthMenu: [[40, 100, 200, -1], [40, 100, 200, "ALL"]]
            } );
        } );
        
        function printmultiple(param, e,table){
            e.preventDefault();
            var indek=[];
            var i=0;
            $(".cek" ).each(function() {            
                indek.push(this.id);
                i++                            
            });
            window.open("{{url('')}}/"+table+"/multipleprint/"+indek);
    	  }

  </script>
@endsection

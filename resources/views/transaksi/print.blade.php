<style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    table.transaksi, table.transaksi > thead > tr > th, table.transaksi > tbody > tr > td, table.transaksi > tfoot > tr > td {
      text-align: center;
      border: 1px solid black;
      height:  40px;
    }
    table.transaksi > tfoot > tr > td{
        text-align: right;
    }
</style>
<script type="text/javascript">
    print();
</script>

<div class="content" style="padding-top:0px;">
    <h1 style="text-align: center;">Riwayat Transaksi</h1>
    <h3 style="text-align: center;">{{$startDate}} - {{$endDate}}</h3>
    <body style="padding-top:0px;">        
        <div class="">
            <table style="width:100%" class="transaksi">
                <thead>
                    <tr>
                        <th class="table_detail">No</th>
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
                        $masuk  = 0;
                        $keluar = 0;  
                        $total  = 0;  
                        $no     = 0;                     
                    @endphp
                    @forelse($dataTransaksi as $key => $result)                     
                        <tr>
                            <td class="text-center" width="5%">{{++$key}}</td>
                            <td class="table_detail">{{ date('Y-m-d',strtotime($result->date))}}</td>                                            
                            <td>{{ $result->code }}</td>
                            <td>{{ $result->deskripsi }}</td>
                            <td>{{ $result->dompet()->first()->nama }}</td>
                            <td>{{ $result->kategori()->first()->nama }}</td>
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
                    <?php                    
                        $total = $masuk - $keluar;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            Total Uang Masuk
                        </td>
                        <td>
                            (+) <?php echo "Rp " . number_format($masuk,2,',','.'); ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            Total Uang Keluar
                        </td>
                        <td>
                            (-) <?php echo "Rp " . number_format($keluar,2,',','.'); ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            Total
                        </td>
                        <td>
                            <?php echo "Rp " . number_format($total,2,',','.'); ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</div>
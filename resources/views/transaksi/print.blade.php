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
</style>
<script type="text/javascript">
    print();
</script>

<div class="content" style="padding-top:0px;">
    <h1 style="text-align: center;">Riwayat Transaksi</h1>
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
                    <?php
                        $masuk  = 0;
                        $keluar = 0;  
                        $total  = 0;                       
                    foreach($dataTransaksi as $key => $result){ ?>                       
                        <tr>
                            <td class="text-center" width="5%"><?php $key++;?></td>
                            <td class="table_detail"><?php echo date('Y-m-d',strtotime($result->date)) ?></td>                                            
                            <td><?php echo $result->code ?></td>
                            <td><?php echo $result->deskripsi ?></td>
                            <td><?php echo $result->dompet()->first()->nama ?></td>
                            <td><?php echo $result->kategori()->first()->nama ?></td>
                            <?php if($result->transaksiStatus()->first()->nama == 'Masuk'){ ?>
                                <td style="text-align:right">(+) {{"Rp " . number_format($result->nilai,2,',','.')}}</td>
                                <?php
                                    $masuk  += $result->nilai;
                                
                            }else{ ?>
                                <td style="text-align:right">(-) {{"Rp " . number_format($result->nilai,2,',','.')}}</td>
                                 <?php
                                    $keluar += $result->nilai;
                            } ?>
                            
                        </tr>                                    
                    <?php
                    }
                        $total = $masuk - $keluar;
                    ?>
                </tbody>
                <tfoot>
                    <tr style="text-align:right">
                        <td colspan="6" >
                            Total Uang Masuk
                        </td>
                        <td>
                            (+) <?php echo "Rp " . number_format($masuk,2,',','.'); ?>
                        </td>
                    </tr>

                    <tr style="text-align:right">
                        <td colspan="6" style="text-align:right">
                            Total Uang Keluar
                        </td>
                        <td>
                            (-) <?php echo "Rp " . number_format($keluar,2,',','.'); ?>
                        </td>
                    </tr>

                    <tr style="text-align:right">
                        <td colspan="6" style="text-align:right">
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
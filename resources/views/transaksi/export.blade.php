
<table>
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
            @foreach($transaksi as $key => $data)
            <tr>            
                <td>{{++$key}}</td>
                <td>{{date('Y-m-d',strtotime($data->date))}}</td>
                <td>{{$data->code}}</td>
                <td>{{$data->deskripsi}}</td>
                <td>{{$data->dompet()->first()->nama}}</td>            
                <td>{{$data->kategori()->first()->nama}}</td>            
                <td>{{"Rp " . number_format($data->nilai,2,',','.')}}</td>            
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
        
            </tr>
        </tfoot>
    </table>

<table>
        <thead>
            <tr>
                <th>Tgl Order</th>
                <th>No. Po</th>
                <th>Tgl Kirim</th>
                <th>No. Invoice</th>
                <th>Van #</th>
                <th>Area</th>                           
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>            
                <td style="width:100%;">{{date('Y-m-d',strtotime($order->date))}}</td>
                <td>{{$order->delivery->no_po}}</td>
                <td>{{$order->delivery == null ? '' : $order->delivery->deliver_date}}</td>
                <td>{{$order->invoice}}</td>            
                <td></td>
                <td></td>            
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
        
            </tr>
        </tfoot>
    </table>
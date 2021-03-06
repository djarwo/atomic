<?php

namespace App\Http\Controllers;

use Excel;
use App\Dompet;
use App\Kategori;
use App\Transaksi;
use App\TransaksiStatus;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use App\Jobs\Transaksi\CreateTransaksiIn;
use App\Jobs\Transaksi\CreateTransaksiOut;
use App\Http\Requests\Transactions\CreateTransaksiInFormRequest;
use App\Http\Requests\Transactions\CreateTransaksiOutFormRequest;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');                     
        $this->data['setPageTitle'] = '';
        $this->data['activeMenu']   = ['transaksi','transaksiin'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['setPageTitle'] = 'Halaman Dompet';
        return view('transaksi.index')->with('data',$this->data);
    }

    public function transaksiin()
    {
        $this->data['setPageTitle'] = 'Halaman Dompet Masuk';

        $transaksiIn = Transaksi::whereHas('transaksiStatus',function($query){
            $query->where('nama','Masuk');
        })->get();

        return view('transaksi.transaksiin')
        ->with('data',$this->data)
        ->with('transaksiIn',$transaksiIn);
    }

    public function transaksiout()
    {
        $this->data['activeMenu']   = ['transaksi','transaksiout'];
        $this->data['setPageTitle'] = 'Halaman Dompet Keluar';

        $transaksiOut = Transaksi::whereHas('transaksiStatus',function($query){
            $query->where('nama','Keluar');
        })->get();
        return view('transaksi.transaksiout')
        ->with('data',$this->data)
        ->with('transaksiOut',$transaksiOut);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaksiIn()
    {        
        $this->data['setPageTitle'] = 'Halaman Tambah Dompet Masuk';

        $dompet     = Dompet::whereHas('dompetStatus',function($query){
            $query->where('nama','Aktif');
        })->orderBy('nama','ASC')->get();

        $kategori   = Kategori::whereHas('kategoriStatus',function($query){
            $query->where('nama','Aktif');
        })->orderBy('nama','ASC')->get();

        $kode       = $this->kode('In');

        return view('transaksi.create_transaksi_in')        
        ->with('kode',$kode)
        ->with('dompet',$dompet)
        ->with('data',$this->data)
        ->with('kategori',$kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransaksiIn(CreateTransaksiInFormRequest $request)
    {
        try {
            $this->dispatch(new CreateTransaksiIn($request));
        } catch (\Exception $e) {
            $log_code                     = 'Dompet_Masuk'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('transaksiin.index')
        ->with('success', 'Dompet Masuk berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTransaksiIn($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaksiOut()
    {
        $this->data['activeMenu']   = ['transaksi','transaksiout'];
        $this->data['setPageTitle'] = 'Halaman Tambah Dompet Keluar';

        $dompet     = Dompet::whereHas('dompetStatus',function($query){
            $query->where('nama','Aktif');
        })->get();

        $kategori   = Kategori::whereHas('kategoriStatus',function($query){
            $query->where('nama','Aktif');
        })->get();

        $kode       = $this->kode('Out');

        return view('transaksi.create_transaksi_out')        
        ->with('kode',$kode)
        ->with('dompet',$dompet)
        ->with('data',$this->data)
        ->with('kategori',$kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransaksiOut(CreateTransaksiOutFormRequest $request)
    {
        try {
            $this->dispatch(new CreateTransaksiOut($request));
        } catch (\Exception $e) {
            $log_code                     = 'Dompet_Keluar'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('transaksiout.index')
        ->with('success', 'Dompet Keluar berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTransaksiOut($id)
    {
        //
    }

    public function laporan()
    {
        $this->data['setPageTitle'] = 'Halaman Laporan Transaksi';
        $dompet     = Dompet::whereHas('dompetStatus',function($query){
            $query->where('nama','Aktif');
        })->get();

        $kategori   = Kategori::whereHas('kategoriStatus',function($query){
            $query->where('nama','Aktif');
        })->get();
        $this->data['activeMenu']   = ['laporan','laporan'];

        return view('transaksi.laporan')        
        ->with('dompet',$dompet)
        ->with('data',$this->data)
        ->with('kategori',$kategori);
    }

    public function laporanresult(Request $request)
    {
        $this->data['setPageTitle'] = 'Halaman Laporan Transaksi (Result)';
        $this->data['activeMenu']   = ['laporan','laporan'];
        $transaksi          = Transaksi::query();
        $transaksiResult    = $this->search($request,$transaksi);
        
        return view('transaksi.laporan_result')
        ->with('transaksiResult',$transaksiResult->get())
        ->with('data',$this->data)
        ->with('request',$request);
    }

    public function download($param,$date)
    {
        $transaksi                        = Transaksi::query();
        $id_multi                         = explode(',', $param);
        $date_multi                       = explode(',', $date);

        foreach ($id_multi as $key => $value) {
            $transaksi                    = $transaksi->orWhere('id',$value);
        }
        $dataTransaksi                    = $transaksi->get();

        try {
        $excel  =   Excel::download(new TransaksiExport($dataTransaksi), "Data Transaksi ".$date_multi[0]." - ".$date_multi[1].".xls");	
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
        
        return $excel;
    }

    public function search($request,$transaksi)
    {
        if($request->dompet == 'semuaDompet'){
            $transaksi = $transaksi->where('dompet_id',$request->dompet);
        }

        if($request->kategori == 'semuaKategori'){
            $transaksi = $transaksi->where('kategori_id',$request->kategori);
        }

        if($request->tanggal_awal!=null||$request->tanggal_akhir!=null){               
            if($request->tanggal_awal == $request->tanggal_akhir){            
                $transaksi = $transaksi->whereDate('date',date('Y-m-d',strtotime($request->tanggal_awal)));   
            }else if($request->tanggal_awal!=null&&$request->tanggal_akhir!=null){            
                $transaksi = $transaksi->whereBetween('date',[date('Y-m-d',strtotime($request->tanggal_awal)),date('Y-m-d',strtotime($request->tanggal_akhir))]);   
            }else if($request->tanggal_awal!=null&&$request->tanggal_akhir==null){                
                $transaksi = $transaksi->orWhereDate('date',date('Y-m-d',strtotime($request->tanggal_awal)));                   
            }else if($request->tanggal_akhir!=null&&$request->tanggal_awal==null){                
                $transaksi = $transaksi->orWhereDate('date',date('Y-m-d',strtotime($request->tanggal_akhir)));                   
            }                       
        }      

        return $transaksi;
    }

    public function multipleprint($param,$date)
    {
        $transaksi                        = Transaksi::query();
        $id_multi                         = explode(',', $param);
        $date_multi                       = explode(',', $date);
        foreach ($id_multi as $key => $value) {
            $transaksi                    = $transaksi->orWhere('id',$value);
        }
        $dataTransaksi                    = $transaksi->get();
        
        return view('transaksi.print')        
        ->with('endDate',$date_multi[1])
        ->with('startDate',$date_multi[0])
        ->with('dataTransaksi',$dataTransaksi);
    }

    public function kode($act)
    {
        $transaksi  = Transaksi::orderBy('id', 'DESC')->first();
        $transaksiStatus  = TransaksiStatus::query();
              
        //set leng
        $no         = $transaksi == null ? 1 : $transaksi->id + 1;
        $lenght     = strlen((string)$no);  
        $loop       = 6 - $lenght;
        $number     = null;

        //get 0 digit
        for ($i=0; $i < $loop; $i++) { 
            $number = $number.'0';
        }

        //set in or out code
        if($act == 'In'){
            $transaksiStatus = $transaksiStatus->where('nama', 'Masuk')->first();
        }else{
            $transaksiStatus = $transaksiStatus->where('nama', 'Keluar')->first();
        }

        $status     = $transaksiStatus->id;
        $code       = 'WIN'.$number.$no.'-'.$status;
        
        return $code;
    }
    

}

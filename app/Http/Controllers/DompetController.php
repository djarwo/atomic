<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Dompet;
use App\DompetStatus;
use Illuminate\Http\Request;
use App\Jobs\Dompet\CreateDompet;
use App\Jobs\Dompet\UpdateDompet;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Dompets\CreateDompetFormRequest;
use App\Http\Requests\Dompets\UpdateDompetFormRequest;

class DompetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');             
        $this->data['activeMenu']   = ['master', 'dompet'];
        $this->data['setPageTitle'] = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $this->data['setPageTitle'] = 'Halaman Dompet';

        $dompets        = Dompet::orderBy('nama', 'ASC')->get();
        $dompetActive   = Dompet::whereHas('dompetStatus',function($query){
            $query->where('nama','Aktif');
        })->count();
        
        return view('dompet.index')
        ->with('data',$this->data)
        ->with('dompets',$dompets)
        ->with('active',$dompetActive);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['setPageTitle'] = 'Halaman Tambah Dompet';

        $dompetStatus = DompetStatus::all();
        return view('dompet.create')
        ->with('data',$this->data)
        ->with('dompetStatus',$dompetStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDompetFormRequest $request)
    {
        try {
            $this->dispatch(new CreateDompet($request));
        } catch (\Exception $e) {
            $log_code                     = 'Dompet'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('dompet.index')
        ->with('success', 'Dompet berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dompet $dompet)
    {
        $this->data['setPageTitle'] = 'Halaman Tambah Dompet';
        
        $dompetStatus = DompetStatus::all();
        $dompet = Dompet::findOrfail($dompet->id);
        return view('dompet.edit')
        ->with('data',$this->data)
        ->with('dompet',$dompet)
        ->with('dompetStatus',$dompetStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDompetFormRequest $request,Dompet $dompet)
    {
        try {
            $this->dispatch(new UpdateDompet($request, $dompet));
        } catch (\Exception $e) {
            $log_code                     = 'Dompet'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('dompet.index')
        ->with('success', 'Dompet berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Aktifkan Dompet
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Dompet $dompet)
    {
        //
    }

    /**
     * Non-Aktifkan Dompet
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nonactive(Dompet $dompet)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\KategoriStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Jobs\Kategori\CreateKategori;
use App\Jobs\Kategori\UpdateKategori;
use App\Jobs\Kategori\ActiveKategori;
use App\Jobs\Kategori\NonActiveKategori;
use App\Http\Requests\Kategoris\CreateKategoriFormRequest;
use App\Http\Requests\Kategoris\UpdateKategoriFormRequest;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');             
        $this->data['activeMenu']   = ['master','kategori'];
        $this->data['setPageTitle'] = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $this->data['setPageTitle'] = 'Halaman Kategori';        

        $kategoris        = Kategori::orderBy('nama', 'ASC')->get();
        $kategoriActive   = Kategori::whereHas('kategoriStatus',function($query){
            $query->where('nama','Aktif');
        })->count();
        
        return view('kategori.index')
        ->with('data',$this->data)
        ->with('kategoris',$kategoris)
        ->with('active',$kategoriActive);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['setPageTitle'] = 'Halaman Tambah Kategori';

        $kategoriStatus = KategoriStatus::all();
        return view('kategori.create')
        ->with('data',$this->data)
        ->with('kategoriStatus',$kategoriStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKategoriFormRequest $request)
    {
        try {
            $this->dispatch(new CreateKategori($request));
        } catch (\Exception $e) {
            $log_code                     = 'Kategori'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('kategori.index')
        ->with('success', 'Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        $this->data['setPageTitle'] = 'Halaman Detail Kategori';
        
        $kategori = Kategori::with('kategoriStatus')->where('id',$kategori->id)->first();
        return view('kategori.detail')
        ->with('data',$this->data)
        ->with('kategori',$kategori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $this->data['setPageTitle'] = 'Halaman Edit Kategori';
        
        $kategoriStatus = KategoriStatus::all();
        $kategori = Kategori::findOrfail($kategori->id);
        return view('kategori.edit')
        ->with('data',$this->data)
        ->with('kategori',$kategori)
        ->with('kategoriStatus',$kategoriStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriFormRequest $request, Kategori $kategori)
    {
        try {
            $this->dispatch(new UpdateKategori($request, $kategori));
        } catch (\Exception $e) {
            $log_code                     = 'Kategori'.date('my').rand('000','999');
            //$this->dispatch(new CreateErrorLog($e,$log_code));
            return redirect()->back()->with('danger','Terjadi Kesalahan !! (Input Kembali atau Hubungi admin '.$log_code.')')
                ->withInput();
        }

        return redirect()->route('kategori.index')
        ->with('success', 'Kategori berhasil diedit');
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
     * Aktifkan Kategori
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Kategori $kategori)
    {
        try {
            $this->dispatch(new ActiveKategori($kategori));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json([
            'message'                   => 'Data berhasil diaktifkan',
            'redirect'                  => route('kategori.index')
        ], 200);
    }

    /**
     * Non-Aktifkan Dompet
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nonactive(Kategori $kategori)
    {
        try {
            $this->dispatch(new NonActiveKategori($kategori));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json([
            'message'                   => 'Data berhasil dinon-aktifkan',
            'redirect'                  => route('kategori.index')
        ], 200);
    }
}

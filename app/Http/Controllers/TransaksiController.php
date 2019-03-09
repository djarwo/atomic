<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $this->data['setPageTitle'] = 'Halaman Transaksi';
        return view('transaksi.index')->with('data',$this->data);
    }

    public function transaksiin()
    {
        $this->data['activeMenu']   = ['transaksi','transaksiin'];
        $this->data['setPageTitle'] = 'Halaman Transaksi';
        return view('transaksi.transaksiin')->with('data',$this->data);
    }

    public function transaksiout()
    {
        $this->data['activeMenu']   = ['transaksi','transaksiout'];
        $this->data['setPageTitle'] = 'Halaman Transaksi';
        return view('transaksi.transaksiout')->with('data',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}

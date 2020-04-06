<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $sortir = $status == 'lunas' || $status == 'dikirim' ? 'asc' : 'desc';
        $result = Pesanan::where('status_pesanan','like',"%{$status}%")
            ->orderBy('tanggal_update', $sortir)->paginate(10);
        return view('admin.pesanan.index',['data'=>$result]);
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
    public function edit(Pesanan $pesanan)
    {
        return view('admin.pesanan.edit',['row'=>$pesanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
                'status'=>'required|in:belum_bayar,lunas,dikirim,selesai,batal'
            ]);
        $pesanan->update([
            'status_pesanan'=>$request->status,
        ]);

        return redirect()->route('pesanan.index')->with('update','Berhasil diupdate!');
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

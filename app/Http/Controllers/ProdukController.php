<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Produk::join('kategoris','kategoris.id','produks.id_kategori')
        ->where('produks.nama_produk','like',"%{$request->keyword}%")
        ->orWhere('kategoris.nama_kategori','like',"%{$request->keyword}%")
        ->select('produks.*')
        ->orderBy('produks.id','desc')->paginate();
        return view('admin.produk.index',[ 'data'=>$result ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                'kategori'=>'required|numeric',
                'nama_produk'=>'required|between:3,150',
                'harga'=>'required|numeric|digits_between:3,10',
                'gambar'=>'required|image',
                'deskripsi'=>'required|min:10',
            ]);
        
        $file = $request->file('gambar');
        $ext = $file->getClientOriginalExtension();
        $new_filename = date('YmdHis').'_'.rand().'_'.$ext;
        $file->move('images',$new_filename);

        Produk::create([
                'id_kategori'=>$request->kategori,
                'nama_produk'=>$request->nama_produk,
                'harga_produk'=>$request->harga,
                'file_gambar_produk'=>$new_filename,
                'deskripsi_produk'=>$request->deskripsi,
            ]);
        return redirect()->route('produk.index')->with('store','Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show',['row'=>$produk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit',['row'=>$produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
                'kategori'=>'required|numeric',
                'nama_produk'=>'required|between:3,150',
                'harga'=>'required|numeric|digits_between:3,10',
                'gambar'=>'required|image',
                'deskripsi'=>'required|min:10',
            ]);

        if(!empty($request->gambar)){

            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $new_filename = date('YmdHis').'_'.rand().'_'.$ext;
            $file->move('images',$new_filename);

            $query = [

                    'id_kategori'=>$request->kategori,
                    'nama_produk'=>$request->nama_produk,
                    'harga_produk'=>$request->harga,
                    'file_gambar_produk'=>$new_filename,
                    'deskripsi_produk'=>$request->deskripsi,
                ];

        } else {
            $query = [

                    'id_kategori'=>$request->kategori,
                    'nama_produk'=>$request->nama_produk,
                    'harga_produk'=>$request->harga,
                    'deskripsi_produk'=>$request->deskripsi,
                ];
        }
        $produk->update($query);
        return redirect()->route('produk.index')->with('update','Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('destroy','Berhasil Dihapus!');
    }
}

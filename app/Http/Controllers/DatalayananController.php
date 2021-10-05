<?php

namespace App\Http\Controllers;

use App\Models\DataLayanan;
use Illuminate\Http\Request;

class DatalayananController extends Controller
{

    public function index()
    {
        $data = DataLayanan::select('id','jenis_layanan','harga_layanan','created_at')->get();

        return view('admin.data_layanan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_layanan.add');
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
            'jenis_layanan' => 'required|unique:data_layanan',
            'harga_layanan' => 'required'
        ]);

        $data_layanan = new DataLayanan;
        $data_layanan->jenis_layanan = $request->jenis_layanan;
        $data_layanan->harga_layanan = $request->harga_layanan;
        
        if ($data_layanan->save()) {
            $message = "Layanan ".ucwords($request->jenis_layanan)." telah di tambahkan!";
            return redirect('/data-layanan')->with(['success' => $message]);
         } else {
            $message = "Gagal menambahkan data layanan";
            return back()->with(['errors' => $message]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\DataLayanan  $dataLayanan
     * @return \Illuminate\Http\Response
     */
    public function show(DataLayanan $dataLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\DataLayanan  $dataLayanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_layanan = DataLayanan::find($id);
        return view('admin.data_layanan.edit', ['data' => $data_layanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\DataLayanan  $dataLayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_layanan = DataLayanan::find($id);
        $data_layanan->jenis_layanan = $request->jenis_layanan;
        $data_layanan->harga_layanan = $request->harga_layanan;

        if ($data_layanan->save()) {
            $message = "Layanan ".ucwords($request->jenis_layanan)." telah di update!";
            return redirect('/data-layanan')->with(['update' => $message]);            
        } else {
            $message = "Gagal mengupdate layanan";
            return back()->with(['errors' => $message]);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\DataLayanan  $dataLayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_layanan = DataLayanan::find($id);
        $data_layanan->delete();
        return back();
    }
}

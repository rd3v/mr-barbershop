<?php

namespace App\Http\Controllers;

use App\Models\DataInformasi;
use Illuminate\Http\Request;

class DatainformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataInformasi::get();
        return view('admin.data_informasi.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_informasi.add');
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
            'text' => 'required',
        ]);

        $data_informasi = DataInformasi::count();
        if ($data_informasi == 3) {
            $message = "Informasi sudah ada 3 data";
            return back()->with(['warning' => $message]);
        }

        $data_informasi = new DataInformasi;
        $data_informasi->text = $request->text;
        
        if ($data_informasi->save()) {
            $message = "Layanan ".ucwords($request->text)." telah di tambahkan!";
            return redirect('/data-informasi')->with(['success' => $message]);
         } else {
            $message = "Gagal menambahkan data informasi";
            return back()->with(['errors' => $message]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataInformasi  $dataInformasi
     * @return \Illuminate\Http\Response
     */
    public function show(DataInformasi $dataInformasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataInformasi  $dataInformasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_informasi = DataInformasi::find($id);
        return view('admin.data_informasi.edit', ['data' => $data_informasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataInformasi  $dataInformasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_informasi = DataInformasi::find($id);
        $before_text = $data_informasi->text;
        $data_informasi->text = $request->text;

        if ($data_informasi->save()) {
            $message = "Informasi ".ucwords($request->text)." telah di update!";
            return redirect('/data-informasi')->with(['update' => $message]);            
        } else {
            $message = "Gagal mengupdate informasi";
            return back()->with(['errors' => $message]);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataInformasi  $dataInformasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_informasi = DataInformasi::find($id);
        $data_informasi->delete();
        return back();
    }
}

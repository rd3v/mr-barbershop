<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Hash;

class DatakapsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::select('id','name','username','email','no_hp','jenis_kelamin','alamat','foto')->where('level','kapster')->get();
        return view('admin.data_kapster.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_kapster.add');
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'no_hp' => 'required|unique:users',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make('12345');
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->level = 'kapster';
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        
        $new_name = $user->save_image_kapster($request->foto);
        $user->foto = $new_name;

        if ($user->save()) {
            $message = "Kapster ".ucwords($request->name)." telah di tambahkan!";
            return redirect('/data-kapster')->with(['success' => $message]);
         } else {
            $message = "Gagal menambahkan kapster";
            return back()->with(['errors' => $message]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataKapster  $dataKapster
     * @return \Illuminate\Http\Response
     */
    public function show(DataKapster $dataKapster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKapster  $dataKapster
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.data_kapster.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKapster  $dataKapster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        $kapster = User::find($id);
        $kapster->name = $request->name;
        $kapster->username = $request->username;
        
        if (User::where('email', $request->email)->count() != 1) {
            $kapster->email = $request->email;
        }

        $kapster->no_hp = $request->no_hp;
        $kapster->jenis_kelamin = $request->jenis_kelamin;
        $kapster->alamat = $request->alamat;

        if ($request->has('foto')) {
            $foto = $request->foto;

            $kapster->delete_image_kapster(public_path('assets/img/kapster'),$foto);
            $new_name = $kapster->save_image_kapster($foto);
            $kapster->foto = $new_name;
        }

        if ($kapster->save()) {
            $message = "Kapster ".ucwords($request->name)." telah di update!";
            return redirect('/data-kapster')->with(['update' => $message]);            
        } else {
            $message = "Gagal mengupdate kapster";
            return back()->with(['errors' => $message]);            
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKapster  $dataKapster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKapster = User::find($id);
        $dataKapster->delete_image_kapster('public/assets/img/kapster/',$dataKapster->foto);
        $dataKapster->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Hash;

class DataPelanggan extends Controller
{

    public function index()
    {
        $data = User::select('id','name','username','email','no_hp','jenis_kelamin','foto')->where('level','pelanggan')->get();
        return view('admin.data_pelanggan.index', [
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
        return view('admin.data_pelanggan.add');
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
            'username' => 'required|unique:users'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make('12345');
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->level = 'pelanggan';
        $user->jenis_kelamin = $request->jenis_kelamin;
        
        if ($user->save()) {
            $message = "User ".ucwords($request->name)." telah di tambahkan!";
            return redirect('/data-pelanggan')->with(['success' => $message]);
         } else {
            $message = "Gagal menambahkan user";
            return back()->with(['errors' => $message]);
         }

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
        $data = User::find($id);
        return view('admin.data_pelanggan.edit', ['data' => $data]);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        if ($user->save()) {
            $message = "User ".ucwords($request->name)." telah di update!";
            return redirect('/data-pelanggan')->with(['update' => $message]);            
        } else {
            $message = "Gagal mengupdate user";
            return back()->with(['errors' => $message]);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;


class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = anggota::all();
        return view('index',['anggota'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'nama'=>'required',
            'umur'=> 'required|integer',
        ]);
        $anggota = new anggota([
            'nama' => $request->get('nama'),
            'umur'=> $request->get('umur'),
        ]);
        $anggota->save();
        return redirect('/anggota')->with('success', 'Anggota berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = anggota::find($id);
        return view('edit', compact('anggota'));
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
       $request->validate([
        'nama'=>'required',
        'umur'=> 'required|integer',
    ]);

       $anggota = anggota::find($id);
       $anggota->nama = $request->get('nama');
       $anggota->umur = $request->get('umur');
       $anggota->save();

       return redirect('/anggota')->with('success', 'Anggota sudah berhasil di update');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = anggota::find($id);
        $anggota->delete();

        return redirect('/anggota')->with('success', 'Anggota telah berhasil di hapus');
    }
}

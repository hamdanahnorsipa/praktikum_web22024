<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::get();

        return view('mahasiswa.index',compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {   //menyimpan hasil inputan
        $data = $request->all();
        //cek apakah inputan foto terisi
        if($request->foto);
        {
            $nama_file     = $request->foto->getClientoriginalName();
            $data['foto'] = $nama_file;
            //memindah file yang di upload
            $request->file('foto')->move('storage/foto',$nama_file);
        }
        //menyimpan data mahasiswa
        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit',compact('mahasiswa'));  
    }

    public function update(Request $request , $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $data = $request->all();

        if($request->foto)
        {
            $nama_file    = $request->foto->getClientoriginalName();
            $data['foto'] = $nama_file;
            $request->file('foto')->move('storage/foto/',$nama_file);
        }

        $mahasiswa->update($data);
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();

        return redirect()->route('mahasiswa.index');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json([
            "data" => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $request->npm; //sama deng $_POST['npm']
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        return response()->json([
            "status" => true,
            "message" => "Mahasiswa berhasil disimpan!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = [
            "status"  => false,
            "message" => "Data mahasiswa tidak ditemukan!"
        ];

        $mahasiswa = Mahasiswa::find($id);  
        if($mahasiswa){
            $result = [
                "status" => true,
                "data"   => $mahasiswa
            ];
        }

        return response()->json($result);
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
        $mahasiswa = Mahasiswa::find($id);  
        $mahasiswa->npm = $request->npm; //sama deng $_POST['npm']
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        return response()->json([
            "status" => true,
            "message" => "Mahasiswa berhasil diupdate!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);   //cari datanya
        if($mahasiswa){                         //jika ada?
            $mahasiswa->delete();           //delete
            $result = [
                "status" => true,
                "message" => "Mahasiswa berhasil dihapus!"
            ];
        }
        return response()->json($result);
    }
}

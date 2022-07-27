<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTDLRequest;
use App\Http\Requests\UpdateTDLRequest;
use App\Models\TDL;
use Illuminate\Http\Request;

class TDLController extends Controller
{
    public function index()
    {
        //menampilkan semua data dari tabel TDL
        return TDL::get();
    }

    public function store(Request $request)
    {
        //memasukan data TDL form ke database
        $dataTDL = TDL::create([
            'judul' => $request->TDL['judul'],
            'completed' => false,
        ]);

        //cek apakah data masuk ke db atau tidak
        if($dataTDL){
            return $dataTDL;
        }else{
            return "data gagal di submit";
        }
        
    }

    public function update(Request $request, TDL $TDL)
    {
        //update data TDL
        $TDL->update([
            'judul' => $request->TDL['judul'] ,
            'completed' => $request->TDL['completed']
        ]);
        
        //cek data apakah berhasil atau tidak
        if($TDL){
            return $TDL;
        }else{
            return "data gagal diedit";
        }
        
    }


    public function destroy(TDL $TDL)
    {
        //delete data TDL
        $TDL->delete();

        if($TDL){
            return "data berhasil dihapus";
        }else{
            return "data gagal dihapus";
        }

    }
}

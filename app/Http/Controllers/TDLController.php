<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTDLRequest;
use App\Http\Requests\UpdateTDLRequest;
use App\Models\TDL;
use Carbon\Carbon;
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
            'isi' => $request->TDL['isi'],
            'completed' => false,
            'completed_at' => null
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
        //mengambil tanggal dari iscompleted harus true
        if($request->TDL['iscompleted'] == true){
        $waktu = Carbon::now();

        //update data TDL
        $validate = $TDL->update([
            'completed' => $request->TDL['iscompleted'],
            'completed_at' => $waktu
        ]);
    } else{
        $validate = $TDL->update([
            'completed' => $request->TDL['iscompleted'],
            'completed_at' => null
        ]);
    }



        
        //cek data apakah berhasil atau tidak
        if($validate == 1){
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

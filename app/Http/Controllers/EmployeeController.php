<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahpegawai');
    }

    public function insertdata(Request $request){
        $data = Employee::create($request->all());

        if($request->hasFile('foto')){

            $file = $request->file('foto');
            $uniqueName = time(). "-" . $file->getClientOriginalName();

            $file->move('foto_pegawai/', $uniqueName);

            $data->foto = $uniqueName;

            $data->save();
        }
        return redirect()->route('pegawai')->with('success', "Data Berhasil Ditambahkan");

    }

    public function tampilkandata($id){
        $data = Employee::find($id);

        return view('tampildata', compact('data'));
    }

    public function updatedata($id, Request $request){
        $data = Employee::find($id);

        $data->update($request->all());

        return redirect()->route('pegawai')->with('success', "Data Berhasil Diedit");
    }

    public function delete($id){
        $data = Employee::find($id);

        $data->delete();

        return redirect()->route('pegawai')->with('success', "Data Berhasil Dihapus");

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class KelasController extends Controller
{
    public function list()
    {
        $kelas = Kelas::orderBy('nama')->get();
        return view('admin.kelas.index',compact('kelas'));
    }

    public function getForm($kelas_id='',Request $request)
    {
        if($kelas_id) {
            $kelas = Kelas::find($kelas_id);
        }else{
            $kelas = $this->getColumnTable('table_kelas');
        }
        return view('admin.kelas.form', compact('kelas'));
    }

    public function saveKelas($kelas_id = '',Request $request)
    {
        $kelas_id = $request->input('kelas_id');

        $validation_rules = ['kelas_name' => 'required|string'];

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        if ($kelas_id) {
            $kelas = Kelas::find($kelas_id);
            $success_message = 'Kelas updated successfully';
        } else {
            $kelas = new Kelas();
            $success_message = 'Kelas added successfully';

        }

        $kelas->nama = $request->input('kelas_name');
        $kelas->save();

        return $this->return_output('flash', 'success', $success_message, 'admin/kelas/list', '200');
    }

    public function deleteKelas($kelas_id='')
    {
        Kelas::destroy($kelas_id);
        return $this->return_output('flash', 'success', 'Kelas Deleted Successfully', 'admin/kelas/list', '200');

    }
}

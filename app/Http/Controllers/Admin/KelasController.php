<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;

class KelasController extends Controller
{
  public function index()
  {
    $kelas = Kelas::all();
    return view('admin.kelas.index', compact('kelas'));
  }
  
  public function store(Request $request)
  {
    $kelas = new Kelas();
    $kelas->nama = $request->input('nama_kelas');
    $kelas->save();
    $success_message = 'Sukses menambahkan kelas !';
    return $this->return_output('flash', 'success', $success_message, 'admin/kelas', '200');
  }
  
  public function update(Request $request, $id)
  {
    $kelas = Kelas::where('id', $id)->first();
    $kelas->nama = $request->input('nama_kelas');
    $kelas->save();
    $success_message = 'Sukses mengubah kelas !';
    return $this->return_output('flash', 'success', $success_message, 'admin/kelas', '200');
  }
  
  public function destroy($id)
  {
    Kelas::destroy($id);
    $success_message = 'Sukses menghapus kelas !';
    return $this->return_output('flash', 'success', $success_message, 'admin/kelas', '200');
  }
}

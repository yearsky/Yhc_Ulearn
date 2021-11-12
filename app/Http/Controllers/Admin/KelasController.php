<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function list()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index',compact('kelas'));
    }
}

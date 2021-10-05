<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;


class AbsensiController extends Controller
{
    public function show()
    {
        $absensi = DB::SELECT("CALL Absensi()");

        return view('instructor.absensi.index',compact('absensi'));
    }

    public function add()
    {
        $instructor = \Auth::user()->id;
        $mapel = DB::SELECT("CALL P_Mapel($instructor)");
        $siswa = DB::SELECT("CALL n_siswa");
        return view('instructor.absensi.add',compact('siswa','mapel'));
        // return $mapel;

    }
}

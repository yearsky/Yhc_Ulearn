<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;


class AbsensiController extends Controller
{
    public function show()
    {
        $absensi = DB::SELECT("CALL Absensi()");

        return view('instructor.absensi.index',compact('absensi'));
    }

    public function add()
    {
        // $instructor = \Auth::user()->id;
        // $mapel = DB::SELECT("CALL P_Mapel($instructor)")->get();

        $mapel = DB::table('courses')->
                    join('instructors','courses.instructor_id','=','instructors.id')
                    ->join('users','instructors.user_id','=','users.id')
                    ->select('course_title','instructors.first_name','instructors.last_name')
                    ->get();
        $kelas = Kelas::all();
        $siswa = DB::SELECT("CALL n_siswa");
        return view('instructor.absensi.add',compact('siswa','mapel','kelas'));
        // return $mapel;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelas;
use App\Models\Absensi;


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
                    ->select('courses.id','course_title','instructors.first_name','instructors.last_name')
                    ->get();
        $kelas = Kelas::all();
        $siswa = DB::SELECT("CALL n_siswa");
        $instructor = Instructor::where('user_id', \Auth::user()->id)->first();
        return view('instructor.absensi.add',compact('siswa','mapel','kelas','instructor'));
        // return $mapel;

    }

    public function store(Request $request)
    {
        $validation_rules = [
            'mapel' => 'required',
            'kelas' => 'required',
            'siswa' => 'required',
            'keterangan' => 'required',
        ];

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

       $absensi = new Absensi();
       $absensi->id_instructor = $request->instructor_id;
       $absensi->id_siswa = $request->siswa;
       $absensi->id_course = $request->mapel;
       $absensi->id_kelas = $request->kelas;
       $absensi->keterangan = $request->keterangan;
       $absensi->save();

       return redirect('/instructor-absensi-list');
    }

    public function edit($id)
    {
        // $absensi = DB::SELECT("CALL Abs_Where($id)");
        $absensi = Absensi::find($id);
        $kelas = Kelas::all();
        $siswa = 
        DB::table('users')->
        join('role_user','role_user.user_id','=','users.id')
        // ->select('users.first_name','users.last_name')
        ->select('role_user.id',DB::Raw("CONCAT(first_name,' ',last_name)AS siswa"))
        ->get();
        $mapel = DB::table('courses')->
                    join('instructors','courses.instructor_id','=','instructors.id')
                    ->join('users','instructors.user_id','=','users.id')
                    ->select('courses.id','course_title','instructors.first_name','instructors.last_name')
                    ->get();
        return view('instructor.absensi.edit',compact('absensi','kelas','mapel'));
        return response()->json($siswa);

        // return $absensi;
    }

    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return redirect()->back();
    }
}

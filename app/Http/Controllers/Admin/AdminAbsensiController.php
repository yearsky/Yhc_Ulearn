<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Instructor;

class AdminAbsensiController extends Controller
{
    public function show()
    {
        $absensi = DB::SELECT("CALL Absensi()");
        return view('admin.absensi.index',compact('absensi'));
        // return $absensi;
    }

    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $kelas = Kelas::all();
        $instructor = Instructor::select(DB::raw("CONCAT(first_name,' ',last_name)AS guru"),'id')->get();
        $siswa = 
        DB::table('users')->
        join('role_user','role_user.user_id','=','users.id')
        // ->select('users.first_name','users.last_name')
        ->select('role_user.id',DB::Raw("CONCAT(first_name,' ',last_name)AS siswa"))
        ->get();
        $s_class = DB::table('users')->
        join('role_user','role_user.user_id','=','users.id')
        // ->select('users.first_name','users.last_name')
        ->select('role_user.id',DB::Raw("CONCAT(first_name,' ',last_name)AS siswa_sekolah"))
        ->where('kelas_id',$absensi->id_kelas)
        ->get();
        $mapel = DB::table('courses')->
                    join('instructors','courses.instructor_id','=','instructors.id')
                    ->join('users','instructors.user_id','=','users.id')
                    ->select('courses.id','course_title','instructors.first_name','instructors.last_name')
                    ->get();
        return view('admin.absensi.edit',compact('absensi','kelas','mapel','instructor','s_class','siswa'));
        // return $absensi;      
    }

    public function add()
    {
        $mapel = DB::table('courses')->
                    join('instructors','courses.instructor_id','=','instructors.id')
                    ->join('users','instructors.user_id','=','users.id')
                    ->select('courses.id','course_title','instructors.first_name','instructors.last_name')
                    ->get();
        $kelas = Kelas::all();
        $instructor = Instructor::select(DB::raw("CONCAT(first_name,' ',last_name)AS guru"),'id')->get();
        $siswa = DB::SELECT("CALL n_siswa");
        return view('admin.absensi.add',compact('mapel','kelas','siswa','instructor'));
        // return $instructor;
    }

    public function save(Request $request)
    {
        $validation_rules = [
            'guru' => 'required',
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
       $absensi->id_instructor = $request->guru;
       $absensi->id_siswa = $request->siswa;
       $absensi->id_course = $request->mapel;
       $absensi->id_kelas = $request->kelas;
       $absensi->keterangan = $request->keterangan;
       $absensi->save();

       return $this->return_output('flash', 'success', 'Data Absensi Ditambahkan!', 'admin/absensi', '200');

    }

    public function update($id, Request $request)
    {
        $absensi = Absensi::find($id);
        $absensi->id_instructor = $request->guru;
        $absensi->id_siswa = $request->siswa;
        $absensi->id_course = $request->mapel;
        $absensi->id_kelas = $request->kelas;
        $absensi->keterangan = $request->keterangan;
        $absensi->update();

        return $this->return_output('flash','success','Data Absensi Berhasil di Update','admin/absensi','200');
    }

    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return $this->return_output('flash','success','Data Absensi Berhasil di Hapus','admin/absensi','200');
    }
}

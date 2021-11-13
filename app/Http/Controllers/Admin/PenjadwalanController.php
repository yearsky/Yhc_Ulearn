<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penjadwalan;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;


class PenjadwalanController extends Controller
{
    public function list(Request $request)
    {
        $paginate_count = 10;
        if($request->has('search')){
            $search = $request->input('search');
            $penjadwalan = Penjadwalan::where('course.name', 'LIKE', '%' . $search . '%')
                           ->paginate($paginate_count);
        }
        else {
            $penjadwalan = DB::select(DB::raw('CALL GetJadwal()')); 
        }
        // $penjadwalan = Penjadwalan::all();
        return view('admin.penjadwalan.list',compact('penjadwalan'));
    }

    public function getForm($pwId='')
    {
        if($pwId) {
            $penjadwalan = Penjadwalan::find($pwId);
        }else{
            $penjadwalan = $this->getColumnTable('penjadwalan');
        }
        $kelas = Kelas::all();
        return view('admin.penjadwalan.form', compact('penjadwalan','kelas'));
    }

    public function saveJadwal($pwId='', Request $request)
    {
         // echo '<pre>';print_r($_POST);exit;
         $pwId = $request->input('penjadwalan_id');

         $validation_rules = ['kelas' => 'required|string'];
 
         $validator = Validator::make($request->all(),$validation_rules);
 
         // Stop if validation fails
         if ($validator->fails()) {
             return $this->return_output('error', 'error', $validator, 'back', '422');
         }
 
         if ($pwId) {
             $penjadwalan = Penjadwalan::find($pwId);
             $success_message = 'Penjadwalan updated successfully';
         } else {
             $penjadwalan = new Penjadwalan();
             $success_message = 'Penjadwalan added successfully';
 
         }
 
         $penjadwalan->instructor_id = $request->input('guru');
         $penjadwalan->course_id = $request->input('mapel');
         $penjadwalan->kelas_id = $request->input('kelas');
         $jam = $request->input('jam');
         if($jam = 'jam1')
         {
            $penjadwalan->jam_mulai = '08.00';
            $penjadwalan->jam_akhir = '08.35';
         }elseif($jam = 'jam2')
         {
             $penjadwalan->jam_mulai = '08.35';
             $penjadwalan->jam_akhir = '09.10';
         }elseif($jam = 'jam3')
         {
             $penjadwalan->jam_mulai = '09.10';
             $penjadwalan->jam_akhir = '09.45';
         }elseif($jam = 'jam4')
         {
             $penjadwalan->jam_mulai = '10.15';
             $penjadwalan->jam_akhir = '10.50';
         }elseif($jam = 'jam5')
         {
             $penjadwalan->jam_mulai = '10.50';
             $penjadwalan->jam_akhir = '11.25';
         }
         elseif($jam= 'jam6')
         {
             $penjadwalan->jam_mulai = '11.40';
             $penjadwalan->jam_akhir = '12.15';
         }
         else
         {
            $penjadwalan->jam_mulai = '12.15';
            $penjadwalan->jam_akhir = '12.50';
         }

         $penjadwalan->hari = $request->input('hari');
         $penjadwalan->save();
 
         return $this->return_output('flash', 'success', $success_message, 'admin/penjadwalan/list', '200');
        // return $request->all();
    }

    public function deleteJadwal($pwId='')
    {

    }
}

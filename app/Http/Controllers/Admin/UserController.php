<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\RoleUser;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
// use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  // DONE all UserController
  public function index()
  {
    $users = User::whereHas('RoleUser', function ($query) {
      $query->where('role_id', '<>', 3);
    })->get();
    return view('admin.users.index', compact('users'));
  }

  public function siswaList()
  {
    $siswa = DB::table('users')
      ->join('role_user', 'users.id', '=', 'role_user.user_id')
      ->join('table_kelas', 'role_user.kelas_Id', '=', 'table_kelas.id')
      ->select('users.id', 'table_kelas.nama as kelas', 'is_active', DB::raw("CONCAT(users.first_name,' ',users.last_name)AS n_siswa"))
      ->where('role_id', '1')
      ->get();
    return view('admin.users.siswa', compact('siswa'));
  }

  public function siswaForm()
  {
    $user = $this->getColumnTable('users');
    $kelas = Kelas::all();
    return view('admin.users.siswaForm', compact('user', 'kelas'));
  }

  public function saveSiswa(Request $request)
  {
    // validation rules
    $validation_rules = [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
    ];
    $validator = Validator::make($request->all(), $validation_rules);

    // Stop if validation fails
    if ($validator->fails()) {
      return $this->return_output('error', 'error', $validator, 'back', '422');
    }

    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $email = $request->input('email');
    $password = bcrypt($request->input('password'));
    $role = 'student';
    $roles = Role::where('name', $role)->pluck('id')->first();
    $kelas = $request->input('kelas');
    $is_active = $request->input('is_active');
    $insert = DB::SELECT('CALL insertUsers(?,?,?,?,?,?,?,?)', array($first_name, $last_name, $email, $password, $is_active, $roles, 2, $kelas)); // FIKS 2 terserah
    return $this->return_output('flash', 'success', 'Data berhasil ditambahkan', 'admin/user/siswa/list', '200');
  }

  public function editSiswa($id)
  {
    $user = User::find($id);
    $kelas_take = Kelas::find(User::find($id)->RoleUser[0]->kelas_id);
    $kelas = Kelas::all();
    return view('admin.users.editSiswa', compact('user', 'kelas', 'kelas_take'));
  }

  public function updateSiswa($id, Request $request)
  {
    $user = User::find($id);
    $user_id = $request->input('user_id');
    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $password = bcrypt($request->input('password'));
    $email = $request->input('email');
    $kelas = $request->input('kelas');
    $is_active = $request->input('is_active');
    $role = 'student';
    $roles = Role::where('name', $role)->pluck('id')->first();
    $query = DB::SELECT('CALL updateSiswa(?,?,?,?,?,?,?,?)', array($first_name, $last_name, $email, $password, $is_active, $roles, $user_id, $kelas));
    return $this->return_output('flash', 'success', 'Data berhasil Dirubah', 'admin/user/siswa/list', '200');
  }

  public function deleteSiswa($id)
  {
    $user = User::where('id', $id)->pluck('id')->first();
    $query = DB::SELECT("CALL deleteSiswa('$user')");
    return $this->return_output('flash', 'success', 'Data Siswa Berhasil di Hapus', 'admin/user/siswa/list', '200');
  }

  public function guruList()
  {
    $guru = DB::table('instructors')
      ->join('users', 'instructors.user_id', '=', 'users.id')
      ->select(
        'instructors.id',
        'instructors.user_id',
        'instructors.contact_email',
        'users.is_active',
        DB::raw("CONCAT(instructors.first_name,' ',instructors.last_name) AS n_guru")
      )
      ->get();
    return view('admin.users.guru', compact('guru'));
  }

  public function guruForm()
  {
    return view('admin.users.guruForm');
  }

  public function saveGuru(Request $request)
  {
    $validation_rules = [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
    ];
    $validator = Validator::make($request->all(), $validation_rules);

    if ($validator->fails()) {
      return $this->return_output('error', 'error', $validator, 'back', '422');
    }

    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $email = $request->input('email');
    $password = bcrypt($request->input('password'));
    $role = 'instructor';
    $roles = Role::where('name', $role)->pluck('id')->first();
    $kelas = 0;
    $is_active = $request->input('is_active');
    $insert = DB::SELECT('CALL insertGuru(?,?,?,?,?,?,?,?)', array($first_name, $last_name, $email, $password, $is_active, $roles, 2, $kelas));
    return $this->return_output('flash', 'success', 'Data berhasil ditambahkan', 'admin/user/guru/list', '200');
  }

  public function editGuru($id)
  {
    $user = User::find($id);
    return view('admin.users.editGuru', compact('user'));
  }

  public function updateGuru($id, Request $request)
  {
    $user = User::find($id);
    $user_id = $request->input('user_id');
    $f_name = $request->input('first_name');
    $l_name = $request->input('last_name');
    $pass = bcrypt($request->input('password'));
    $email = $request->input('email');
    $kelas = 0;
    $is_active = $request->input('is_active');
    $role = 'instructor';
    $roles = Role::where('name', $role)->pluck('id')->first();
    $query = DB::SELECT('CALL updateGuru(?,?,?,?,?,?,?,?)', array($f_name, $l_name, $email, $pass, $is_active, $roles, $user_id, $kelas));
    return $this->return_output('flash', 'success', 'Data berhasil Dirubah', 'admin/user/guru/list', '200');
  }

  public function deleteGuru($id)
  {
    $user = User::where('id', $id)->pluck('id')->first();
    $query = DB::SELECT("CALL deleteGuru('$user')");
    return $this->return_output('flash', 'success', 'Data Siswa Berhasil di Hapus', 'admin/user/guru/list', '200');
  }
}

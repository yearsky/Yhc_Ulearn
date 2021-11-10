<?php
/**
 * PHP Version 7.1.7-1
 * Functions for users
 *
 * @category  File
 * @package   User
 * @author    Mohamed Yahya
 * @copyright ULEARN  
 * @license   BSD Licence
 * @link      Link
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\RoleUser;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
/**
 * Class contain functions for admin
 *
 * @category  Class
 * @package   User
 * @author    Mohamed Yahya
 * @copyright ULEARN
 * @license   BSD Licence
 * @link      Link
 */
class UserController extends Controller
{
    /**
     * Function to display the dashboard contents for admin
     *
     * @param array $request All input values from form
     *
     * @return contents to display in dashboard
     */
    public function index(Request $request)
    {
        $paginate_count = 10;
        if($request->has('search')){
            $search = $request->input('search');
            $users = User::whereHas('RoleUser', function ($query) {
                                $query->where('role_id', '<>', 3);
                            })
                           ->where(function ($q) use ($search) {
                            $q->where('first_name', 'LIKE', '%' . $search . '%')
                               ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                               ->orWhere('email', 'LIKE', '%' . $search . '%');
                           })
                           ->paginate($paginate_count);
        }
        else {
            $users = User::whereHas('RoleUser', function ($query) {
                $query->where('role_id', '<>', 3);
            })->paginate($paginate_count);
        }
        
        return view('admin.users.index', compact('users'));
    }

    public function getForm($user_id='', Request $request)
    {
        if($user_id) {
            $user = User::find($user_id);
        }else{
            $user = $this->getColumnTable('users');
        }
        return view('admin.users.form', compact('user'));
    }

    public function editSiswa($id='')
    {
        $user = User::find($id);
        $kelas = Kelas::all();
        return view('admin.users.edit',compact('user','kelas'));
        // return dd($user);
    }

    public function editGuru($id='')
    {
        $user = User::find($id);
        return view('admin.users.editGuru',compact('user'));
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

        $query = DB::SELECT('CALL updateSiswa(?,?,?,?,?,?,?,?)',array($first_name,$last_name,$email,$password,$is_active,$roles,$user_id,$kelas));
        return $this->return_output('flash', 'success', 'Data berhasil Dirubah', 'admin/user/siswa/list', '200');
        return $user_id;
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
        $roles = Role::where('name',$role)->pluck('id')->first();

        $query = DB::SELECT('CALL updateGuru(?,?,?,?,?,?,?,?)',array($f_name,$l_name,$email,$pass,$is_active,$roles,$user_id,$kelas));
        return $this->return_output('flash', 'success', 'Data berhasil Dirubah', 'admin/user/guru/list', '200');

    }

    public function deleteSiswa($id)
    {
        $user = User::where('id',$id)->pluck('id')->first();
        // return $user;
        $query = DB::SELECT("CALL deleteSiswa('$user')");
        return $this->return_output('flash','success','Data Siswa Berhasil di Hapus','admin/user/siswa/list','200');
    }

    public function deleteGuru($id)
    {
        $user = User::where('id',$id)->pluck('id')->first();
        $query = DB::SELECT("CALL deleteGuru('$user')");
        return $this->return_output('flash','success','Data Siswa Berhasil di Hapus','admin/user/guru/list','200');

    }

    public function siswaForm($user_id='', Request $request)
    {
        if($user_id)
        {
            $user = User::find($user_id);
        }else{
            $user = $this->getColumnTable('users');
            $kelas = Kelas::all();
        }
        return view('admin.users.siswaForm',compact('user','kelas'));
        // return $kelas;
    }

    public function saveSiswa(Request $request)
    {
        $user_id = $request->input('user_id');

        //validation rules
        if ($user_id) {
            
            $validation_rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
            ];

        } else {
            
            $validation_rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ];

        }

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        if ($user_id) {
            $user = User::find($user_id);
            // Detach all roles for the existing user to update new roles...
            $user->roles()->detach();
            $success_message = 'User updated successfully';
        } else {
            $user = new User();
            $success_message = 'User added successfully';
        }

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $role = 'student';
        $roles = Role::where('name', $role)->pluck('id')->first();
        $kelas = $request->input('kelas');
        $is_active = $request->input('is_active');

        $insert = DB::SELECT('CALL insertUsers(?,?,?,?,?,?,?,?)',array($first_name,$last_name,$email,$password,$is_active,$roles,2,$kelas));

        // return $role;
        return $this->return_output('flash', 'success', 'Data berhasil ditambahkan', 'admin/user/siswa/list', '200');
        // return $roles;
    }

    public function saveGuru(Request $request)
    {
        $validation_rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
        $validator = Validator::make($request->all(),$validation_rules);

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

        $insert = DB::SELECT('CALL insertGuru(?,?,?,?,?,?,?,?)',array($first_name,$last_name,$email,$password,$is_active,$roles,2,$kelas));

        return $this->return_output('flash', 'success', 'Data berhasil ditambahkan', 'admin/user/guru/list', '200');
        
    }

    public function getData()
    {
        return DataTables::eloquent(User::query())
                            ->addColumn(
                                'user',
                                function (User $user) {
                                    return '<span class="badge badge-primary">Primary</span>';
                                }
                            )
        ->make(true);
    }

    public function siswaList()
    {
        $paginate_count = 10;
        // $siswa = User::whereHas('RoleUser', function ($query) {
        //     $query->where('role_id', '<>', 3)->where('role_id','<>',2);
        // })->paginate($paginate_count);

       
        $siswa = DB::table('users')->
                    join('role_user','users.id','=','role_user.user_id')
                    ->join('table_kelas','role_user.kelas_Id','=','table_kelas.id')
                    ->select('users.id','table_kelas.nama as kelas','is_active',DB::raw("CONCAT(users.first_name,' ',users.last_name)AS n_siswa"))
                    ->where('role_id','1')
                    ->paginate($paginate_count);

        return view('admin.users.siswa',compact('siswa'));
        // return $siswa;
    }

    //GURU

    public function guruList()
    {
        $paginate_count = 10;

        $guru = DB::table('instructors')
        ->join('users','instructors.user_id','=','users.id')
        ->select('instructors.id','instructors.user_id','instructors.contact_email','users.is_active',DB::raw("CONCAT(instructors.first_name,' ',instructors.last_name) AS n_guru"))
        ->paginate($paginate_count);

        // return $guru;

        return view('admin.users.guru',compact('guru'));
    }

    public function guruForm($user_id='', Request $request)
    {
        
        return view('admin.users.guruForm');
        // return $kelas;
    }
    
}

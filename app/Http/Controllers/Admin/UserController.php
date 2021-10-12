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

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        $password = $request->input('password');
        if($password) {
            $user->password = bcrypt($password);
        }
        
        $user->is_active = $request->input('is_active');
        $user->save();
        
        $roles = 'student';
        $role = Role::where('name', $roles)->first();
        $kelas = $request->input('kelas');

        $user->kelas()->attach($kelas);
        $user->roles()->attach($role);

        // return $role;
        return $this->return_output('flash', 'success', 'Data berhasil ditambahkan', 'admin/user/siswa/list', '200');
        
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

        $siswa = DB::table('role_user')->
                    join('users','role_user.user_id','=','users.id')
                    ->join('table_kelas','role_user.kelas_Id','=','table_kelas.id')
                    ->select('role_user.id','table_kelas.nama as kelas','is_active',DB::raw("CONCAT(users.first_name,' ',users.last_name)AS n_siswa"))
                    ->where('role_id','1')
                    ->paginate($paginate_count);

        return view('admin.users.siswa',compact('siswa'));
        // return $siswa;
    }
    
}

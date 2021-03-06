<?php

/**
 * PHP Version 7.1.7-1
 * Functions for dashboard
 *
 * @category  File
 * @package   Dashboard
 * @author    Mohamed Yahya
 * @copyright ULEARN  
 * @license   BSD Licence
 * @link      Link
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use DB;
use Illuminate\Support\Collection;

/**
 * Class contain functions for admin
 *
 * @category  Class
 * @package   Dashboard
 * @author    Mohamed Yahya
 * @copyright ULEARN
 * @license   BSD Licence
 * @link      Link
 */
class DashboardController extends Controller
{
    /**
     * Function to display the dashboard contents for admin
     *
     * @param array $request All input values from form
     *
     * @return contents to display in dashboard
     */

    public function instructorDashboard(Request $request)
    {
        return view('instructor.dashboard');
    }

    public function studentDashboard()
    {
        // $courses = DB::table('courses')
        //             ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
        //             ->selectRaw('AVG(course_ratings.rating) AS average_rating')
        //             ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
        //             ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
        //             ->where('courses.is_active',1);
        $studentClass = RoleUser::all()->where('user_id', \Auth::user()->id)->pluck('kelas_id');

        $courses = DB::table('role_user')
            ->select('courses.*', 'categories.name as category', DB::Raw("CONCAT(instructors.first_name,' ',instructors.last_name)AS guru"))
            ->join('courses', 'role_user.kelas_id', '=', 'courses.kelas_id')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('courses.kelas_id', $studentClass)->get();
        $array_colour = array('#fee4cb;', '#dbf6fd;', '#e9e7fd;', '#ffd3e2;', '#c8f7dc;', '#d5deff;');
        // $rand_colors = $array_colour[mt_rand(0, count($array_colour) - 1)];
        // $rand = array_fetch($array_colour);
        // return $rand;

        $collection = collect(['#fee4cb;', '#dbf6fd;', '#e9e7fd;', '#ffd3e2;', '#c8f7dc;', '#d5deff;', null]);

        // loop through collection make all values uppercase
        // use reject function reject array values that are empty
        $colour = $collection
            ->map(function ($value) {
                return $value;
            })
            ->reject(function ($name) {
                return empty($name);
            })->toArray();

        // print the array
        // dd($colour);
        $rand_colors = $colour[mt_rand(0, count($colour) - 1)];

        // return $rand_colors;


        // $penjadwalan = DB::select(DB::raw('CALL GetJadwal()')); 
        $penjadwalan = DB::table('penjadwalan')
            ->select('penjadwalan.*', 'courses.*', 'table_kelas.id as id_kelas', DB::RAW("CONCAT(instructors.first_name,' ',instructors.last_name)AS guru"), 'courses.course_title as mapel', 'table_kelas.nama as kelas')
            ->join('courses', 'penjadwalan.course_id', '=', 'courses.id')
            ->join('instructors', 'penjadwalan.instructor_id', '=', 'instructors.id')
            ->join('table_kelas', 'penjadwalan.kelas_id', '=', 'table_kelas.id')
            ->where('penjadwalan.kelas_id', $studentClass)->get();


        return view('site.student.dashboard', compact('courses', 'penjadwalan', 'colour', 'array_colour'));
        // return $penjadwalan;
    }

    public function studentProfile()
    {
        return view('site.student.profile');
    }
}

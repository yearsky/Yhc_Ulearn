<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Course;


class ExamController extends Controller
{
    public function save(Request $request)
    {
        $examinfo = new Exam;

        $examinfo = Exam::create([
            'instructor_id' => \Auth::user()->instructor->id,
            'section_id' => $request->input('section'),
            'Course' => $request->input('course_name'),
            'question_lenth' => $request->input('total_soal'),
            'uniqueid' => $request->input('uniqueid'),
            'time' => $request->input('durasi')
        ]);


    return view('instructor.makequestion', ['examinfo' => $examinfo]);
    // return $examinfo;
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questions;
use App\Models\Exam;
use DB;

class QuestionsController extends Controller
{
    public function save(Request $request)
    {
        $questions = new Questions;
        $question = Questions::create([
            'quiz_id' => $request->input('quizid'),
            'question' => $request->input('question'),
            'choice1' => $request->input('option1'),
            'choice2' => $request->input('option2'),
            'choice3' => $request->input('option3'),
            'choice4' => $request->input('option4'),
            'answer' => $request->input('answer')
        ]);
        
        $id = $request->input('quizid');

        $qustionCount=Questions::where('quiz_id','=', $id)->count();

        $selectLenth=Exam::where('id','=',$id)->value('question_lenth');
        //return $selectLenth;

        if ($qustionCount < $selectLenth ) {
            $examinfo = Exam::find($id);
            return view('instructor.makequestion', ['examinfo' => $examinfo]);
        }else{
            $uniqueId=Exam::where('id','=',$id)->value('uniqueid');
            return view('instructor.mqindex',['uniqueid' =>$uniqueId]);

        }
    }

    public function showQuestions($course_name='',Request $request)
    {
        $course_name = $request->input('course_name');
        $question = DB::table('questions')
        ->select('questions.*')
        ->leftJoin('exam_info', 'questions.quiz_id', '=', 'exam_info.id')
        ->where('exam_info.Course',$course_name)->get();
       
        return view('instructor.review',compact('question'));
        // return $question;
        
    }

    public function oneQuest($id)
    {
        if (isset($_GET['submitFromEditPage'])) {
            $questionid=$id;
            $selectAll=Questions::where('id',$questionid)->get();
            return view('instructor.singleReview')->with('questions',$selectAll);
        }else{
        //this is for review teacher question
        $course_name = $request->input('course_name');
        $question = DB::table('questions')
        ->select('questions.*')
        ->leftJoin('exam_info', 'questions.quiz_id', '=', 'exam_info.id')
        ->where('exam_info.Course',$course_name)->get();
        return view('instructor.review',compact('question'));
        }
    }

    public function update($id,Request $request)
    {
        $quiz_id=$request->input('quiz_id');
        $update=Questions::where('id',$id)->update([
                           'question' => $request->input('question'),
                           'choice1' => $request->input('choice1'),
                           'choice2' => $request->input('choice2'),
                           'choice3' => $request->input('choice3'),
                           'choice4' => $request->input('choice4'),
                           'answer' => $request->input('answer')

                        ]);
        $selectQuestions=Questions::where('quiz_id',$quiz_id)->get();
        return view('instructor.review')->with('question',$selectQuestions)->with('success', 'update success');
    }
}

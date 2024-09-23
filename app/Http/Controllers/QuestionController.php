<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::all();
        return view('exam', compact('questions'));
    }

    public function create(){
        return view('exam-create');
    }

    public function store(QuestionRequest $request){
        $questions = $request->input('questions');  
        $answers = $request->input('answers');      

    $answerIndex = 0;

    foreach ($questions as $questionText) {
        $question = new Question();
        $question->question = $questionText;
        $question->answer_1 = $answers[$answerIndex];
        $question->answer_2 = $answers[$answerIndex + 1];
        $question->answer_3 = $answers[$answerIndex + 2];
        $question->answer_4 = $answers[$answerIndex + 3];

        $question->corr_answer = $answers[$answerIndex];   // Not implemented yet
        $question->save();

        $answerIndex += 4;
        }

        return redirect()->route('exam.index');
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy($questionId){
        $question = Question::findOrFail($questionId);
        $question->delete();
        return redirect('/exam')->with('status','Question Deleted');
    }
}

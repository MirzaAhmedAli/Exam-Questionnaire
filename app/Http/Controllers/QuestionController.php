<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionEditRequest;
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
        $correctAnswers = $request->input('correct_answers', []);   

    $answerIndex = 0;

    foreach ($questions as $questionText) {
        $question = new Question();
        $question->question = $questionText;
        $question->answer_1 = $answers[$answerIndex];
        $question->answer_2 = $answers[$answerIndex + 1] ?? null;
        $question->answer_3 = $answers[$answerIndex + 2] ?? null;
        $question->answer_4 = $answers[$answerIndex + 3] ?? null;

            // The in_array function will get the answer with the check and assign the correct answer

        if (in_array(0, $correctAnswers)) {
            $question->corr_answer = $answers[$answerIndex];
        } elseif (in_array(1, $correctAnswers)) {
            $question->corr_answer = $answers[$answerIndex + 1];
        } elseif (in_array(2, $correctAnswers)) {
            $question->corr_answer = $answers[$answerIndex + 2];
        } elseif (in_array(3, $correctAnswers)) {
            $question->corr_answer = $answers[$answerIndex + 3];
        }        
        $question->save();

        $answerIndex += 4;
        }

        return redirect()->route('exam.index')->with('status','Questions Created');
    }

    public function edit($questionId){
        $question = Question::findorFail($questionId);
        return view('exam-edit', compact('question'));

    }

    public function update(QuestionEditRequest $request, $questionId){
        $question = Question::findOrFail($questionId);
        $answers = $request->only(['answer_1', 'answer_2', 'answer_3', 'answer_4']);
        $correctAnswer = $request->input('corr_answer');  
    
        if ($correctAnswer == 0) {
            $question->corr_answer = $answers['answer_1'];
        } elseif ($correctAnswer == 1) {
            $question->corr_answer = $answers['answer_2'];
        } elseif ($correctAnswer == 2) {
            $question->corr_answer = $answers['answer_3'];
        } elseif ($correctAnswer == 3) {
            $question->corr_answer = $answers['answer_4'];
        }
    
        $question->update([
            'question' => $request->input('question'),
            'answer_1' => $answers['answer_1'],
            'answer_2' => $answers['answer_2'],
            'answer_3' => $answers['answer_3'],
            'answer_4' => $answers['answer_4'],
        ]);

        return redirect()->route('exam.index')->with('status','Question Updated');
    }

    public function destroy($questionId){
        $question = Question::findOrFail($questionId);
        $question->delete();
        return redirect('/exam')->with('status','Question Deleted');
    }

    public function result(Request $request){

        $submittedAnswers = $request->input('answers', []);

            if (empty($submittedAnswers)) {
                return redirect()->back()->with('error', 'No answers were submitted. Please select at least one answer.');
            }

        $questions = Question::whereIn('id', array_keys($submittedAnswers))->get();  
        
        $totalQuestions = $questions->count();
        $result = 0;
        
        foreach ($questions as $question) {
            if ($submittedAnswers[$question->id] == $question->corr_answer) {
                $result++;
            }
        }
        
        return view('result', compact('totalQuestions', 'result'));

    }
}

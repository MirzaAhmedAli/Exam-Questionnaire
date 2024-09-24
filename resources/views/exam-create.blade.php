@extends('layouts.app')
@section('content')
    
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1596367407372-96cb88503db6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">  
    
    <span class="text-5xl text-center font-semibold whitespace-nowrap font-serif text-amber-200 ml-6 mt-12">Create Exam</span> 

    <div id="question-limit-alert" class="hidden flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 ml-80 mr-80" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          You can only create 10 Questions!
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close" onclick="closeAlert('question-limit-alert')">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>

    <div id="answer-limit-alert" class="hidden flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 ml-80 mr-80" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          You can only create 2-4 answers per Question!
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close" onclick="closeAlert('answer-limit-alert')">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>

     @if ($errors->any())
    <div id="error" class="alert alert-danger flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 ml-80 mr-80">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close" onclick="closeAlert('error')">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
          </button>
    </div>
    @endif 

    <form action="{{route('exam.store')}}" method="POST">
        @csrf
        <div class="container flex items-center justify-center mx-auto">
            <div class="btn border rounded-lg border-gray-700 p-1 px-4 font-semibold cursor-pointer text-white hover:bg-slate-950 hover:shadow-lg mb-4">
                <button type="button" id="add-question">Add Question</button>
            </div>
        </div>

        <div id="questions-container" class="container mx-auto"></div>
        
        <div class="buttons container flex items-center justify-center ml-7">
            
            
            <div class="btn border rounded-lg border-gray-700 p-1 px-4 font-semibold cursor-pointer ml-auto text-slate-950 hover:bg-slate-950 hover:shadow-lg hover:text-white">
                <a href="{{route('exam.index')}}">
                <button type="button">Cancel</button>
                </a>
            </div>
            <div class="btn border rounded-lg border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500 hover:bg-indigo-700">
                <button type="submit">Post</button>
            </div>
        </div>
    </form>     
</div>   

<script>
    var questionCount = 0;
    var maxQuestions = 10;

    function createQuestionContainer() {
        if (questionCount >= maxQuestions) {
            document.getElementById('question-limit-alert').classList.remove('hidden');
            return;
        }

        questionCount++;

        var questionContainer = document.createElement('div');
        questionContainer.classList.add('w-full', 'lg:w-8/12', 'mt-10', 'mx-auto');

        var questionInput = `
            <div class="editor max-w-4xl px-6 py-2 mx-auto w-11/12 flex flex-col text-gray-800 border border-gray-300 rounded-lg p-4 shadow-lg hover:shadow-2xl justify-start text-left">
                <div class="heading text-left font-bold text-3xl m-5 text-amber-300 font-serif">Question</div>
                <input class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mb-4 outline-none" spellcheck="false" placeholder="Question" type="text" name="questions[]">
                
                <div id="answer-fields-${Date.now()}"></div>
            <div class="buttons container flex items-center justify-center">
                <div class="btn border rounded-lg border-gray-700 p-1 px-4 font-semibold cursor-pointer text-slate-950 hover:bg-slate-950 hover:shadow-lg hover:text-white ml-auto">
                    <button type="button" class="add-answer">Add answer</button>
                </div>
                <div class="btn border rounded-lg p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-red-600 hover:bg-red-800 remove-question">
                <button type="button">Remove</button>
                </div>
            </div>
            </div>
        `;

        questionContainer.innerHTML = questionInput;
        document.getElementById('questions-container').appendChild(questionContainer);

        var answerCount = 0;
        var minAnswers = 2;
        var maxAnswers = 4;

        questionContainer.querySelector('.add-answer').addEventListener('click', function() {
            if (answerCount >= maxAnswers) {
                document.getElementById('answer-limit-alert').classList.remove('hidden');
                return;
            }

            answerCount++;

            var answerFieldsId = this.closest('.editor').querySelector('[id^=answer-fields]').id;

            var newAnswer = document.createElement('div');
            newAnswer.classList.add('flex', 'items-center', 'mb-4');
            
            var answerInput = `
                <input type="text" name="answers[]" placeholder="Answer" class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mr-2 outline-none">
                <input type="radio" name="correct_answers[]" value="${answerCount - 1}" class="mr-2">
            `;

            newAnswer.innerHTML = answerInput;
            document.getElementById(answerFieldsId).appendChild(newAnswer);
        });

        questionContainer.querySelector('.remove-question').addEventListener('click', function() {
            questionContainer.remove();
            questionCount--;
        });
    }

    document.getElementById('add-question').addEventListener('click', function() {
        createQuestionContainer();
    });

    function closeAlert(alertId) {
        document.getElementById(alertId).classList.add('hidden');
    }

    createQuestionContainer();
</script>
@endsection

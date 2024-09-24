@extends('layouts.app')
@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517094857443-80776ddd155c?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">  
        
  <div class="container flex items-center justify-center mx-auto">
      <div class="w-full lg:w-8/12">
          <div class="editor max-w-4xl px-6 py-2 mx-auto w-11/12 flex flex-col text-gray-800 border border-gray-300 rounded-lg p-4 shadow-lg justify-start text-left mt-32">
              <div class="heading text-left font-bold text-3xl m-5 text-amber-300 font-serif">Result</div>
              @csrf
              <span class="mt-3 mb-3 font-bold font-serif text-orange-600 text-lg">Questions</span>
              <input class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mb-4 outline-none" spellcheck="false" readonly placeholder="Title" type="text" value="{{ $totalQuestions }}">
              <span class="mt-3 mb-3 font-bold font-serif text-orange-600 text-lg">Correct Answers</span>
              <input class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mb-4 outline-none" spellcheck="false" readonly placeholder="Title" type="text" value="{{ $result }}">
          </div>
      </div>   
    </div>

</div>
@endsection
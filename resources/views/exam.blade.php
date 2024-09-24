@extends('layouts.app')
@section('content')

<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517094857443-80776ddd155c?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">  
  <a href="{{route('exam.create')}}" class="flex items-center justify-center">
    <button type="button" class="mt-5 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 hover:shadow-2xl">Create Exam</button>
  </a>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if (session('status'))
        <div class="px-4 sm:px-6 lg:px-8 mt-6 mb-5 mr-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-white bg-red-300 dark:bg-gray-800 dark:text-red-400 focus:ring-4 focus:outline-none overflow-hidden shadow-sm sm:rounded-lg font-serif text-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="alert alert-success">{{session('status')}}</div>  
                </div>
            </div>        
            </div>     
        </div>   
        @endif 

    <div class="container flex items-center justify-center mx-auto mt-4">
    <div class="w-full lg:w-8/12">
    <form action="{{route('exam.result')}}" method="POST">
      <div class="heading text-left font-bold text-3xl m-5 text-amber-300 font-serif">Test</div>

      @foreach ($questions as $question)
      @php $unique_id = $loop->index; @endphp  
  <div class="editor max-w-4xl px-6 py-2 mx-auto w-11/12 flex flex-col text-gray-800 border border-gray-300 rounded-lg p-4 shadow-lg hover:shadow-2xl justify-start text-left mb-6">
      @csrf

      <div class="flex justify-end items-center mt-auto">
        <a href="{{route('exam.edit', $question->id)}}" class="text-right" >
          <button data-tooltip-target="tooltip-animation-edit-{{ $unique_id }}" type="button" class="text-white bg-slate-200 hover:bg-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center shadow-lg inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
            </svg>                        
            </button>
            <div id="tooltip-animation-edit-{{ $unique_id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
              Edit Question
              <div class="tooltip-arrow" data-popper-arrow></div>
          </div>
        </a>
        <a href="{{route('question.delete', $question->id)}}">
            <button data-tooltip-target="tooltip-animation-delete-{{ $unique_id }}" type="button" class="text-white bg-slate-200 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center shadow-lg inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
              </svg>                        
            </button>
            <div id="tooltip-animation-delete-{{ $unique_id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
              Delete
              <div class="tooltip-arrow" data-popper-arrow></div>
          </div>
        </a>
        </div>

      <span class="mt-3 mb-3 font-bold font-serif text-orange-600 text-lg">Question</span>
      <input class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mb-4 outline-none" spellcheck="false" readonly type="text" value="{{$question->question}}">
      
      <span class="mt-3 mb-3 font-bold">Select One Answer</span>
      @php $answers = [$question->answer_1, $question->answer_2, $question->answer_3, $question->answer_4]; @endphp

      @foreach ($answers as $index => $answer)
      <div class="flex items-center mb-2">
          <input id="radio-{{ $unique_id }}-{{ $index }}" type="radio" value="{{ $answer }}" name="answers[{{ $question->id }}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="radio-{{ $unique_id }}-{{ $index }}" class="ms-2 text-base font-medium text-gray-900 dark:text-gray-300 ml-2">{{ $answer }}</label>
      </div>
      @endforeach
  </div>
  @endforeach
  <div class="buttons flex mb-3">
    <div class="btn border rounded-lg border-gray-800 p-1 px-4 font-semibold cursor-pointer ml-auto text-slate-950 hover:bg-slate-950 hover:shadow-lg hover:text-white"><a href="{{route('exam.index')}}"><button type="button">Cancel</button></a></div>
    <div class="btn border rounded-lg border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500 hover:bg-indigo-700"><button type="submit">Submit</button></div>
</div>
</form>


</div>

@endsection
@extends('layouts.home')

@section('content')
<div class="md:my-5 mb-5 flex items-center px-4 justify-between">
  <h1 class="text-lg">
    Top Questions
  </h1>
  <a href="{{route('question.create')}}"
    class="px-4 py-2 bg-sky-500 hover:bg-sky-600 rounded text-white hover:text-sky-100 text-sm border-t border-sky-300">Ask
    Question</a>
</div>

<div class="flex justify-end px-4 mb-5">
  <ul class="inline-flex border border-slate-400 rounded font-light text-xs overflow-hidden">
    <li class="border-r border-slate-400">
      <a href="#" class="px-3 py-2 block bg-slate-200">Interesting</a>
    </li>
    <li class="border-r border-slate-400">
      <a href="#" class="px-3 py-2 block">Week</a>
    </li>
    <li>
      <a href="#" class="px-3 py-2 block">Month</a>
    </li>
  </ul>
</div>

@foreach ($questions as $question)
  <x-front.question.single-question :question="$question"/>
@endforeach


<!-- pagination  -->
<div class="md:flex justify-between px-4 my-4">
  <ul class="flex gap-2">

    <li>
      <a href="#"
        class="px-2 py-1 rounded text-xs border border-transparent  text-gray-800 !border-gray-200 ">
        1
      </a>
    </li>

    <li>
      <a href="#" class="px-2 py-1 rounded text-white text-xs border border-transparent  bg-orange-500 ">
        2
      </a>
    </li>

    <li>
      <a href="#"
        class="px-2 py-1 rounded text-xs border border-transparent  text-gray-800 !border-gray-200 ">
        3
      </a>
    </li>

    <li>
      <a href="#"
        class="px-2 py-1 rounded text-xs border border-transparent  text-gray-800 !border-gray-200 ">
        4
      </a>
    </li>

  </ul>
  <div>
    <ul class="inline-flex gap-2">

      <li>
        <a href="#" class="px-2 py-1 rounded text-white text-xs border border-transparent  bg-orange-500 ">
          15
        </a>
      </li>

      <li>
        <a href="#"
          class="px-2 py-1 rounded text-xs border border-transparent  text-gray-800 !border-gray-200 ">
          30
        </a>
      </li>

      <li>
        <a href="#"
          class="px-2 py-1 rounded text-xs border border-transparent  text-gray-800 !border-gray-200 ">
          50
        </a>
      </li>

    </ul> <span class="text-xs text-gray-600 ml-2">per page</span>
  </div>
</div>

@endsection


@section('right-widgets')
<x-front.widgets.platform-info />
<x-front.widgets.watched-tags />
@endsection
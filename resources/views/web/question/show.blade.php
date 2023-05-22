@extends('layouts.app')


@section('before-content')
    <div class="md:p-6 p-3">
      <div class="flex justify-between md:flex-row flex-col-reverse flex-wrap gap-3 md:gap-0">
        <div class="md:w-10/12">
          <h1 class="md:text-2xl text-lg text-gray-800">
            {{$question->title}}
          </h1>
        </div>
        <div class="flex md:block justify-end">
          <a href="{{route('question.create')}}" 
          class="px-4 py-1.5 sm:py-3 bg-sky-500 hover:bg-sky-600 rounded text-white hover:text-sky-100 text-xs border-t border-sky-300 shadow">Ask Question</a>
        </div>
      </div>
      <ul class="flex text-[13px] text-gray-700 font-base border-b border-gray-200 mt-3 pb-3">
        <li class="mr-4">
          <span class="text-gray-400">Asked</span> {{$question->created_at->diffForHumans()}}
        </li>
        <li class="mr-4">
          <span class="text-gray-400">Modified</span> {{$question->updated_at->diffForHumans()}}
        </li>
        <li class="mr-4">
          <span class="text-gray-400">Viewed</span> 3
        </li>
      </ul>
    </div>
@endsection

@section('content')
<div class="px-6 pb-6">
  <x-front.question.entry :entry="$questionEntry"/>  
  {{-- List answers --}}
  <div class="flex justify-between px-3 py-1.5 rounded bg-gray-50 my-6">
    <h3 class="text-gray-800"><span class="p-2 py-1 rounded text-sm bg-gray-700 text-white">{{$answers->count()}}</span> {{$answers->count() == 1 ? 'Answer' : 'Answers'}}</h3>
    <div>
      <span class="text-xs">Sorted by:</span>
      <select name="" id="" class="px-3 py-1 border border-gray-200 bg-white text-sm text-gray-600 rounded">
        <option value="score">Highest score (default)</option>
      </select>
    </div>
  </div>

  @if ($answers)
    @foreach ($answers as $answer)
    <x-front.question.entry :entry="$answer"/>  
    @endforeach
  @endif
  {{-- Answer form  --}}
  @if (auth()->check())
    @include('web.question.parts.answer-form')
  @else
    <div class="p-6 bg-amber-50 mt-6">
      <p class="text-sm">
        To answer this question please signin to your account
      </p>
      <ul class="flex gap-3 mt-3">
        <li>
          <a href="{{route('login.page')}}" class="px-4 py-1.5  border border-gray-400 text-sm text-gray-600">Login</a>
        </li>
        <li>
          <a href="{{route('register.page')}}" class="px-4 py-1.5  border border-blue-400 text-sm text-blue-600">Create account</a>
        </li>
      </ul>
    </div>
  @endif
</div>
@endsection

@section('right-widgets')
    <div class="-mt-8">
      <x-front.widgets.platform-info />
    </div>
@endsection
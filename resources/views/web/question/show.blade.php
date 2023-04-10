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
<div class="px-6">
  <div class="flex gap-5">
    <div class="w-[5%] flex flex-col items-center">
      <i class="fa-solid fa-caret-up text-5xl text-orange-500 cursor-pointer" 
      data-te-toggle="popover"
      data-te-trigger="hover"
      data-te-content="This question is useful and clear"
      ></i>
      <span class="text-xl text-gray-500">
        79
      </span>
      <i 
      class="fa-solid fa-caret-down text-5xl text-gray-300 cursor-pointer"
      data-te-toggle="popover"
      data-te-trigger="hover"
      data-te-content="This is not clear or useful"
      ></i>
      <div class="mt-2 text-gray-300 flex flex-col items-center">
        <i class="fa-regular fa-bookmark cursor-pointer"
        data-te-toggle="popover"
        data-te-trigger="hover"
        data-te-content="Bookmark this question"
        ></i>
        <i class="fa-sharp fa-regular fa-clock-rotate-left text-lg hover:text-blue-500 cursor-pointer mt-1"
          data-te-toggle="popover"
          data-te-trigger="hover"
          data-te-content="Show activity on this post"
        ></i>
      </div>
    </div>
    <div class="grow">
      <p class="text-gray-700 font-normal">
        {!!$question->content!!}
      </p>
      <ul class="mt-6">
        @foreach ($question->tags as $tag)
        <li class="inline-block mb-1">
            <a href="" class="px-2 py-1 bg-blue-50 hover:bg-blue-100 text-sky-600 rounded text-[11px]">{{$tag->name}}</a>
        </li>
        @endforeach
      </ul>
      <div class="flex mt-8">
        <div class="w-3/12 flex text-gray-400 text-[13px] gap-3">
          <a href="" class="hover:text-gray-300">Share</a>
          <a href="" class="hover:text-gray-300">Follow</a>
          <a href="" class="hover:text-gray-300">Flag</a>
        </div>
        <div class="flex grow justify-end">
          <div class="bg-sky-50 rounded px-3 py-1">
            <span class="text-xs text-gray-500">asked {{$question->created_at->diffForHumans()}}</span>
            <div class="flex mt-1">
              <img src="/images/profile.jpg" alt="" class="w-10 h-10 rounded object-cover">
              <div class="ml-2">
                <a href="#" class="text-[13px] text-blue-500 font-light">{{$question->user->name}}</a>
                <h4 class="text-xs text-gray-500 font-bold">2640</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('right-widgets')
    <div class="-mt-8">
      <x-front.widgets.platform-info />
    </div>
@endsection
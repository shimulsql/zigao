@extends('layouts.content-right')

@push('body-class')
bg-gray-50
@endpush

@section('content')

  <div class="py-10">
    <h1 class="mb-10 text-2xl font-bold text-slate-600">
      Ask a public question
    </h1>
    <div class="bg-blue-50 rounded p-4 border border-blue-400 text-gray-600">
      <h2 class="text-xl">
        Writting a good question
      </h2>
      <p class="text-sm mt-2">
        You are ready to ask a question on this platform. This form will help you how to write a proper question, that can
        be easier for others to understand.
      </p>
    </div>
    <form action="" class="mt-5" x-data="questionState">
      <div class="p-4 bg-white rounded shadow">
        <label for="title" class="block text-slate-700 mb-2">
          <span class="block text-sm cursor-pointer">Title</span>
          <span class="text-[12px] text-medium">Be specific, imagine you're asking a question to another person</span>
        </label>
        <input type="text" name="title" id="title" x-model="title" class="form-control">
        <div class="mt-4" x-show="!complete.title">
          <button @click.prevent="unlockContent()" class="py-2 px-3 text-white text-sm rounded" :class="complete.nextTitle ? 'bg-blue-500' : 'bg-blue-300 cursor-not-allowed'">Next</button>
        </div>
      </div>
      <div class="p-4 bg-white rounded shadow mt-6 relative overflow-hidden">
        <div x-show="!complete.title" class="lock absolute inset-0 bg-gray-50 flex justify-center items-center opacity-80 text-gray-300 z-10">
          <i class="fa-solid fa-lock text-6xl"></i>
        </div>
        <label for="q-content" class="block text-slate-700 mb-2">
          <span class="block text-sm cursor-pointer">Content</span>
          <span class="text-[12px] text-medium">Be specific, imagine you're asking a question to another person</span>
        </label>
        <textarea name="content" id="q-editor"></textarea>
        <div class="mt-4" x-show="complete.title">
          <div x-show="!complete.content">
            <button @click.prevent="unlockTags()" class="py-2 px-3 text-white text-sm rounded" :class="complete.nextContent ? 'bg-blue-500' : 'bg-blue-300 cursor-not-allowed'">Next</button>
          </div>
        </div>
      </div>
      <div class="p-4 bg-white rounded shadow mt-6 relative overflow-hidden">
        <div x-show="!complete.content" class="lock absolute inset-0 bg-gray-50 flex justify-center items-center opacity-80 text-gray-300 z-10">
          <i class="fa-solid fa-lock text-6xl"></i>
        </div>
        <label for="q-content" class="block text-slate-700 mb-2">
          <span class="block text-sm cursor-pointer">Tags</span>
          <span class="text-[12px] text-medium">Select some tags </span>
        </label>
        <select id="tag-selector" x-ref="select2" class="select2-tw" name="state" multiple="true">
        </select>
      </div>
      <button type="submit" class="px-3 py-1.5 rounded text-sm text-white mt-5" :class="complete.title && complete.content ? 'bg-sky-500' : 'bg-sky-200 cursor-not-allowed'" @click.prevent="submitData()">Review your question</button>
    </form>
  </div>
@endsection

@section('right-widgets')
<x-front.widgets.platform-info />
@endsection

@section('js')
    <script>

    </script>
@endsection
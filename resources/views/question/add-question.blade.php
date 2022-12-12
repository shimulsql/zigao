@extends('layouts.home-content-right')

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
  <form action="" class="mt-5">
    <div class="p-4 bg-white rounded shadow">
      <label for="title" class="block text-slate-700 mb-2">
        <span class="block text-sm cursor-pointer">Title</span>
        <span class="text-[12px] text-medium">Be specific, imagine you're asking a question to another person</span>
      </label>
      <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="p-4 bg-white rounded shadow mt-6">
      <label for="q-content" class="block text-slate-700 mb-2">
        <span class="block text-sm cursor-pointer">Content</span>
        <span class="text-[12px] text-medium">Be specific, imagine you're asking a question to another person</span>
      </label>
      <textarea name="content" id="q-editor"></textarea>
    </div>
    <div class="p-4 bg-white rounded shadow mt-6">
      <label for="q-content" class="block text-slate-700 mb-2">
        <span class="block text-sm cursor-pointer">Tags</span>
        <span class="text-[12px] text-medium">Be specific, imagine you're asking a question to another person</span>
      </label>
      <select id="tag-selector" class="select2-tw" name="state" multiple="true">
        <option value="php" data-count="2413">php</option>
        <option value="javascript" data-count="1271">javascript</option>
        <option value="php" data-count="2413">react</option>
        <option value="javascript" data-count="1271">laravel</option>
      </select>
    </div>
    <button type="submit" class="px-3 py-1.5 bg-sky-500 rounded text-sm text-white mt-5">Review your question</button>
  </form>
</div>
@endsection

@section('right-widgets')
<x-front.widgets.platform-info />
@endsection
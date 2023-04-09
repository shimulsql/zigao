@extends('layouts.app-full')

@section('content')
<div class="min-h-[100vh] bg-no-repeat bg-[-300px_0] bg-contain mt-10 px-10"
  style="background-image: url('/images/bg/home-guest-bg.png')">
  <div class="md:flex justify-around font-roboto">
    <div class="md: w-[45%] pt-12">
      <h1 class="text-5xl font-extrabold text-slate-800">What is <br> Zigao?</h1>
      <p class="text-2xl text-slate-500 mt-6">
        Zigao is a question and answer platform
        where people get solve of their problems and share
        knowledge over the world
      </p>
    </div>
    <div class="w-[25%]">
      <img src="/images/home-guest-artwork.png" alt="" class="w-[100%] m-auto">

      <a class="py-2 block text-center rounded border border-orange-400 bg-orange-100 text-orange-400 mt-4" href="">Join
        the
        community</a>
      <a class="py-2 block text-center rounded bg-orange-400 text-white mt-4" href="">Explore</a>
    </div>
  </div>
</div>
@endsection
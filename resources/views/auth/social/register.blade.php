@extends('layouts.auth')

@section('content')
<div class="bg-gray-100 min-h-[100vh] -mt-14 flex items-center">
  <div class="md:w-3/12 sm:w-5/12 w-[95%] m-auto">
    <a href="/">
      <img src="{{asset('resources/images/logo-black.png')}}" class="w-28 m-auto" alt="">
    </a>
    <div class="mt-3 p-2 rounded bg-gray-200 border border-gray-500">
      <h3 class="text-center text-gray-700 text-xl">You are almost done!</h3>
      <p class="mt-2 text-gray-600 text-sm text-center font-medium text-gray-600">
        ( <span class="text-gray-500">{{ $user->getEmail() }}</span> )
      </p>
    </div>
    <div class="bg-white rounded-lg shadow p-6 mt-4">
      <form action="{{route('register.social')}}" method="POST">
        @csrf
        <h2 class="uppercase font-bold text-gray-300">signup with
          <x-helper.auth-provider name="{{$provider}}" />
        </h2>

        <div class="mt-4">
          <div class="flex justify-center my-7">
            <img src="{{$user->getAvatar()}}" class="h-14 w-14 object-cover rounded overflow-hidden"
              alt="{{$user->getName()}}">
          </div>
          <x-input.text label="Display name" value="{{$user->getName()}}" name="name"
            error="{{$errors->first('name')}}" />
        </div>
        <div class="mt-4">
          <button class="py-1.5 text-center text-slate-200 text-xs bg-slate-600 w-full rounded">
            Create my account
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
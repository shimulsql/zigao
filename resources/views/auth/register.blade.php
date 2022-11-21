@extends('layouts.auth')

@section('content')
<div class="bg-gray-100 min-h-[100vh] -mt-14 flex items-center">
  <div class="md:w-3/12 sm:w-5/12 w-[95%] m-auto">
    <a href="/">
      <img src="{{asset('resources/images/logo-black.png')}}" class="w-28 m-auto" alt="">
    </a>
    <div class="bg-white rounded-lg shadow p-6 mt-4">
      <form action="{{route('register')}}" method="POST">
        @csrf
        <h2 class="uppercase font-bold text-gray-300">signup</h2>

        <div class="mt-4">
          <x-input.text label="Name" value="{{old('name')}}" name="name" error="{{$errors->first('name')}}" />
        </div>
        <div class="mt-2">
          <x-input.text label="Email" name="email" value="{{old('email')}}" error="{{$errors->first('email')}}" />
        </div>
        <div class="mt-2">
          <x-input.password label="Password" value="{{old('password')}}" name="password"
            error="{{$errors->first('password')}}" />
        </div>
        <div class="mt-2">
          <x-input.password label="Confirm Password" name="password_confirm"
            error="{{$errors->first('password_confirm')}}" />
        </div>

        <div class="mt-4">
          <button class="py-1.5 text-center text-slate-200 text-xs bg-slate-600 w-full rounded">Signup</button>
        </div>
        <div class="mt-4 text-xs text-right">
          Have an account? <a href="{{route('login.page')}}" class="text-blue-500">Login</a>
        </div>
      </form>
    </div>
    <div class="text-xs uppercase text-center text-gray-400 font-medium my-5">
      <i class="fa-light fa-laptop"></i> signup with
    </div>
    <ul class="w-[70%] m-auto">
      <li>
        <a href="{{route('login.social', 'google')}}"
          class="group bg-red-100 hover:bg-red-500 px-3 py-1.5 text-xs text-red-500 hover:text-red-100 text-center block rounded">
          <i class="fa-brands fa-google text-red-500 group-hover:text-red-50"></i> Create account with Google
        </a>
      </li>
      <li class="mt-2">
        <a href="{{route('login.social', 'facebook')}}"
          class="group bg-blue-100 hover:bg-blue-500 px-3 py-1.5 text-xs text-blue-500 hover:text-blue-100 text-center block rounded">
          <i class="fa-brands fa-facebook text-blue-500 group-hover:text-blue-50"></i> Create account with Facebook
        </a>
      </li>
    </ul>
  </div>
</div>
@endsection
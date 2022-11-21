@extends('layouts.auth')

@section('content')
<div class="bg-gray-100 min-h-[100vh] -mt-14 flex items-center">
  <div class="md:w-3/12 sm:w-5/12 w-[95%] m-auto">
    <a href="/">
      <img src="{{asset('resources/images/logo-black.png')}}" class="w-28 m-auto" alt="">
    </a>
    @if (session('success'))
    <div class="bg-green-600 text-white text-sm text-center py-1 my-2 rounded ">
      {{session('success')}}
    </div>
    @endif
    <div class="bg-white rounded-lg shadow p-6 mt-4">
      <form action="{{route('login')}}" method="POST">
        @csrf
        <h2 class="uppercase font-bold text-gray-300">login</h2>

        <div class="mt-2">
          <x-input.text label="Email" name="email" value="{{old('email')}}" error="{{$errors->first('email')}}" />
        </div>
        <div class="mt-2">
          <x-input.password label="Password" name="password" error="" />
        </div>

        <div class="mt-4">
          <button class="py-1.5 text-center text-slate-200 text-xs bg-slate-600 w-full rounded">Login</button>
        </div>
        <div class="mt-4 text-xs text-right">
          No account? <a href="{{route('register.page')}}" class="text-blue-500">Signup</a>
        </div>
      </form>
    </div>
    <div class="text-xs uppercase text-center text-gray-400 font-medium my-5">
      <i class="fa-light fa-laptop"></i> login with
    </div>
    <ul class="w-[70%] m-auto">
      <li>
        <a href="{{route('login.social', 'google')}}"
          class="group bg-red-100 hover:bg-red-500 px-3 py-1.5 text-xs text-red-500 hover:text-red-100 text-center block rounded">
          <i class="fa-brands fa-google text-red-500 group-hover:text-red-50"></i> Login with Google
        </a>
      </li>
      <li class="mt-2">
        <a href="{{route('login.social', 'facebook')}}"
          class="group bg-blue-100 hover:bg-blue-500 px-3 py-1.5 text-xs text-blue-500 hover:text-blue-100 text-center block rounded">
          <i class="fa-brands fa-facebook text-blue-500 group-hover:text-blue-50"></i> Login with Facebook
        </a>
      </li>
    </ul>
  </div>
</div>
@endsection
<div class="bg-slate-700 fixed left-0 top-0 right-0 shadow-lg z-50 z-50">
    <div class="container">
        <nav class="flex items-center">
            <div class="w-[150px]">
                <a href="{{route('homepage')}}"><img class="w-24" src="{{asset('images/logo.png')}}" alt=""></a>
            </div>
            <div class="grow px-5">
                <div class="relative">
                    <input
                        class="w-full focus-visible:outline-none rounded bg-slate-500 px-3 py-1 text-slate-200 font-base font-light text-sm pl-8"
                        type="text" placeholder="search..">
                    <i class="fa-regular fa-search absolute left-2 top-1 text-slate-400"></i>
                </div>
            </div>
            <div class="flex ml-auto w-[280px] items-center">
                @if (Auth::check())
                <a href="#">
                    <img src="{{asset('images/profile.jpg')}}"
                        class="h-[38px] w-[38px] rounded-full object-cover border-2 border-yellow-500" alt="">
                </a>
                @endif
                <div class="ml-auto text-white text-xl">
                    <ul class="flex">
                        @if (Auth::check())
                        <li class="relative p-3" x-data="{ open: false }" :class="open && 'bg-slate-600'">
                            <i class="fa-solid fa-inbox cursor-pointer" @click="open = !open"></i>
                            <div class="absolute right-0 top-[100%] bg-white shadow rounded w-80 text-sm text-gray-600"
                                x-show="open" @click.outside="open = false">
                                <div class="bg-gray-100 text-xs px-2 py-1">
                                    <span class="font-medium">Inbox</span>
                                </div>
                                <ul>
                                    <li class="p-4">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, pariatur
                                        error,
                                    </li>
                                    <li class="p-4">
                                        neque sint labore earum odio molestias ducimus dicta impedit modi soluta
                                        officiis autem quisquam
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="relative p-3" x-data="{ open: false }" :class="open && 'bg-slate-600'">
                            <i class="fa-solid fa-trophy-alt cursor-pointer" @click="open = !open"></i>
                            <div class="absolute right-0 top-[100%] bg-white shadow rounded w-80 text-sm text-gray-600"
                                x-show="open" @click.outside="open = false">
                                <div class="bg-gray-100 text-xs px-2 py-1">
                                    <span class="font-medium">Achievements</span>
                                </div>
                                <ul>
                                    <li class="p-4">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, pariatur
                                        error,
                                    </li>
                                    <li class="p-4">
                                        neque sint labore earum odio molestias ducimus dicta impedit modi soluta
                                        officiis autem quisquam
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="relative p-3" x-data="{ open: false }" :class="open && 'bg-slate-600'">
                            <i class="fa-solid fa-question-circle text-green-400 cursor-pointer"
                                @click="open = !open"></i>
                            <div class="absolute right-0 top-[100%] bg-white shadow rounded w-80 text-sm text-gray-600"
                                x-show="open" @click.outside="open = false">
                                <div class="bg-gray-100 text-xs px-2 py-1">
                                    <span class="font-medium">Help</span>
                                </div>
                                <ul>
                                    <li class="p-4">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, pariatur
                                        error,
                                    </li>
                                    <li class="p-4">
                                        neque sint labore earum odio molestias ducimus dicta impedit modi soluta
                                        officiis autem quisquam
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                        <li class="p-3">
                            <a href="{{route('login.page')}}"
                                class="text-sm border border-slate-600 rounded px-4 py-1 text-slate-300">Login</a>
                            <a href="{{route('register.page')}}"
                                class="text-sm bg-sky-500 rounded px-4 py-1 text-white">Signup</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<li class="relative p-3" x-data="{ open: false }" x-init="$refs.dropdown.classList.remove('hidden')" :class="open && 'bg-slate-600'">
    <i class="fa-solid {{$icon}} cursor-pointer" @click="open = !open"></i>
    <div class="absolute right-0 top-[100%] bg-white shadow rounded w-80 text-sm text-gray-600 hidden"
        x-show="open" x-ref="dropdown" @click.outside="open = false">
        <div class="bg-gray-100 text-xs px-2 py-1">
            <span class="font-medium">{{$title}}</span>
        </div>
        {{ $slot }}
    </div>
</li>
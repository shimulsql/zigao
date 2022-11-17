<div x-data="{focus: false, error: {{ $error != '' ? 'true' : 'false' }}}">
    <label for="input-{{$name}}" class="text-xs text-gray-500">{{$label}}</label>
    <div class="border pr-4 rounded overflow-hidden relative" :class="[focus && !error ? 'bg-amber-100' : 'bg-gray-50', 
        error ? 'border-red-500 bg-red-100' : 'border-gray-200']">

        <input type="text" class="reset-input px-3 py-1.5 text-xs bg-transparent" @focus="focus = true"
            @blur="focus = false" name="{{$name}}" id="input-{{$name}}" @change="error = false" value="{{$value}}">
        <i class="fa-regular fa-user absolute right-1 top-1 " :class="focus ? 'text-yellow-500': 'text-gray-500'"></i>
    </div>
    <span class="text-xs text-red-500" x-show="error">{{$error}}</span>
</div>
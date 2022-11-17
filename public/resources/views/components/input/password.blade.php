<div class="mt-1" x-data="{focus: false, show: false, error: {{$error != '' ? 'true' : 'false'}}}">
    <label for="input-{{$name}}" class="text-xs text-gray-500">{{$label}}</label>
    <div class="border border-gray-200 pr-4 rounded overflow-hidden relative" :class="[focus && !error ? 'bg-amber-100' : 'bg-gray-50', 
    error ? 'border-red-500 bg-red-100' : 'border-gray-200']">

        <input id="input-{{$name}}" :type="show ? 'text' : 'password'" name="{{$name}}"
            class="reset-input px-3 py-1.5 text-xs bg-transparent" @focus="focus = true" @click.outside="focus = false"
            @change="error = false">

        <i class="fa-regular cursor-pointer absolute right-1 top-1 "
            :class="{'text-yellow-500' : focus, 'text-gray-500': !focus, 'fa-eye': !show, 'fa-eye-slash': show}"
            @click="show = !show"></i>
    </div>
    <span class="text-xs text-red-500" x-show="error">{{$error}}</span>
</div>
<div class="sm:flex w-full border-t border-gray-200 p-4">
    <div class="w-2/12 text-sm text-right">
      <div class="mb-2">
        2 votes
      </div>
      <span class="text-xs border border-emerald-700 text-emerald-700 rounded px-2 py-0.5">
        1 answer
      </span>
      <div class="mt-2 text-gray-500">
        5 views
      </div>
    </div>
    <div class="px-4 grow">
      <a href="{{route('question.show', $question->id)}}" class="text-blue-500 hover:text-blue-400 text-lg">{{$question->title}}</a>
  
      <div class="flex mt-1">
        <div class="w-8/12">
          <ul class="">
            @foreach ($question->tags as $tag)
            <li class="inline-block mb-1">
                <a href="" class="px-2 py-1 bg-blue-50 hover:bg-blue-100 text-sky-600 rounded text-[11px]">{{$tag->name}}</a>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="w-4/12">
          <div class="flex items-center mt-6">
            <img src="/images/profile.jpg" class="h-7 w-7 rounded object-cover mr-2" alt="">
            <div>
              <a href="" class="block text-xs text-blue-500">Mostafizur Rahman</a>
              <p class="text-[10px] text-gray-500">asked {{$question->updated_at->diffForHumans()}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- single question -->
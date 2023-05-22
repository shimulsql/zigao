<div class="flex gap-5 border-b border-gray-200 pb-6 mb-6" 
  x-data="questionEntryState" 
  x-init="loadData({{$initialData}})"
>
    <div class="w-[5%] flex flex-col items-center">
      <i class="fa-solid fa-caret-up text-5xl text-gray-300 cursor-pointer" 
      data-popover-target="vote-up-popover" 
      data-popover-placement="right"
      data-popover-offset="20"
      :class="{'text-orange-500': hasVoteUp}"
      ></i>
      <span class="text-xl text-gray-500" x-text="voteCount"></span>
      <i 
      class="fa-solid fa-caret-down text-5xl text-gray-300 cursor-pointer"
      data-popover-target="vote-down-popover" 
      data-popover-placement="right"
      data-popover-offset="20"
      :class="{'text-orange-500': hasVoteDown}"
      ></i>
      <div class="mt-2 text-gray-300 flex flex-col items-center">
        <i class="fa-regular fa-bookmark cursor-pointer"
        data-popover-target="bookmark-popover" 
        data-popover-placement="right"
        data-popover-offset="20"
        ></i>
        <i class="fa-sharp fa-regular fa-clock-rotate-left text-lg hover:text-blue-500 cursor-pointer mt-1"
        data-popover-target="activity-popover" 
        data-popover-placement="right"
        data-popover-offset="20"
        ></i>
      </div>
      {{-- Popovers  --}}
      <x-front.ui.popover id="vote-up-popover">
        <p class="text-gray-800">
          This is clear and useful
        </p>
      </x-front.ui.popover>
      <x-front.ui.popover id="vote-down-popover">
        <p class="text-gray-800">
          This is not clear or useful 
        </p>
      </x-front.ui.popover>
      <x-front.ui.popover id="bookmark-popover">
        <p class="text-gray-800">
          Bookmark this question
        </p>
      </x-front.ui.popover>
      <x-front.ui.popover id="activity-popover">
        <p class="text-gray-800">
          Show activity on this post
        </p>
      </x-front.ui.popover>

    </div>
    <div class="grow">
      <div class="ck-content">
        {!!$entry->content!!}
        {!!$content!!}
      </div>
      @if ($entry->tags)
        <ul class="mt-6">
            @foreach ($entry->tags as $tag)
            <li class="inline-block mb-1">
                <a href="" class="px-2 py-1 bg-blue-50 hover:bg-blue-100 text-sky-600 rounded text-[11px]">{{$tag->name}}</a>
            </li>
            @endforeach
        </ul>
      @endif
      <div class="flex mt-8">
        <div class="w-3/12 flex text-gray-400 text-[13px] gap-3">
          <a href="" class="hover:text-gray-300">Share</a>
          <a href="" class="hover:text-gray-300">Follow</a>
          <a href="" class="hover:text-gray-300">Flag</a>
        </div>
        <div class="flex grow justify-end">
          <div class="bg-sky-50 rounded px-3 py-1">
            <span class="text-xs text-gray-500">{{$entry->type == '0' ? 'answered' : 'asked'}} {{$entry->created_at->diffForHumans()}}</span>
            <div class="flex mt-1">
              <img src="/images/profile.jpg" alt="" class="w-10 h-10 rounded object-cover">
              <div class="ml-2">
                <a href="#" class="text-[13px] text-blue-500 font-light">{{$entry->user->name}}</a>
                <h4 class="text-xs text-gray-500 font-bold">2640</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="mt-5 pt-5 border-t border-gray-200" x-data="answerState" x-init="question_id={{$question->id}}">
  <h2 class="text-lg text-gray-700 mb-3">Your Answer</h2>
  <textarea name="" id="answer">@if ($draft) {{$draft->content}} @endif</textarea>
  <div x-html="content" class="my-6 ck-content"></div>
  <button class="btn btn-primary block mt-10" :class="hasError && `opacity-50 cursor-not-allowed`" :disabled="hasError" @click="submit">
    Post Your Answer
  </button>
</div>
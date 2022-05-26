@csrf
<div class=" bg-white rounded-md max-w-2xl mx-auto">
    <div class="space-y-4">
        <textarea required name="body" cols="30" rows="10" placeholder="本文" class="w-full font-serif text-gray-600 outline-none rounded-md">{{ $article->body ?? old('body') }}</textarea>
    </div>
</div>
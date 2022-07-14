@csrf
<div class="py-12">
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <div class=" bg-white rounded-md max-w-2xl mx-auto">
        <div class="space-y-4">
            <textarea required name="body" cols="30" rows="10" placeholder="本文" class="w-full text-gray-600 outline-none rounded-md"></textarea>
        </div>
    </div>
</div>

@csrf
<div class="py-12">
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <label>タイトル</label>
    </div>
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <input type="text" name="title" value="{{ $article->title ?? old('title') }}">
    </div>
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <label></label>
        <textarea name="body" required placeholder="本文" rows="16">{{ $article->body ?? old('body') }}</textarea>
    </div>
</div>

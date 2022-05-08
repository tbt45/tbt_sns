<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事投稿') }}
        </h2>
    </x-slot>

    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('articles.store') }}">
            @include('articles.form')
            <x-select-image :images="$images" name="image1" />
            <x-select-image :images="$images" name="image2" />
            <x-select-image :images="$images" name="image3" />
            <x-select-image :images="$images" name="image4" />
            <x-select-image :images="$images" name="image5" />
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">投稿する</button>
            </div>
        </form>
    </div>

    <script>
        'use strict'
        const images = document.querySelectorAll('.image')
        
        images.forEach( image =>  {
            image.addEventListener('click', function(e){
            const imageName = e.target.dataset.id.substr(0, 6)
            const imageId = e.target.dataset.id.replace(imageName + '_', '')
            const imageFile = e.target.dataset.file
            const imagePath = e.target.dataset.path
            const modal = e.target.dataset.modal
            document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile
            document.getElementById(imageName + '_hidden').value = imageId
            MicroModal.close(modal);
        }, )
        })  
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />

                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />
                        </div>

                        <!-- Video URL -->
                        <div class="mt-4">
                            <x-input-label for="video_url" :value="__('Video URL')" />

                            <x-text-input id="video_url" class="block mt-1 w-full" type="text" name="video_url" :value="old('video_url')" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="video_url" :value="__('Description')" />

                            <x-trix-field id="description" name="description" />
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Create') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

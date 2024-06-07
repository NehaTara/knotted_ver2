<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                        <h3 class="mb-2 text-2xl font-bold">{{ $article->title }}</h3>
                        <p class="mb-2 text-sm text-gray-600">by {{ $article->author }}</p>
                        <p class="mb-4">{{ $article->description }}</p>
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            @foreach (json_decode($article->images) as $image)
                                <img src="{{ $image }}" alt="Inspiration Image" class="rounded-lg shadow-md">
                            @endforeach
                        </div>
                        <p>{{ $article->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

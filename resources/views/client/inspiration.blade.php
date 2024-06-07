<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Wedding Inspirations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                        @foreach ($articles as $article)
                            <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                                <a href="{{ route('client.inspiration.show', $article) }}">
                                    <img src="{{ json_decode($article->images)[0] }}" alt="Inspiration Image"
                                        class="mb-4 h-40 w-full rounded-lg object-cover shadow-md">
                                    <h4 class="mb-2 text-xl font-bold">{{ $article->title }}</h4>
                                    <p class="mb-2 text-sm text-gray-600">by {{ $article->author }}</p>
                                    <p class="mb-4">{{ $article->description }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Article Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                        <h3 class="mb-2 text-2xl font-bold">{{ $article->title }}</h3>
                        <p class="mb-4">{{ $article->author }}</p>
                        <p class="mb-4">{{ $article->description }}</p>
                        <p class="mb-4">{{ $article->content }}</p>
                        <div class="mb-4">
                            @foreach ($article->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $article->title }} Image"
                                    class="mb-4 w-full rounded-lg shadow-md">
                            @endforeach
                        </div>
                        <a href="{{ route('wedding_planner.blogevents.edit', $article) }}" class="inline-block">
                            <x-secondary-button>
                                Edit
                            </x-secondary-button>
                        </a>
                        <form action="{{ route('wedding_planner.blogevents.destroy', $article) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <x-danger-button onclick="return confirm('Are you sure you want to delete this article?');">
                                Delete
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

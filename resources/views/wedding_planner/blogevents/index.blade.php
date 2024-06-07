<x-app-layout>
    <x-slot name="header">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold">Blog </h3>
                        <p class="mb-4">Add articles to provide inspiration to clients</p>
                    </div>
                    <a href="{{ route('wedding_planner.blogevents.create') }}" class="mb-4 inline-block">
                        <x-primary-button>
                            Add New Article
                        </x-primary-button>
                    </a>
                </div>
                @if ($articles->isEmpty())
                    <p>No articles found. Add a new article to get started.</p>
                @else
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($articles as $article)
                            <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                                <a href="{{ route('wedding_planner.blogevents.show', $article) }}">
                                    <h4 class="mb-2 text-xl font-bold">{{ $article->title }}</h4>
                                </a>
                                <p class="mb-4">{{ $article->description }}</p>
                                <a href="{{ route('wedding_planner.blogevents.edit', $article) }}" class="inline-block">
                                    <x-secondary-button>
                                        Edit
                                    </x-secondary-button>
                                </a>
                                <form action="{{ route('wedding_planner.blogevents.destroy', $article) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button
                                        onclick="return confirm('Are you sure you want to delete this article?');">
                                        Delete
                                    </x-danger-button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </x-slot>

</x-app-layout>

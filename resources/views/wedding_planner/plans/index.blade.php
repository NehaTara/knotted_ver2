<x-app-layout>
    <x-slot name="header">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between">
                    <h3 class="mb-4 text-2xl font-semibold">Wedding Plans</h3>
                    <a href="{{ route('wedding_planner.plans.create') }}" class="mb-4 inline-block">
                        <x-primary-button>
                            Create New Plan
                        </x-primary-button>
                    </a>
                </div>
                @if ($plans->isEmpty())
                    <p>No plans found. Create a new plan to get started.</p>
                @else
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($plans as $plan)
                            <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                                <a href="{{ route('wedding_planner.plans.show', $plan) }}">
                                    <h4 class="mb-2 text-xl font-bold">{{ $plan->name }}</h4>
                                </a>
                                <p class="mb-4">{{ $plan->description }}</p>
                                <a href="{{ route('wedding_planner.plans.edit', $plan) }}" class="inline-block">
                                    <x-secondary-button>
                                        Edit
                                    </x-secondary-button>
                                </a>
                                <form action="{{ route('wedding_planner.plans.destroy', $plan) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button
                                        onclick="return confirm('Are you sure you want to delete this plan?');">
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

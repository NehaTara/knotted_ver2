<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Wedding Plan Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                        <h3 class="mb-2 text-2xl font-bold">{{ $plan->name }}</h3>
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
                            <x-danger-button onclick="return confirm('Are you sure you want to delete this plan?');">
                                Delete
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

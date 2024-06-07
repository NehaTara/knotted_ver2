<x-app-layout>
    <x-slot name="header">
        <div class="overflow-hidden bg-white sm:rounded-lg">
            <div class="py-6 text-gray-900">
                <div class="flex items-center rounded-lg">
                    @if ($planner->weddingPlanner->logo)
                        <img src="{{ $planner->weddingPlanner->logo }}" alt="{{ $planner->name }} Logo"
                            class="mb-4 h-40 w-40 rounded-full object-cover shadow-md">
                    @else
                        @php
                            $colors = [
                                'bg-red-400',
                                'bg-green-400',
                                'bg-blue-400',
                                'bg-yellow-400',
                                'bg-purple-400',
                                'bg-pink-400',
                                'bg-indigo-400',
                                'bg-gray-400',
                            ];
                            $randomColor = $colors[array_rand($colors)];
                            $nameParts = explode(' ', $planner->name);
                            $initials = strtoupper($nameParts[0][0] . $nameParts[count($nameParts) - 1][0]);
                        @endphp
                        <div class="{{ $randomColor }} mb-4 flex h-32 w-32 items-center justify-center rounded-full">
                            <span class="text-2xl font-bold text-white">
                                {{ $initials }}
                            </span>
                        </div>
                    @endif
                    <div class="ml-6">
                        <h3 class="mb-2 text-2xl font-bold">{{ $planner->name }}</h3>
                        <p class="mb-4">{{ $planner->weddingPlanner->description }}</p>
                        <p class="mb-2"><strong>Email:</strong> {{ $planner->email }}</p>
                        <p class="mb-2"><strong>Phone:</strong>
                            {{ $planner->weddingPlanner->phone ?? 'Phone not added' }}</p>
                        <p class="mb-2"><strong>Address:</strong>
                            {{ $planner->weddingPlanner->address ?? 'Address not added' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="mb-6 text-xl font-semibold">Wedding Plans</h4>
                    @if ($planner->weddingPlanner->weddingPlans->isEmpty())
                        <p>No wedding plans available.</p>
                    @else
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($planner->weddingPlanner->weddingPlans as $plan)
                                <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
                                    <h5 class="mb-2 text-lg font-bold">{{ $plan->name }}</h5>
                                    <p>{{ $plan->description }}</p>
                                    <a href="{{ route('order.create', ['planner' => $planner->id, 'plan' => $plan->id]) }}"
                                        class="mt-4 inline-block rounded bg-blue-500 px-4 py-2 text-white">
                                        Buy Now
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

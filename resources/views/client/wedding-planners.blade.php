<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Wedding Planners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-2xl font-semibold">Wedding Planners</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                        @foreach ($planners as $planner)
                            <div class="flex flex-col items-center rounded-lg bg-gray-100 p-6 shadow-lg">
                                <a href="{{ route('client.wedding-planners.show', $planner) }}">
                                    @if ($planner->weddingPlanner->logo)
                                        <img src="{{ $planner->weddingPlanner->logo }}" alt="{{ $planner->name }} Logo"
                                            class="mb-4 h-40 w-full rounded-lg object-cover shadow-md">
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
                                            $initials = strtoupper(
                                                $nameParts[0][0] . $nameParts[count($nameParts) - 1][0],
                                            );
                                        @endphp
                                        <div
                                            class="{{ $randomColor }} mx-auto mb-4 flex h-32 w-32 items-center justify-center rounded-full">
                                            <span class="text-2xl font-bold text-white">
                                                {{ $initials }}
                                            </span>
                                        </div>
                                    @endif
                                    <h4 class="mb-2 text-xl font-bold">{{ $planner->name }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

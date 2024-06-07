<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $planner->name }}</h3>
                    <p><strong>Email:</strong> {{ $planner->email }}</p>
                    <p><strong>Phone:</strong> {{ $planner->weddingPlanner->phone ?? 'N/A' }}</p>
                    <p><strong>Address:</strong> {{ $planner->weddingPlanner->address ?? 'N/A' }}</p>

                    <h4 class="mb-2 mt-6 text-xl font-semibold">Wedding Plans</h4>
                    @if ($planner->weddingPlanner->weddingPlans->isEmpty())
                        <p>No plans found.</p>
                    @else
                        <ul>
                            @foreach ($planner->weddingPlanner->weddingPlans as $plan)
                                <li class="mb-2 rounded bg-gray-200 p-4">
                                    <h5 class="font-bold">{{ $plan->name }}</h5>
                                    <p>{{ $plan->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('admin.wedding_planners') }}"
                            class="rounded bg-gray-500 px-4 py-2 text-white">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 rounded-lg bg-gray-100 p-6 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="mb-2 text-2xl font-bold">{{ $planner->name }}</h3>
                                <p class="mb-4">{{ $planner->weddingPlanner->description }}</p>
                                <p class="mb-2"><strong>Email:</strong> {{ $planner->email }}</p>
                                <p class="mb-2"><strong>Phone:</strong>
                                    {{ $planner->weddingPlanner->phone ?? 'Phone not added' }}</p>
                                <p class="mb-2"><strong>Address:</strong>
                                    {{ $planner->weddingPlanner->address ?? 'Address not added' }}</p>
                            </div>
                            <div class="mt-6">
                                <h4 class="mb-2 text-xl font-bold">{{ $plan->name }}</h4>
                                <p>{{ $plan->description }}</p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf
                        <input type="hidden" name="planner_id" value="{{ $planner->id }}">
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                        <div class="mb-4">
                            <x-input-label for="client_name" :value="__('Your Name')" />
                            <x-text-input id="client_name" class="mt-1 block w-full" type="text" name="client_name"
                                :value="old('client_name', $user->name)" required autofocus />
                            <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="client_email" :value="__('Your Email')" />
                            <x-text-input id="client_email" class="mt-1 block w-full" type="email" name="client_email"
                                :value="old('client_email', $user->email)" required />
                            <x-input-error :messages="$errors->get('client_email')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="bride_name" :value="__('Bride Name')" />
                            <x-text-input id="bride_name" class="mt-1 block w-full" type="text" name="bride_name"
                                :value="old('bride_name')" required />
                            <x-input-error :messages="$errors->get('bride_name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="groom_name" :value="__('Groom Name')" />
                            <x-text-input id="groom_name" class="mt-1 block w-full" type="text" name="groom_name"
                                :value="old('groom_name')" required />
                            <x-input-error :messages="$errors->get('groom_name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="guests_count" :value="__('Number of Guests')" />
                            <x-text-input id="guests_count" class="mt-1 block w-full" type="number" name="guests_count"
                                :value="old('guests_count')" required />
                            <x-input-error :messages="$errors->get('guests_count')" class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ml-4">
                                {{ __('Place Order') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

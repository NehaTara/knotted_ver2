<x-app-layout>
    <style>
        .success-message {
            animation: fadeOut 3s forwards;
            animation-delay: 3s;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                display: none;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Client Preferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="success-message mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('preferences.update') }}" method="POST">
                        @csrf

                        <!-- Theme and Style -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Theme and Style</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Traditional', 'Modern', 'Rustic', 'Vintage', 'Bohemian', 'Beach'] as $style)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="theme_and_style[]" value="{{ $style }}"
                                            {{ in_array($style, old('theme_and_style', $preferences->theme_and_style ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $style }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('theme_and_style')" />
                        </div>

                        <!-- Venue -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Venue</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Indoor', 'Outdoor', 'Destination', 'Unique'] as $venue)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="venue[]" value="{{ $venue }}"
                                            {{ in_array($venue, old('venue', $preferences->venue ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $venue }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('venue')" />
                        </div>

                        <!-- Culture -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Culture</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Religious', 'Civil', 'Interfaith', 'Destination'] as $culture)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="culture[]" value="{{ $culture }}"
                                            {{ in_array($culture, old('culture', $preferences->culture ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $culture }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('culture')" />
                        </div>

                        <!-- Attire -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Attire</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Traditional', 'Non-Traditional', 'Cultural', 'Themed'] as $attire)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="attire[]" value="{{ $attire }}"
                                            {{ in_array($attire, old('attire', $preferences->attire ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $attire }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('attire')" />
                        </div>

                        <!-- Food and Drink -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Food and Drink</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Sit-Down Dinner', 'Buffet', 'Cocktail Reception', 'Food Stations', 'Signature Drinks'] as $food)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="food_and_drink[]" value="{{ $food }}"
                                            {{ in_array($food, old('food_and_drink', $preferences->food_and_drink ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $food }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('food_and_drink')" />
                        </div>

                        <!-- Flowers and Decorations -->
                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-semibold">Flowers and Decorations</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['Floral Arrangements', 'Non-Floral Decor', 'Seasonal'] as $flower)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="flowers[]" value="{{ $flower }}"
                                            {{ in_array($flower, old('flowers', $preferences->flowers ?? [])) ? 'checked' : '' }}
                                            class="form-checkbox text-blue-600">
                                        <span class="ml-2">{{ $flower }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('flowers')" />
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="ml-4 inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-blue-500 focus:border-blue-700 focus:outline-none focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25">
                                Save Preferences
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

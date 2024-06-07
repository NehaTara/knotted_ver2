<x-app-layout>
    <x-slot name="header">
        @if (!$hasPreferences)
            <div x-data="{ show: true }" x-show="show"
                class="my-4 cursor-pointer rounded-md border border-yellow-500 bg-yellow-100 p-4 text-yellow-900 shadow-md"
                @click="window.location.href='{{ route('client.preferences') }}'">
                <div class="flex items-center justify-between">
                    <div>
                        <p>{{ __('Get tailored wedding plans according to your preferences. Click here to update your preferences.') }}
                        </p>
                    </div>
                    <button @click.stop="show = false" class="text-lg font-semibold text-yellow-800">&times;</button>
                </div>
            </div>
        @endif

    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! as a client") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

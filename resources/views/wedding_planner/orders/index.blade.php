<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-6 text-2xl font-semibold">Clients</h3>
                    @if ($orders->isEmpty())
                        <p>No clients found.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Client Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Bride</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Groom</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Guests</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->client_name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->client_email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->bride_name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->groom_name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->guests_count }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if ($order->status !== 'confirmed')
                                                <form action="{{ route('orders.confirm', $order) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    <button type="submit"
                                                        class="rounded bg-green-500 px-4 py-2 text-white">Confirm</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white"
                                                    onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-6">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Received Trade Requests</h2>

                @if ($receivedTrades->count() > 0)
                    <div class="space-y-4">
                        @foreach ($receivedTrades as $trade)
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md">
                                <p class="text-gray-700 dark:text-gray-200">
                                    From: <strong>{{ $trade->requester?->name ?? 'Unknown User' }}</strong>
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Offered Card:
                                    <strong>{{ $trade->offeredCard?->card?->name ?? 'Unknown Card' }}</strong>
                                    <img src="{{ $trade->offeredCard?->card?->image_url }}" alt="Offered Card"
                                        class="h-24">
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Requested Card:
                                    <strong>{{ $trade->requestedCard?->card?->name ?? 'Unknown Card' }}</strong>
                                    <img src="{{ $trade->requestedCard?->card?->image_url }}" alt="Requested Card"
                                        class="h-24">
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Status: <strong>{{ ucfirst($trade->status) }}</strong>
                                </p>

                                @if ($trade->status === 'pending' && $trade->receiver_id === auth()->id())
                                    <form action="{{ route('trade-requests.update', $trade->id) }}" method="POST"
                                        class="mt-2 flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="action" value="accept"
                                            class="px-3 py-1 bg-green-600 text-white rounded-md">Accept</button>
                                        <button type="submit" name="action" value="reject"
                                            class="px-3 py-1 bg-red-600 text-white rounded-md">Reject</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-700 dark:text-gray-200">No trade requests received.</p>
                @endif

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Sent Trade Requests</h2>

                @if ($sentTrades->count() > 0)
                    <div class="space-y-4">
                        @foreach ($sentTrades as $trade)
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md">
                                <p class="text-gray-700 dark:text-gray-200">
                                    To: <strong>{{ $trade->receiver?->name ?? 'Unknown User' }}</strong>
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Offered Card:
                                    <strong>{{ $trade->offeredCard?->card->name ?? 'Unknown Card' }}</strong>
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Requested Card:
                                    <strong>{{ $trade->requestedCard?->card->name ?? 'Unknown Card' }}</strong>
                                </p>
                                <p class="text-gray-700 dark:text-gray-200">
                                    Status: <strong>{{ ucfirst($trade->status) }}</strong>
                                </p>

                                @if ($trade->status === 'pending' && $trade->requester_id === auth()->id())
                                    <form action="{{ route('trade-requests.destroy', $trade->id) }}" method="POST"
                                        class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded-md">Cancel</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-700 dark:text-gray-200">No trade requests sent.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

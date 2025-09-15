<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                    Your Trade Requests
                </h2>
                @if ($outgoingTrades->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">You haven't sent any trade requests yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($outgoingTrades as $trade)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                                <p><strong>To:</strong> {{ $trade->receiver->name }}</p>
                                <p><strong>Your Card:</strong> {{ $trade->offeredCard->name }}</p>
                                <p><strong>Requested Card:</strong> {{ $trade->requestedCard->name }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($trade->status) }}</p>

                                @if ($trade->status === 'pending')
                                    <form action="{{ route('trade-requests.destroy', $trade) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="bg-red-600 w-full justify-center">
                                            Cancel
                                        </x-primary-button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                    Incoming Trade Requests
                </h2>
                @if ($incomingTrades->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">No one has sent you a trade request yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($incomingTrades as $trade)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                                <p><strong>From:</strong> {{ $trade->requester->name }}</p>
                                <p><strong>Their Card:</strong> {{ $trade->offeredCard->name }}</p>
                                <p><strong>They want:</strong> {{ $trade->requestedCard->name }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($trade->status) }}</p>

                                @if ($trade->status === 'pending')
                                    <form action="{{ route('trade-requests.update', $trade) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="accept">
                                        <x-primary-button class="bg-green-600 w-full justify-center mb-2">
                                            Accept
                                        </x-primary-button>
                                    </form>
                                    <form action="{{ route('trade-requests.update', $trade) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="reject">
                                        <x-primary-button class="bg-red-600 w-full justify-center">
                                            Reject
                                        </x-primary-button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>

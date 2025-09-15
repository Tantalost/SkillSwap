<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <img src="{{ $card->image_url }}" alt="{{ $card->name }}" class="w-full h-70 object-cover">
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $card->name }}
                    </h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-6">
                        Type: {{ $card->type ?? 'Unknown' }} | Rarity: {{ $card->rarity ?? 'Unknown' }} | HP: {{ $card->hp ?? '-' }}
                    </p>

                    @auth
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                            Propose a Trade
                        </h3>
                        <form action="{{ route('trade-requests.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="requested_card_id" value="{{ $card->id }}">

                            <div>
                                <label for="offered_card_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Select a card from your collection:
                                </label>
                                <select name="offered_card_id" id="offered_card_id" class="w-full border-gray-300 rounded-md">
                                    @foreach ($userCards as $userCard)
                                        <option value="{{ $userCard->id }}">
                                            {{ $userCard->card->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <x-primary-button class="bg-emerald-800 w-full justify-center">
                                Send Trade Request
                            </x-primary-button>
                        </form>
                    @else
                        <p class="mt-4 text-gray-600">
                            <a href="{{ route('login') }}" class="text-emerald-600 hover:underline">Log in</a> to propose a trade.
                        </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

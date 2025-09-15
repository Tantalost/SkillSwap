<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">My Cards</h2>

                @if($userCards->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($userCards as $userCard)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md">
                                <img src="{{ $userCard->card->image_url }}" alt="{{ $userCard->card->name }}" class="mb-2 w-full h-70 object-cover rounded">
                                <p class="text-gray-700 dark:text-gray-200 font-bold">{{ $userCard->card->name }}</p>
                                <p class="text-gray-500 dark:text-gray-400">Type: {{ $userCard->card->type }}</p>
                                <p class="text-gray-500 dark:text-gray-400">HP: {{ $userCard->card->hp }}</p>
                                <p class="text-gray-500 dark:text-gray-400">Rarity: {{ $userCard->card->rarity }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-700 dark:text-gray-200">You don't have any cards yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-900">
                All Pokémon Cards
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($cards as $card)
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                        <a href="{{ route('cards.show', $card) }}">
                            <img src="{{ $card->image_url }}" alt="{{ $card->name }}" class="w-full h-70 object-cover">
                        </a>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $card->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Type: {{ $card->type }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Rarity: {{ $card->rarity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <x-category-tabs />
                </div>
            </div>
            <div class="mt-6 text-gray-900">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($posts as $post)
                        <x-post-item :post="$post" />
                    @empty
                        <p class="text-center text-gray-500">No posts available.</p>
                    @endforelse
                </div>
                {{ $posts->onEachSide(1)->links() }}
            </div>
    </div>
</x-app-layout>

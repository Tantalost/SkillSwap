<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.store') }}" 
                enctype="multipart/form-data" method="post">
                    
                    @csrf     
                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" 
                        type="email" name="email" :value="old('title')" required 
                        autofocus />
                        <x-input-error :messages="$errors->get('title')" 
                        class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4 bg-emerald-800">
                        {{ __('Submit') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

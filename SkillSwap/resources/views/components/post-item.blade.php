<div class="bg-gray rounded-lg dark:bg-red-400 flex flex-col mb-4"> 
    <a href="#" class="block">
        <img class="w-full h-full object-cover rounded-t-lg"
            src="https://pkmncards.com/wp-content/uploads/sv4-5_en_234_std.jpg" alt="{{ $post->title }}" />
    </a>
    <div class="p-4 flex flex-col flex-1">
        <a href="#" class="block">
            <h5 class="mb-3 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">
                {{ $post->title }}
            </h5>
        </a>
        <div class="mt-auto">
            <a href="#">
                <x-primary-button class="bg-emerald-800 w-full justify-center ">
                    Trade!
                </x-primary-button>
            </a>
        </div>
    </div>
</div>
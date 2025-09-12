<x-app-layout>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <ul
                        class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-2 text-white bg-gray-500 rounded-lg active"
                                aria-current="page">
                                All
                            </a>
                        </li>
                        @foreach ($categories as $catergories)
                            <li class="me-2">
                                <a href="#"
                                    class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-blue-600 dark:hover:bg-blue-600 dark:hover:text-white">
                                    {{ $catergories->name }}</a>
                            </li>
                        @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 text-gray-900">
            @foreach ($posts as $post)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img style="width: 275px; height: 384px;"class="rounded-t-lg" src="https://pkmncards.com/wp-content/uploads/sv4-5_en_234_std.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white justify-center">Charizard Terra</h5>
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Trade!
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</x-app-layout>

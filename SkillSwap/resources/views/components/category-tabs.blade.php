<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active" aria-current="page">
            All
        </a>
    </li>
    @foreach ($categories as $catergories)
        <li class="me-2">
            <a href="#"
                class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-blue-300 dark:hover:bg-blue-300 dark:hover:text-white">
                {{ $catergories->name }}</a>
        </li>
    @endforeach
    </li>
</ul>
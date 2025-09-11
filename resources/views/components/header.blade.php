<header class="bg-gray-800 text-white p-4 md:block hidden" x-data="{ open: false } sm:hidden">
    <div class="container mx-auto flex justify-between items-center px-4">

        <a href="{{ url('/') }}">
            <h1 class="text-3xl font-semibold">
                <i class="fas fa-clipboard-list text-4xl text-white mr-2"></i>
                Tasklee
            </h1>
        </a>

        <nav class="flex items-center gap-8">
            <div class="flex gap-4">
                <x-nav-link url="/tasks" :active="request()->is('tasks')" icon="fa-bars">All Tasks</x-nav-link>
                <x-nav-link url="/tasks/completed" :active="request()->is('tasks/completed')" icon="fa-bars">Completed Tasks</x-nav-link>
            </div>

            <a class="bg-indigo-500 hover:bg-indigo-600 text-white hover:text-gray-300 px-4 py-2 rounded-md font-semibold inline-flex items-center"
                href="{{ route('tasks.create') }}">
                <i class="fa fa-add mr-2"></i> Create New Task
            </a>
        </nav>
    </div>
</header>

<!-- Mobile Menu -->
<nav class="md:hidden bg-gray-800 text-white p-4 px-6 flex flex-row justify-between relative" x-data="{ open: false }">
    <a href="{{ url('/') }}">
        <h1 class="text-2xl font-semibold flex items-center">
            <i class="fas fa-clipboard-list text-4xl text-white mr-2"></i>
            Tasklee
        </h1>
    </a>

    <!-- Hamburger -->
    <button @click="open = !open" id="hamburger" class="text-white flex items-center">
        <i class="fa fa-bars text-2xl"></i>
    </button>

    <!-- Dropdown -->
    <div x-show="open" x-cloak @click.away="open = false"
         class="absolute top-full right-0 bg-gray-800 text-white w-48 mt-2 rounded shadow-md flex flex-col z-50"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
    >
        <x-nav-link url="/tasks" :active="request()->is('tasks')" icon="fa-bars">All Tasks</x-nav-link>
        <x-nav-link url="/tasks/completed" :active="request()->is('tasks/completed')" icon="fa-bars">Completed Tasks</x-nav-link>
    </div>
</nav>


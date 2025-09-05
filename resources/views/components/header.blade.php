<header class="bg-gray-800 text-white p-4" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">

            <h1 class="text-3xl font-semibold">
                <i class="fas fa-clipboard-list text-4xl text-white mr-2"></i>
                <a href="{{ url('/') }}">Tasklee</a>
            </h1>
        <nav class="flex items-center gap-8">
            <div class="flex gap-4">
                <x-nav-link url="/tasks" :active="request()->is('tasks')" icon="fa-bars">All Tasks</x-nav-link>
                <x-nav-link url="/" :active="request()->is('aa')" icon="fa-bars">Your Tasks</x-nav-link>
                <x-nav-link url="/" :active="request()->is('aa')" icon="fa-bars">Verify</x-nav-link>
            </div>
            
            <a class="bg-indigo-500 hover:bg-indigo-600 text-white hover:text-gray-300 px-4 py-2 rounded-md font-semibold inline-flex items-center"
                href="{{ route('tasks.create') }}">
                <i class="fa fa-add mr-2"></i> Create New Task
            </a>
        </nav>
    </div>
</header>
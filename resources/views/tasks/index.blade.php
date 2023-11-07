<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse( $tasks as $task )
                <div class="my-10 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">{{ $task->name }}</h2>
                    <p class="mt-2">{{ $task->description }}</p>
                    <span class="block mt-4 text-sm opacity-70">{{ $task->updated_at ? $task->updated_at->diffForHumans() : $task->created_at?->diffForHumans() }}</span>
                </div>
            @empty
            <p>There are no tasks for you yet</p>
            @endforelse
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>{{ session( 'success' ) }}</x-alert-success>

            <a href="{{ route('tasks.create') }}" class="btn btn-link btn-lg mb-2">+ New Task</a>

            @forelse( $tasks as $task )
                <div class="my-10 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl"><a href="{{ route( 'tasks.show', $task ) }}">{{ $task->name }}</a></h2>
                    <p class="mt-2">{{ Str::limit( $task->description, 200 ) }}</p>
                    <span class="block mt-4 text-sm opacity-70">{{ $task->updated_at ? $task->updated_at->diffForHumans() : $task->created_at?->diffForHumans() }}</span>
                </div>
            @empty
            <p>There are no tasks for you yet</p>
            @endforelse


            {{ $tasks->links() }}
        </div>
    </div>
</x-app-layout>

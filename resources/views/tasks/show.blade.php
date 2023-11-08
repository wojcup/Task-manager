<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$task->trashed() ? __( 'Tasks' ) : __( 'Trash' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>{{ session( 'success' )}}</x-alert-success>

            <div class="flex">
                @if( !$task->trashed() )
                    <p class="opacity-70"><strong>Submitted: </strong> {{ $task->created_at->diffForHumans() }}</p>
                    <p class="opacity-70 ml-8"><strong>Updated: </strong>{{ $task->updated_at->diffForHumans() }}</p>
                    <a href="{{ route( 'tasks.edit', $task ) }}" class="btn btn-link ml-auto">Edit Task</a>
                    <form action="{{ route( 'tasks.destroy', $task ) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm( 'Confirm moving the Task to Trash' );">Move to Trash</button>
                    </form>
                @else
                    <p class="opacity-70"><strong>Deleted: </strong> {{ $task->deleted_at->diffForHumans() }}</p>

                    <form action="{{ route( 'trashed.update', $task ) }}" method="post" class="ml-auto">
                        @method( 'put' )
                        @csrf
                        <button type="submit" class="btn-link">Restore Task</button>
                    </form>

                    <form action="{{ route( 'trashed.destroy', $task ) }}" method="post" class="">
                        @method( 'delete' )
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm( 'This will delete this Task permanently. Are you sure to proceed?' );">Delete Permanently</button>
                    </form>

                @endif
            </div>

            <div class="my-10 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">{{ $task->name }}</h2>
                <p class="mt-6 whitespace-pre-wrap">{{ $task->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

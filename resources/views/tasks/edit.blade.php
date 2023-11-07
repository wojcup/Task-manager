<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-10 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route( 'tasks.update', $task ) }}" method="post">
                    @method( 'put' )

                    @csrf
                    <x-input type="text" name="name" field="name" placeholder="Task name..." class="w-full" autocomplete="off" :value="@old( 'name', $task->name )"></x-input>

                    <x-textarea name="description" field="description" rows="10" class="w-full mt-6" :value="@old( 'description', $task->description )"></x-textarea>

                    <x-button class="mt-4 btn">Save Changes</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Name') }}: {{ $user->username }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="w-1/2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 text-gray-900 dark:text-gray-100 text-2xl font-bold">
                    <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700   dark:border-gray-600 dark:text-white">
                        <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600 text-xl text-bold">{{ __('Roles') }}</li>
                        @foreach ($user->roles as $index => $role)
                            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600 text-lg">{{ $role->name }}</li>
                        @endforeach
                    </ul>
                    <x-primary-button class="mt-4" onclick="location.href='{{ route('users.create') }}'">
                        {{ __('Add Role') }}
                    </x-primary-button>
                </div>
            </div>
            <div class="p-6 text-gray-900 dark:text-gray-100 text-2xl text-bold">
                {{ __("Task List") }}
            </div>
            <a href="{{ route('tasks.create', ['user' => $user->id]) }}">
                <x-primary-button class="mt-4 mb-4">
                    {{ __('Create new task') }}
                </x-primary-button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-white" scope="col">#</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __('Task') }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->tasks as $index => $task)
                    <tr>
                        <th class="text-gray-900 dark:text-white text-center" scope="row">{{ $index }}</th>
                        <td class="text-gray-900 dark:text-white text-center">{{ $task->name }}</td>
                        <td class="text-gray-900 dark:text-white text-center">
                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                <x-primary-button class="mt-4">
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </a>
                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                                <x-primary-button class="mt-4">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                <x-primary-button class="mt-4">
                                    {{ __('Show') }}
                                </x-primary-button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

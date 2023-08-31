<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User List") }}
                </div>
            </div>
            <x-primary-button class="mt-4 mb-4" onclick="location.href='{{ route('users.create') }}'">
                {{ __('Create new user') }}
            </x-primary-button>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-white" scope="col">#</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __("Name") }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __("Username") }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __("Created at") }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __("Action") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <th class="text-gray-900 dark:text-white text-center" scope="row">{{ $index }}</th>
                        <td class="text-gray-900 dark:text-white text-center cursor-pointer">{{ $user->fullname }}</td>
                        <td class="text-gray-900 dark:text-white text-center">{{ $user->username }}</td>
                        <td class="text-gray-900 dark:text-white text-center">{{ formatDateYMD($user->created_at) }}</td>
                        <td class="text-gray-900 dark:text-white text-center">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                <x-primary-button class="mt-4">
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                                <x-primary-button class="mt-4">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}">
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

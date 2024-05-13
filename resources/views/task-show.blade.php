<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}--
            <a href="/task-show">{{ ('Task') }}</a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table>
                        <thead>
                        <tr>
                            <td colspan="4">
                                <a href="/add-task">
                                    Add Task
                                </a>
                            </td>
                        </tr>
                        </thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $i =1;
                        @endphp
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td><a href="/task-edit/{{$task->id}}">Edit</a>|<a href="/task-delete/{{$task->id}}">Delete</a></td>
                        </tr>
                            @php
                                $i = $i+1;
                            @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

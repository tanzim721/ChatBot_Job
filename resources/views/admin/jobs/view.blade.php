<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Career Job') }}
            <div class="float-right">
                <a href="{{ route('admin.job.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Job
                </a>
            </div>
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Job Title
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Company Name
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Job Role
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Salary
                            </th>
                            <th class="px-6 py-3" scope="col">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($jobs as $job)
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                    scope="row">
                                    <a href="{{ route('career-jobs.show', $job->id) }}">
                                        {{ $job->title }}
                                    </a>
                                    <p class="text-xs opacity-50 dark:opacity-30">
                                        {{ $job->created_at }}</p>
                                </th>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ $job->company_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $job->role }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="me-2 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">{{ $job->salary }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                        href="">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>empty</td>
                                <td>empty</td>
                                <td>empty</td>
                                <td>empty</td>
                                <td>empty</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

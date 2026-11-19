
<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                {{-- Alert Success --}}
                @if (session('success'))
                    <div id="alert-success"
                        class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200"
                        role="alert">

                        <svg class="w-5 h-5 mr-3 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19Zm4.2 6.7-5 5a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.4l1.3 1.3 4.3-4.3a1 1 0 0 1 1.4 1.4Z" />
                        </svg>

                        <div class="font-medium">
                            {{ session('success') }}
                        </div>

                        <button type="button" onclick="document.getElementById('alert-success').remove()"
                            class="ms-auto p-1.5 text-green-500 rounded-lg hover:bg-green-200">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 12 12M13 1 1 13" />
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Alert Error --}}
                @if (session('error'))
                    <div id="alert-error"
                        class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200"
                        role="alert">

                        <svg class="w-5 h-5 mr-3 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm1 15H9v-2h2v2Zm0-4H9V5h2v6Z" />
                        </svg>

                        <div class="font-medium">
                            {{ session('error') }}
                        </div>

                        <button type="button" onclick="document.getElementById('alert-error').remove()"
                            class="ms-auto p-1.5 text-red-500 rounded-lg hover:bg-red-200">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 12 12M13 1 1 13" />
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Toolbar --}}
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    {{-- Search --}}
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('admin.classroom.index') }}" method="GET" class="flex items-center">

                            <label for="simple-search" class="sr-only">
                                Search
                            </label>

                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>

                                <input type="text" name="search" id="simple-search"
                                    value="{{ request('search') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Search classroom">
                            </div>
                        </form>
                    </div>

                    {{-- Buttons --}}
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                        {{-- Add Classroom --}}
                        <button type="button" data-modal-target="createClassroomModal"
                            data-modal-toggle="createClassroomModal"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 border border-primary-800 shadow-sm font-medium rounded-lg text-sm px-4 py-2">

                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>

                            Add Classroom
                        </button>

                        {{-- Modal Create Classroom --}}
                        @include('admin.classroom.create')

                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Classroom Name</th>
                                <th scope="col" class="px-4 py-3">Major</th>
                                <th scope="col" class="px-4 py-3">Students</th>
                                <th scope="col" class="px-4 py-3">Jumlah Siswa</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- Looping Data Classroom --}}
                            @forelse ($classrooms as $classroom)
                                <tr class="border-b dark:border-gray-700">

                                    {{-- ID --}}
                                    <td class="px-4 py-3">
                                        {{ $classroom->id }}
                                    </td>

                                    {{-- Classroom Name --}}
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $classroom->name }}
                                    </th>

                                    {{-- Major --}}
                                    <td class="px-4 py-3">
                                        {{ $classroom->major }}
                                    </td>

                                    {{-- Students --}}
                                    <td class="px-4 py-3">
                                        @forelse ($classroom->students as $student)
                                            <span class="block">
                                                {{ $student->name }}
                                            </span>
                                        @empty
                                            <span class="text-gray-400">
                                                Belum ada siswa
                                            </span>
                                        @endforelse
                                    </td>

                                    {{-- Jumlah Siswa --}}
                                    <td class="px-4 py-3">
                                        {{ $classroom->students_count }} Siswa
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-4 py-3 flex items-center justify-end">

                                        <button id="dropdown-button-{{ $classroom->id }}"
                                            data-dropdown-toggle="dropdown-{{ $classroom->id }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">

                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <div id="dropdown-{{ $classroom->id }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">

                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">

                                                {{-- Show --}}
                                                <li>
                                                    <a href="{{ route('admin.classroom.show', $classroom->id) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Show
                                                    </a>
                                                </li>

                                                {{-- Edit --}}
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="editClassroomModal-{{ $classroom->id }}"
                                                        data-modal-toggle="editClassroomModal-{{ $classroom->id }}"
                                                        class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Edit
                                                    </button>
                                                </li>

                                            </ul>

                                            {{-- Delete --}}
                                            <div class="py-1">
                                                <form action="{{ route('admin.classroom.destroy', $classroom->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus classroom ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="block w-full text-left py-2 px-4 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-400">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>

                                </tr>

                                {{-- Modal Edit Classroom --}}
                                @include('admin.classroom.edit')

                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center">
                                        Belum ada data classroom.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="p-4">
                    {{ $classrooms->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </section>
</x-admin.layout>

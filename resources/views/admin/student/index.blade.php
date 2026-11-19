<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
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

                <!-- Toolbar -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <!-- Search -->
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('admin.student.index') }}" method="GET" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>

                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>

                                <input type="text" name="search" id="simple-search" value="{{ request('search') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Search student">
                            </div>
                        </form>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <!-- Add Student -->
                        <button type="button" data-modal-target="createStudentModal"
                            data-modal-toggle="createStudentModal"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 border border-primary-800 shadow-sm font-medium rounded-lg text-sm px-4 py-2">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Student
                        </button>

                        {{-- Modal Create Student --}}
                        @include('admin.student.create')

                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <!-- Actions -->
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>

                            <!-- Filter -->
                            <div class="flex items-center gap-2">
                                <select name="classroom_id"
                                    class="px-3 py-2.5 text-sm text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">

                                    <option value="">
                                        --Semua Kelas--
                                    </option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}"
                                            {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                            {{ $classroom->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose Class</h6>
                                <ul class="space-y-2 text-sm">
                                    <li class="flex items-center">
                                        <input id="pplg3" type="checkbox"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="pplg3"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">11 PPLG
                                            3</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="pplg2" type="checkbox"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="pplg2"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">11 PPLG
                                            2</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Student Name</th>
                                <th scope="col" class="px-4 py-3">NIS</th>
                                <th scope="col" class="px-4 py-3">Class</th>
                                <th scope="col" class="px-4 py-3">Major</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Looping Data Array -->
                            @foreach ($students as $student)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student['name'] }}
                                    </th>
                                    <td class="px-4 py-3">
                                        {{ $student['nis'] }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $student->classroom->name }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $student->classroom->major }}
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end">

                                        <!-- ID Dropdown dinamis menggunakan NIS agar unik -->
                                        <button id="dropdown-button-{{ $student['nis'] }}"
                                            data-dropdown-toggle="dropdown-{{ $student['nis'] }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <div id="dropdown-{{ $student['nis'] }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="editStudentModal-{{ $student->id }}"
                                                        data-modal-toggle="editStudentModal-{{ $student->id }}"
                                                        class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Edit
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <li>
                                                    <form action="{{ route('admin.student.destroy', $student->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="block w-full text-left py-2 px-4 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-400">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- Modal Edit Student --}}
                @foreach ($students as $student)
                    @include('admin.student.edit', [
                        'student' => $student,
                        'classrooms' => $classrooms,
                    ])
                @endforeach

                <!-- Pagination -->
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing <span
                            class="font-semibold text-gray-900 dark:text-white">1-{{ count($students) }}</span> of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ count($students) }}</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 12 12M13 1 1 13" />
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 12 12M13 1 1 13" />
                    </svg>
                </button>
            </div>
        @endif
    </section>
</x-admin.layout>

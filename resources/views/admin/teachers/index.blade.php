<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                @if (session('success'))
                    <div class="m-4 p-4 text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg" role="status">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="m-4 p-4 text-sm text-red-800 bg-red-50 border border-red-200 rounded-lg" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <form action="{{ route('admin.teachers.index') }}" method="GET" class="w-full md:w-1/2 flex flex-col sm:flex-row items-center gap-2">
                        <label for="teacher-search" class="sr-only">Cari guru</label>
                        <input
                            type="search"
                            name="search"
                            id="teacher-search"
                            value="{{ request('search') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Cari nama atau NIY guru"
                        >
                        <label for="subject-filter" class="sr-only">Filter mata pelajaran</label>
                        <select
                            name="subjects_id"
                            id="subject-filter"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full sm:w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                            <option value="">Semua mata pelajaran</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ request('subjects_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">Terapkan</button>
                    </form>

                    <button
                        type="button"
                        data-modal-target="createTeacherModal"
                        data-modal-toggle="createTeacherModal"
                        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 border border-primary-800 shadow-sm font-medium rounded-lg text-sm px-4 py-2"
                    >
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Guru
                    </button>
                    @include('admin.teachers.create')
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Guru</th>
                                <th scope="col" class="px-4 py-3">NIY</th>
                                <th scope="col" class="px-4 py-3">Mata Pelajaran</th>
                                <th scope="col" class="px-4 py-3">Tanggal Mulai Mengajar</th>
                                <th scope="col" class="px-4 py-3"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $teacher->name }}
                                    </th>
                                    <td class="px-4 py-3">{{ $teacher->niy }}</td>
                                    <td class="px-4 py-3">{{ $teacher->subjects?->name ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $teacher->start_date }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end">
                                            <button id="dropdown-button-{{ $teacher->id }}"
                                                data-dropdown-toggle="dropdown-{{ $teacher->id }}"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="dropdown-{{ $teacher->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                    <li><a href="{{ route('admin.teachers.show', $teacher->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Detail</a></li>
                                                    <li><button type="button" data-modal-target="editTeacherModal-{{ $teacher->id }}" data-modal-toggle="editTeacherModal-{{ $teacher->id }}" class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button></li>
                                                    <li>
                                                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="block w-full text-left py-2 px-4 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-400">Hapus</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.teachers.edit', ['teacher' => $teacher, 'subjects' => $subjects])
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center">Belum ada data guru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $teachers->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>

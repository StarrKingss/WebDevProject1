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
                    <form action="{{ route('admin.subjects.index') }}" method="GET" class="w-full md:w-1/2 flex items-center gap-2">
                        <label for="subject-search" class="sr-only">Cari mata pelajaran</label>
                        <input
                            type="search"
                            name="search"
                            id="subject-search"
                            value="{{ request('search') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Cari mata pelajaran"
                        >
                        <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">Cari</button>
                    </form>

                    <button
                        type="button"
                        data-modal-target="createSubjectModal"
                        data-modal-toggle="createSubjectModal"
                        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 border border-primary-800 shadow-sm font-medium rounded-lg text-sm px-4 py-2"
                    >
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Mata Pelajaran
                    </button>
                    @include('admin.subjects.create')
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Mata Pelajaran</th>
                                <th scope="col" class="px-4 py-3">Guru</th>
                                <th scope="col" class="px-4 py-3"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $subject->name }}
                                    </th>
                                    <td class="px-4 py-3">
                                        @forelse ($subject->teachers as $teacher)
                                            <span class="block">{{ $teacher->name }}</span>
                                        @empty
                                            <span class="text-gray-400">Belum ada guru</span>
                                        @endforelse
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end">
                                            <button id="dropdown-button-{{ $subject->id }}"
                                                data-dropdown-toggle="dropdown-{{ $subject->id }}"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="dropdown-{{ $subject->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                    <li><a href="{{ route('admin.subjects.show', $subject->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Detail</a></li>
                                                    <li><button type="button" data-modal-target="editSubjectModal-{{ $subject->id }}" data-modal-toggle="editSubjectModal-{{ $subject->id }}" class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button></li>
                                                    <li>
                                                        <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
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
                                @include('admin.subjects.edit', ['subject' => $subject])
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center">Belum ada data mata pelajaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $subjects->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>

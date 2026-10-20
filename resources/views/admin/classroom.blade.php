
<x-admin.layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Classroom
        </h1>

        <p class="text-gray-500 dark:text-gray-400">
            Daftar data classroom yang tersimpan di database.
        </p>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
            <thead class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nama Classroom</th>
                    <th class="px-6 py-3">Jurusan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($classrooms as $classroom)
                    <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
                        <td class="px-6 py-4">
                            {{ $classroom->id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $classroom->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $classroom->major }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center">
                            Belum ada data classroom.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layout>

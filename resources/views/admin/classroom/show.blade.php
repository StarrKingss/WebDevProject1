<x-admin.layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Kelas</h1>
                    <a href="{{ route('admin.classroom.index') }}" class="text-sm font-medium text-primary-700 hover:underline dark:text-primary-500">Kembali ke daftar</a>
                </div>

                <dl class="grid gap-4 p-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Kelas</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $classroom->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jurusan</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $classroom->major }}</dd>
                    </div>
                </dl>

                <div class="px-4 pb-4">
                    <h2 class="mb-2 text-sm font-semibold text-gray-900 dark:text-white">Daftar Siswa</h2>
                    @forelse ($classroom->students as $student)
                        <p class="border-b border-gray-100 py-2 text-sm text-gray-700 dark:border-gray-700 dark:text-gray-300">{{ $student->name }}</p>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada siswa di kelas ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>
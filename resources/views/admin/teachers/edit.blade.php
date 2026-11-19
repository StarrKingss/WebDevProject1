{{-- Modal Edit Teacher --}}
<div
    id="editTeacherModal-{{ $teacher->id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full overflow-y-auto overflow-x-hidden"
>
    <div class="relative w-full max-w-lg p-4">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Guru
                </h3>

                <button
                    type="button"
                    data-modal-hide="editTeacherModal-{{ $teacher->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                >
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <form
                action="{{ route('admin.teachers.update', $teacher->id) }}"
                method="POST"
                class="p-4"
            >
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label
                            for="name-{{ $teacher->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            Nama Guru
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name-{{ $teacher->id }}"
                            value="{{ old('name', $teacher->name) }}"
                            required
                            maxlength="255"
                            placeholder="Masukkan nama guru"
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label
                            for="niy-{{ $teacher->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            NIY
                        </label>
                        <input
                            type="number"
                            name="niy"
                            id="niy-{{ $teacher->id }}"
                            value="{{ old('niy', $teacher->niy) }}"
                            required
                            min="0"
                            placeholder="Masukkan NIY"
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                        @error('niy')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label
                            for="subjects_id-{{ $teacher->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            Mata Pelajaran
                        </label>
                        <select
                            name="subjects_id"
                            id="subjects_id-{{ $teacher->id }}"
                            required
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            @foreach ($subjects as $subject)
                                <option
                                    value="{{ $subject->id }}"
                                    {{ old('subjects_id', $teacher->subjects_id) == $subject->id ? 'selected' : '' }}
                                >
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subjects_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label
                            for="start_date-{{ $teacher->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            Tanggal Mulai Mengajar
                        </label>
                        <input
                            type="date"
                            name="start_date"
                            id="start_date-{{ $teacher->id }}"
                            value="{{ old('start_date', $teacher->start_date) }}"
                            required
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                        @error('start_date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button
                        type="button"
                        data-modal-hide="editTeacherModal-{{ $teacher->id }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

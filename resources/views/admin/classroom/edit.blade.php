
{{-- Modal Edit Classroom --}}
<div
    id="editClassroomModal-{{ $classroom->id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full overflow-y-auto overflow-x-hidden"
>
    <div class="relative w-full max-w-lg p-4">

        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">

            {{-- Modal Header --}}
            <div class="flex items-center justify-between p-4 border-b rounded-t">

                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Classroom
                </h3>

                <button
                    type="button"
                    data-modal-hide="editClassroomModal-{{ $classroom->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                >
                    <svg
                        class="w-3 h-3"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
                    </svg>
                </button>

            </div>

            {{-- Modal Body --}}
            <form
                action="{{ route('admin.classroom.update', $classroom->id) }}"
                method="POST"
                class="p-4"
            >
                @csrf
                @method('PUT')

                <div class="space-y-4">

                    {{-- Name --}}
                    <div>
                        <label
                            for="name-{{ $classroom->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            Nama Classroom
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name-{{ $classroom->id }}"
                            value="{{ $classroom->name }}"
                            required
                            placeholder="Masukkan nama classroom"
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    {{-- Major --}}
                    <div>
                        <label
                            for="major-{{ $classroom->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900"
                        >
                            Jurusan
                        </label>

                        <input
                            type="text"
                            name="major"
                            id="major-{{ $classroom->id }}"
                            value="{{ $classroom->major }}"
                            required
                            placeholder="Masukkan nama jurusan"
                            class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                </div>

                {{-- Modal Footer --}}
                <div class="flex justify-end gap-2 mt-6">

                    <button
                        type="button"
                        data-modal-hide="editClassroomModal-{{ $classroom->id }}"
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

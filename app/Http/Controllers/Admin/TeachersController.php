<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /** Menampilkan daftar guru. */
    public function index(Request $request)
    {
        $teachers = Teachers::with('subjects')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('niy', 'like', "%{$search}%");
                });
            })
            ->when($request->subjects_id, function ($query, $subjectId) {
                $query->where('subjects_id', $subjectId);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $subjects = Subjects::query()->orderBy('name')->get();

        return view('admin.teachers.index', compact('teachers', 'subjects'));
    }

    /** Menampilkan form tambah guru. */
    public function create()
    {
        $subjects = Subjects::query()->orderBy('name')->get();

        return view('admin.teachers.create', compact('subjects'));
    }

    /** Menyimpan data guru baru. */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|integer|min:0|unique:teachers,niy',
            'subjects_id' => 'required|exists:subjects,id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'niy.required' => 'NIY wajib diisi.',
            'niy.unique' => 'NIY sudah digunakan.',
            'subjects_id.required' => 'Mata pelajaran wajib dipilih.',
            'subjects_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'start_date.required' => 'Tanggal mulai mengajar wajib diisi.',
        ]);

        Teachers::create($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /** Menampilkan detail guru. */
    public function show(Teachers $teacher)
    {
        $teacher->load('subjects');

        return view('admin.teachers.show', compact('teacher'));
    }

    /** Menampilkan form edit guru. */
    public function edit(Teachers $teacher)
    {
        $subjects = Subjects::query()->orderBy('name')->get();

        return view('admin.teachers.edit', compact('teacher', 'subjects'));
    }

    /** Memperbarui data guru. */
    public function update(Request $request, Teachers $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|integer|min:0|unique:teachers,niy,'.$teacher->id,
            'subjects_id' => 'required|exists:subjects,id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'niy.required' => 'NIY wajib diisi.',
            'niy.unique' => 'NIY sudah digunakan.',
            'subjects_id.required' => 'Mata pelajaran wajib dipilih.',
            'subjects_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'start_date.required' => 'Tanggal mulai mengajar wajib diisi.',
        ]);

        $teacher->update($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /** Menghapus data guru. */
    public function destroy(Teachers $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}

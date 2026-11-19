<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $classrooms = Classroom::with('students')
            ->withCount('students')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('major', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('admin.classroom.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kelas wajib diisi.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function show(Classroom $classroom)
    {
        $classroom->load('students');

        return view('admin.classroom.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kelas wajib diisi.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        $classroom->update($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Classroom $classroom)
    {
        // Cek apakah kelas masih memiliki siswa.
        if ($classroom->students()->exists()) {
            return redirect()
                ->route('admin.classroom.index')
                ->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        $classroom->delete();

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}

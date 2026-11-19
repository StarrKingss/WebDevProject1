<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index(Request $request)
    {
        $subjects = Subjects::with('teachers')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
        ]);

        Subjects::create($validated);

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }


    public function show(Subjects $subject)
    {
        $subject->load('teachers');

        return view('admin.subjects.show', compact('subject'));
    }


    public function edit(Subjects $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }


    public function update(Request $request, Subjects $subject)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
        ]);

        $subject->update($validated);

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy(Subjects $subject)
    {
        if ($subject->teachers()->exists()) {
            return redirect()
                ->route('admin.subjects.index')
                ->with('error', 'Mata pelajaran tidak dapat dihapus karena masih digunakan guru.');
        }

        $subject->delete();

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}

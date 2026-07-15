<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::latest()->paginate(10);

        return view('admin.materials.index', [
            'title' => 'Materi',
            'materials' => $materials,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:materials,slug'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        Material::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Materi berhasil ditambahkan.']);
        }

        return redirect()->route('materials.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:materials,slug,' . $material->id],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $material->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Materi berhasil diperbarui.']);
        }

        return redirect()->route('materials.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Materi berhasil dihapus.']);
        }

        return redirect()->route('materials.index')->with('success', 'Materi berhasil dihapus.');
    }
}

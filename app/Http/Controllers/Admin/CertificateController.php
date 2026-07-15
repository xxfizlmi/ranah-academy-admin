<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->paginate(10);

        return view('admin.certificates.index', [
            'title' => 'Sertifikat',
            'certificates' => $certificates,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:certificates,slug'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        Certificate::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Sertifikat berhasil ditambahkan.']);
        }

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:certificates,slug,' . $certificate->id],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $certificate->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Sertifikat berhasil diperbarui.']);
        }

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Sertifikat berhasil dihapus.']);
        }

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}

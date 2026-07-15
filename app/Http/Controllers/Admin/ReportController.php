<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(10);

        return view('admin.reports.index', [
            'title' => 'Laporan',
            'reports' => $reports,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:reports,slug'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        Report::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Laporan berhasil ditambahkan.']);
        }

        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:reports,slug,' . $report->id],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $report->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Laporan berhasil diperbarui.']);
        }

        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Laporan berhasil dihapus.']);
        }

        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}

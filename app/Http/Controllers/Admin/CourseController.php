<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return view('admin.courses.index', [
            'title' => 'Kursus',
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', [
            'title' => 'Tambah Kursus',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:courses,slug'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:draft,published'],
        ]);

        Course::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Kursus berhasil ditambahkan.']);
        }

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', [
            'title' => 'Edit Kursus',
            'course' => $course,
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:courses,slug,' . $course->id],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $course->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Kursus berhasil diperbarui.']);
        }

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Kursus berhasil dihapus.']);
        }

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
    }
}

<x-app-layout :title="$title">

    <div class="space-y-6">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Edit Kursus</h1>
                <p class="mt-1 text-slate-500">Perbarui informasi kursus yang sudah ada.</p>
            </div>
        </div>

        @include('admin.courses._form', [
            'course' => $course,
            'action' => route('courses.update', $course),
            'method' => 'PUT',
            'button' => 'Perbarui Kursus',
        ])

    </div>

</x-app-layout>

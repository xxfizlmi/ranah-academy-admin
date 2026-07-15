<x-app-layout :title="$title">

    <div class="space-y-6">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Tambah Kursus</h1>
                <p class="mt-1 text-slate-500">Buat kursus baru untuk ditambahkan ke portal admin.</p>
            </div>
        </div>

        @include('admin.courses._form', [
            'action' => route('courses.store'),
            'button' => 'Simpan Kursus',
        ])

    </div>

</x-app-layout>

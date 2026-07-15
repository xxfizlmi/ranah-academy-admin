@props([
    'course' => null,
    'action',
    'method' => 'POST',
    'button',
])

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
        <h3 class="font-semibold text-red-700">
            Terjadi kesalahan
        </h3>

        <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST"
    class="mx-auto max-w-4xl rounded-2xl border border-slate-200 bg-white shadow-sm" data-swal-confirm="true">
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    {{-- Header --}}
    <div class="border-b border-slate-200 px-8 py-6">

        <h2 class="text-2xl font-bold text-slate-800">
            Informasi Kursus
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Lengkapi informasi dasar mengenai kursus.
        </p>

    </div>

    {{-- Body --}}
    <div class="space-y-6 p-8">

        {{-- Judul --}}
        <div>

            <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">
                Judul Kursus
            </label>

            <input id="title" name="title" type="text" value="{{ old('title', $course->title ?? '') }}"
                placeholder="Contoh: Laravel 12 Fundamental"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                required>

        </div>

        {{-- Slug --}}
        <div>

            <label for="slug" class="mb-2 block text-sm font-semibold text-slate-700">
                Slug
            </label>

            <input id="slug" name="slug" type="text" value="{{ old('slug', $course->slug ?? '') }}"
                placeholder="laravel-12-fundamental"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                required>

            <p class="mt-2 text-xs text-slate-500">
                Digunakan sebagai URL kursus.
            </p>

        </div>

        {{-- Harga & Status --}}
        <div class="grid gap-6 md:grid-cols-2">

            <div>

                <label for="price" class="mb-2 block text-sm font-semibold text-slate-700">
                    Harga
                </label>

                <input id="price" name="price" type="number" min="0" step="0.01"
                    value="{{ old('price', $course->price ?? 0) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

            </div>

            <div>

                <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">
                    Status
                </label>

                <select id="status" name="status"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                    <option value="draft" @selected(old('status', $course->status ?? 'draft') == 'draft')>
                        Draft
                    </option>

                    <option value="published" @selected(old('status', $course->status ?? '') == 'published')>
                        Published
                    </option>

                </select>

            </div>

        </div>

        {{-- Deskripsi --}}
        <div>

            <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">
                Deskripsi
            </label>

            <textarea id="description" name="description" rows="8" placeholder="Masukkan deskripsi kursus..."
                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">{{ old('description', $course->description ?? '') }}</textarea>

        </div>

    </div>

    {{-- Footer --}}
    <div class="flex items-center justify-between border-t border-slate-200 bg-slate-50 px-8 py-5">

        <p class="text-sm text-slate-500">
            Pastikan semua data sudah benar sebelum disimpan.
        </p>

        <div class="flex gap-3">

            <a href="{{ route('courses.index') }}"
                class="rounded-lg border border-slate-300 px-5 py-2.5 font-medium text-slate-700 hover:bg-slate-100">
                Batal
            </a>

            <button type="submit"
                class="rounded-lg bg-indigo-600 px-5 py-2.5 font-medium text-white hover:bg-indigo-700">
                {{ $button }}
            </button>

        </div>

    </div>

</form>

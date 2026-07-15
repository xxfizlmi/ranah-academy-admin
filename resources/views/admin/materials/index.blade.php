<x-app-layout :title="$title">

    <div class="space-y-6">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Materi</h1>
                <p class="mt-1 text-slate-500">Kelola materi pembelajaran untuk kursus Anda.</p>
            </div>
            <button type="button" onclick="openAddMaterialModal(this)"
                data-material-store-url="{{ route('materials.store') }}"
                class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                + Tambah Materi
            </button>
        </div>

        <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-white shadow">
            <table class="min-w-full divide-y divide-slate-200 text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Judul</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Slug</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($materials as $material)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $material->title }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $material->slug }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $material->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                    {{ ucfirst($material->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200"
                                        onclick="openEditMaterialModal(this)"
                                        data-material-update-url="{{ route('materials.update', $material) }}"
                                        data-material-title="{{ $material->title }}"
                                        data-material-slug="{{ $material->slug }}"
                                        data-material-status="{{ $material->status }}"
                                        data-material-description="{{ $material->description }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('materials.destroy', $material) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-200"
                                            onclick="confirmDelete(event, this.closest('form'), 'Hapus materi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                Belum ada materi tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-right">
            {{ $materials->links() }}
        </div>

    </div>

</x-app-layout>

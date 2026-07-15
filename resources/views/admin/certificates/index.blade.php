<x-app-layout :title="$title">

    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Sertifikat</h1>
                <p class="mt-1 text-slate-500">Kelola sertifikat yang diterbitkan untuk peserta.</p>
            </div>
            <button type="button" onclick="openAddCertificateModal(this)"
                data-certificate-store-url="{{ route('certificates.store') }}"
                class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                + Tambah Sertifikat
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
                    @forelse ($certificates as $certificate)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $certificate->title }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $certificate->slug }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $certificate->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                    {{ ucfirst($certificate->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200"
                                        onclick="openEditCertificateModal(this)"
                                        data-certificate-update-url="{{ route('certificates.update', $certificate) }}"
                                        data-certificate-title="{{ $certificate->title }}"
                                        data-certificate-slug="{{ $certificate->slug }}"
                                        data-certificate-status="{{ $certificate->status }}"
                                        data-certificate-description="{{ $certificate->description }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('certificates.destroy', $certificate) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-200"
                                            onclick="confirmDelete(event, this.closest('form'), 'Hapus sertifikat ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                Belum ada sertifikat tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-right">
            {{ $certificates->links() }}
        </div>
    </div>

</x-app-layout>

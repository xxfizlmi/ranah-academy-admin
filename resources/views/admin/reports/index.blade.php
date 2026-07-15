<x-app-layout :title="$title">

    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Laporan</h1>
                <p class="mt-1 text-slate-500">Lihat dan unduh laporan aktivitas admin dan pengguna.</p>
            </div>
            <button type="button" onclick="openAddReportModal(this)"
                data-report-store-url="{{ route('reports.store') }}"
                class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                + Tambah Laporan
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
                    @forelse ($reports as $report)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $report->title }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $report->slug }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $report->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200"
                                        onclick="openEditReportModal(this)"
                                        data-report-update-url="{{ route('reports.update', $report) }}"
                                        data-report-title="{{ $report->title }}"
                                        data-report-slug="{{ $report->slug }}"
                                        data-report-status="{{ $report->status }}"
                                        data-report-description="{{ $report->description }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('reports.destroy', $report) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-200"
                                            onclick="confirmDelete(event, this.closest('form'), 'Hapus laporan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                Belum ada laporan tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-right">
            {{ $reports->links() }}
        </div>
    </div>

</x-app-layout>

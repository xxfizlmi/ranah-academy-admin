<x-app-layout :title="$title">

    <div class="space-y-6">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Pengguna
                </h1>
                <p class="mt-1 text-slate-500">
                    Kelola data pengguna Ranah Academy.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="#"
                    class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                    + Tambah Pengguna
                </a>
            </div>
        </div>

        <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-white shadow">
            <table class="min-w-full divide-y divide-slate-200 text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Nama</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Email</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Role</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $user->role ?? 'Pengguna' }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <a href="#" class="text-indigo-600 hover:text-indigo-700">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                                Belum ada pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</x-app-layout>

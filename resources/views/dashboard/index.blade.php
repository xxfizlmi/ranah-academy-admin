<x-app-layout :title="$title">

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Dashboard
                </h1>

                <p class="mt-1 text-slate-500">
                    Selamat datang di Ranah Academy Admin.
                </p>
            </div>

            <div class="text-right">
                <p class="text-sm text-slate-500">
                    {{ now()->format('d F Y') }}
                </p>
            </div>

        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">

                <p class="text-sm text-slate-500">
                    Total Siswa
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    1.250
                </h2>

                <p class="mt-2 text-sm text-green-600">
                    +25 minggu ini
                </p>

            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">

                <p class="text-sm text-slate-500">
                    Total Instruktur
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    18
                </h2>

                <p class="mt-2 text-sm text-green-600">
                    +2 bulan ini
                </p>

            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">

                <p class="text-sm text-slate-500">
                    Total Kursus
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    42
                </h2>

                <p class="mt-2 text-sm text-green-600">
                    +4 kursus baru
                </p>

            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">

                <p class="text-sm text-slate-500">
                    Sertifikat Terbit
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    860
                </h2>

                <p class="mt-2 text-sm text-green-600">
                    +50 minggu ini
                </p>

            </div>

        </div>

        {{-- Aktivitas & Kursus --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Aktivitas Terbaru --}}
            <div class="rounded-xl border border-slate-200 bg-white shadow">

                <div class="border-b border-slate-200 px-6 py-4">

                    <h2 class="font-semibold text-slate-800">
                        Aktivitas Terbaru
                    </h2>

                </div>

                <div class="divide-y divide-slate-200">

                    <div class="px-6 py-4">
                        Ahmad mendaftar kursus Laravel Dasar.
                    </div>

                    <div class="px-6 py-4">
                        Budi menyelesaikan React Fundamental.
                    </div>

                    <div class="px-6 py-4">
                        Siti mendapatkan sertifikat.
                    </div>

                    <div class="px-6 py-4">
                        Admin menambahkan kursus baru.
                    </div>

                </div>

            </div>

            {{-- Kursus Terbaru --}}
            <div class="rounded-xl border border-slate-200 bg-white shadow">

                <div class="border-b border-slate-200 px-6 py-4">

                    <h2 class="font-semibold text-slate-800">
                        Kursus Terbaru
                    </h2>

                </div>

                <div class="divide-y divide-slate-200">

                    <div class="px-6 py-4">
                        Laravel 12 Fundamental
                    </div>

                    <div class="px-6 py-4">
                        React JS Fundamental
                    </div>

                    <div class="px-6 py-4">
                        Tailwind CSS Mastery
                    </div>

                    <div class="px-6 py-4">
                        UI/UX Design
                    </div>

                </div>

            </div>

        </div>

        {{-- Pengguna Terbaru --}}
        <div class="rounded-xl border border-slate-200 bg-white shadow">

            <div class="border-b border-slate-200 px-6 py-4">

                <h2 class="font-semibold text-slate-800">
                    Pengguna Terbaru
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                                Nama
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                                Email
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                                Role
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        <tr>

                            <td class="px-6 py-4">
                                Ahmad
                            </td>

                            <td class="px-6 py-4">
                                ahmad@mail.com
                            </td>

                            <td class="px-6 py-4">
                                Siswa
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-md bg-green-100 px-3 py-1 text-sm text-green-700">
                                    Aktif
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <td class="px-6 py-4">
                                Budi
                            </td>

                            <td class="px-6 py-4">
                                budi@mail.com
                            </td>

                            <td class="px-6 py-4">
                                Instruktur
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-md bg-green-100 px-3 py-1 text-sm text-green-700">
                                    Aktif
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <td class="px-6 py-4">
                                Siti
                            </td>

                            <td class="px-6 py-4">
                                siti@mail.com
                            </td>

                            <td class="px-6 py-4">
                                Admin
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-md bg-green-100 px-3 py-1 text-sm text-green-700">
                                    Aktif
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>

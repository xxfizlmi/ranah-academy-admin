<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-72 overflow-hidden border-r border-slate-200 bg-white shadow-xl transition-all duration-500 ease-in-out -translate-x-full md:translate-x-0 md:static md:shadow-none">
    <div class="sidebar-inner flex h-full flex-col">
        <div class="flex items-center justify-between border-b border-slate-200 p-6">
            <div>
                <h1 class="text-2xl font-bold text-indigo-600">
                    Ranah Academy
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Administrator Panel
                </p>
            </div>
            <button type="button" class="rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 md:hidden"
                onclick="toggleSidebar(false)" aria-label="Close sidebar">
                ✕
            </button>
        </div>

        <nav class="p-4 flex-1 overflow-y-auto">

        <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
            Menu
        </p>

        <ul class="space-y-2">

            <li>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 transition {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}"
                    aria-current="{{ request()->routeIs('dashboard') ? 'page' : '' }}">

                    📊

                    <span>Dashboard</span>

                </a>

            </li>

            <li>

                <a href="{{ route('users.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 transition {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}"
                    aria-current="{{ request()->routeIs('users.*') ? 'page' : '' }}">

                    👤

                    <span>Pengguna</span>

                </a>

            </li>

            <li>

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-700 transition hover:bg-slate-100">

                    📚

                    <span>Kursus</span>

                </a>

            </li>

            <li>

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-700 transition hover:bg-slate-100">

                    📝

                    <span>Materi</span>

                </a>

            </li>

            <li>

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-700 transition hover:bg-slate-100">

                    🎓

                    <span>Sertifikat</span>

                </a>

            </li>

            <li>

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-700 transition hover:bg-slate-100">

                    📈

                    <span>Laporan</span>

                </a>

            </li>

            <li>

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-700 transition hover:bg-slate-100">

                    ⚙️

                    <span>Pengaturan</span>

                </a>

            </li>

        </ul>

    </nav>
    </div>
</aside>

<x-app-layout :title="$title">

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Pengaturan</h1>
                <p class="mt-1 text-slate-500">Atur konfigurasi dasar untuk aplikasi admin.</p>
            </div>
        </div>

        <form action="{{ route('settings.update') }}" method="POST" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 lg:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Nama Situs</label>
                    <input name="site_name" value="{{ old('site_name', $settings->site_name) }}" type="text" placeholder="Ranah Academy"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Email Situs</label>
                    <input name="site_email" value="{{ old('site_email', $settings->site_email) }}" type="email" placeholder="admin@ranah.id"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Telepon Support</label>
                    <input name="support_phone" value="{{ old('support_phone', $settings->support_phone) }}" type="text" placeholder="+62 812 3456 7890"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Zona Waktu</label>
                    <input name="timezone" value="{{ old('timezone', $settings->timezone ?? 'Asia/Jakarta') }}" type="text" placeholder="Asia/Jakarta"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Bahasa Default</label>
                    <input name="default_language" value="{{ old('default_language', $settings->default_language ?? 'id') }}" type="text" placeholder="id"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
                </div>
                <div class="lg:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-slate-700">Alamat</label>
                    <textarea name="address" rows="4"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('address', $settings->address) }}</textarea>
                </div>
            </div>

            <div class="pt-4 text-right">
                <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>

</x-app-layout>

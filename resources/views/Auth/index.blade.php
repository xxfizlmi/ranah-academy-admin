<x-guest-layout :title="$title">

    <div class="min-h-screen bg-slate-100 flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

                <div class="px-8 pt-8 pb-6 text-center">

                    {{-- Logo --}}
                    <div
                        class="w-16 h-16 mx-auto rounded-2xl bg-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        R
                    </div>

                    <h1 class="mt-5 text-3xl font-bold text-slate-800">
                        Ranah Academy
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Administrator Panel
                    </p>

                </div>

                <div class="px-8 pb-8">

                    <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">

                        @csrf

                        <div>
                            <x-label for="email">
                                Email
                            </x-label>

                            <x-input id="email" name="email" type="email" placeholder="you@domain.com"
                                autocomplete="email" required autofocus value="{{ old('email') }}" />

                            @error('email')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <x-label for="password">
                                Password
                            </x-label>

                            <x-input id="password" name="password" type="password" placeholder="Masukkan password"
                                autocomplete="current-password" required />

                            @error('password')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">

                            <label class="flex items-center gap-2 text-sm text-slate-600">

                                <input type="checkbox" name="remember"
                                    class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">

                                Ingat saya

                            </label>

                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                                Lupa password?
                            </a>

                        </div>

                        <x-button type="submit" class="w-full">
                            Masuk
                        </x-button>

                    </form>

                </div>

            </div>

            <div class="mt-6 text-center text-sm text-slate-500">
                © {{ date('Y') }} Ranah Academy Admin
                <br>
                Version 1.0.0
            </div>

        </div>

    </div>

</x-guest-layout>

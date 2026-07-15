@props([
    'type' => 'text',
    'name' => '',
    'id' => null,
    'placeholder' => '',
])

<div class="relative">

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' =>
                'w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none',
        ]) }}>

    @if ($type === 'password')
        <button type="button" onclick="togglePassword('{{ $id ?? $name }}', this)"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
            👁️
        </button>
    @endif

</div>

@props([
    'type' => 'text',
    'name' => '',
    'id' => null,
    'placeholder' => '',
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' =>
            'mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition',
    ]) }}>

@props([
    'type' => 'submit',
])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'w-full rounded-lg bg-indigo-600 px-4 py-3 font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500',
    ]) }}>
    {{ $slot }}
</button>

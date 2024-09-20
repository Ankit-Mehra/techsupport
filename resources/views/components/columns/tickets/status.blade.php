@props([
    'value'
])

<div class="flex">
    <div @class([
        'text-white rounded-xl px-3 py-2 uppercase font-bold text-xs',
        'bg-red-500' => $value === 'Pending',
        'bg-green-500' => $value === 'Open',
        'bg-gray-500' => $value === 'Closed',
])>
        {{ $value }}
    </div>
</div>

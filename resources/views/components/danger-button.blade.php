<button {{ $attributes->merge(['class' => 'bg-danger text-white font-bold py-2 px-4 rounded max-w-xs']) }}>
    {{ $slot }}
</button>
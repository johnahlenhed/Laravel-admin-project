<button {{ $attributes->merge(['class' => 'bg-danger text-white font-bold py-2 px-4 rounded text-center cursor-pointer']) }}>
    {{ $slot }}
</button>
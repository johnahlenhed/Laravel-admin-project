<button {{ $attributes->merge(['class' => 'bg-primary text-white font-bold py-2 px-4 rounded text-center cursor-pointer']) }}>
    {{ $slot }}
</button>
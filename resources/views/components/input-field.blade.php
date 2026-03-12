<input {{ $attributes->merge(['class' => 'border-2 border-primary/40 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent']) }}>
    {{ $slot }}
</input>
<input {{ $attributes->merge(['class' => 'border-2 border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent']) }}>
    {{ $slot }}
</input>
<form {{ $attributes->merge(['class' => 'bg-card flex flex-row justify-center items-center gap-15 p-5 rounded-lg']) }}>
    {{ $slot }}
</form>
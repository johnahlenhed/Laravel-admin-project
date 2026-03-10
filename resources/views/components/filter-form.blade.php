<form {{ $attributes->merge(['class' => 'bg-card flex flex-row justify-center align-center content-between gap-15 p-5 rounded-lg']) }}>
    {{ $slot }}
</form>
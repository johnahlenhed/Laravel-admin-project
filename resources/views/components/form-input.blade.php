<form {{ $attributes->merge(['class' => 'bg-secondary flex flex-row justify-center content-between gap-4']) }}>
    {{ $slot }}
</form>
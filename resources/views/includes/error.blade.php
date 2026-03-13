@if ($errors->any())
    <div class="bg-danger/10 border border-danger rounded-lg p-4 mb-4">
        <ul class="list-disc list-inside text-danger text-sm space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="bg-danger/10 border border-danger rounded-lg p-4 mb-4">
        <p class="text-danger text-sm">{{ session('error') }}</p>
    </div>
@endif

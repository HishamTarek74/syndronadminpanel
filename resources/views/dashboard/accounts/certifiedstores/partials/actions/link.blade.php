@if($certifiedstore)
    @if(method_exists($certifiedstore, 'trashed') && $certifiedstore->trashed())
        <a href="{{ route('dashboard.certifiedstores.trashed.show', $certifiedstore) }}" class="text-decoration-none text-ellipsis">
            {{ $certifiedstore->name }}
        </a>
    @else
        <a href="{{ route('dashboard.certifiedstores.show', $certifiedstore) }}" class="text-decoration-none text-ellipsis">
            {{ $certifiedstore->name }}
        </a>
    @endif
@else
    ---
@endif

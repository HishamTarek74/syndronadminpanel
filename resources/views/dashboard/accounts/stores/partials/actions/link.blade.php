@if($store)
    @if(method_exists($store, 'trashed') && $store->trashed())
        <a href="{{ route('dashboard.stores.trashed.show', $store) }}" class="text-decoration-none text-ellipsis">
            {{ $store->name }}
        </a>
    @else
        <a href="{{ route('dashboard.stores.show', $store) }}" class="text-decoration-none text-ellipsis">
            {{ $store->name }}
        </a>
    @endif
@else
    ---
@endif

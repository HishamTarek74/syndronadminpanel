@if($seller)
    @if(method_exists($seller, 'trashed') && $seller->trashed())
        <a href="{{ route('dashboard.sellers.trashed.show', $seller) }}" class="text-decoration-none text-ellipsis">
            {{ $seller->name }}
        </a>
    @else
        <a href="{{ route('dashboard.sellers.show', $seller) }}" class="text-decoration-none text-ellipsis">
            {{ $seller->name }}
        </a>
    @endif
@else
    ---
@endif

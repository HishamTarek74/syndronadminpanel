@if(method_exists($seller, 'trashed') && $seller->trashed())
    @can('view', $seller)
        <a href="{{ route('dashboard.sellers.trashed.show', $seller) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $seller)
        <a href="{{ route('dashboard.sellers.show', $seller) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif

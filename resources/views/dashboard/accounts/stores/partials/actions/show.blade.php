@if(method_exists($store, 'trashed') && $store->trashed())
    @can('view', $store)
        <a href="{{ route('dashboard.stores.trashed.show', $store) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $store)
        <a href="{{ route('dashboard.stores.show', $store) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif

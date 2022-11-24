@can('update', $store)
    <a href="{{ route('dashboard.stores.status', $store) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($store->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

@can('update', $seller)
    <a href="{{ route('dashboard.sellers.status', $seller) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($seller->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

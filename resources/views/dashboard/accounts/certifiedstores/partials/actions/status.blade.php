@can('update', $certifiedstore)
    <a href="{{ route('dashboard.certifiedstores.status', $certifiedstore) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($certifiedstore->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

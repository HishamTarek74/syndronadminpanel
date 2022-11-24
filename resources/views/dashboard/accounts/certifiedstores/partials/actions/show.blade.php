@if(method_exists($certifiedstore, 'trashed') && $certifiedstore->trashed())
    @can('view', $certifiedstore)
        <a href="{{ route('dashboard.certifiedstores.trashed.show', $certifiedstore) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $certifiedstore)
        <a href="{{ route('dashboard.certifiedstores.show', $certifiedstore) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif

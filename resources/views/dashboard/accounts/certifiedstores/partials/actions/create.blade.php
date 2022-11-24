@can('create', \App\Models\CertifiedStore::class)
    <a href="{{ route('dashboard.certifiedstores.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('certifiedstores.actions.create')
    </a>
@endcan

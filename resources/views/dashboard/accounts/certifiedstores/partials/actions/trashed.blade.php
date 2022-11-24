@can('viewTrash', \App\Models\CertifiedStore::class)
    <a href="{{ route('dashboard.certifiedstores.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('certifiedstores.trashed')
    </a>
@endcan

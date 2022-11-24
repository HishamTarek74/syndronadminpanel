@can('viewTrash', \App\Models\Store::class)
    <a href="{{ route('dashboard.stores.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('stores.trashed')
    </a>
@endcan

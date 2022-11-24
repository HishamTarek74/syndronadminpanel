@can('viewTrash', \App\Models\Seller::class)
    <a href="{{ route('dashboard.sellers.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('sellers.trashed')
    </a>
@endcan

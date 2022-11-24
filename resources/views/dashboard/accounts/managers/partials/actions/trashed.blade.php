@can('viewTrash', \App\Models\Manager::class)
    <a href="{{ route('dashboard.managers.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('managers.trashed')
    </a>
@endcan

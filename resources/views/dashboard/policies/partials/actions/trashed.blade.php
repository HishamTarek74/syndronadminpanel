@can('viewTrash', \App\Models\Policy::class)
    <a href="{{ route('dashboard.policies.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('policies.trashed')
    </a>
@endcan

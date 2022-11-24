@can('viewTrash', \App\Models\Assistant::class)
    <a href="{{ route('dashboard.assistants.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('assistants.trashed')
    </a>
@endcan

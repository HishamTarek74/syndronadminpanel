@can('create', \App\Models\Assistant::class)
    <a href="{{ route('dashboard.assistants.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('assistants.actions.create')
    </a>
@endcan

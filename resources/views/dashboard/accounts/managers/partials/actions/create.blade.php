@can('create', \App\Models\Manager::class)
    <a href="{{ route('dashboard.managers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('managers.actions.create')
    </a>
@endcan

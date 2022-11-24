@can('create', \App\Models\Policy::class)
    <a href="{{ route('dashboard.policies.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('policies.actions.create')
    </a>
@endcan

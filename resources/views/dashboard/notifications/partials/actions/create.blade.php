@can('viewAny', \App\Models\Admin::class)
    <a href="{{ route('dashboard.notifications.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('notifications.actions.create')
    </a>
@endcan

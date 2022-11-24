@can('viewAny', $notification)
    <a href="{{ route('dashboard.notifications.show', $notification) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan

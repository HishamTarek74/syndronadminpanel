@can('view', $policy)
    <a href="{{ route('dashboard.policies.show', $policy) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan

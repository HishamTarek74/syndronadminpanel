@can('view', $assistant)
    <a href="{{ route('dashboard.assistants.show', $assistant) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan

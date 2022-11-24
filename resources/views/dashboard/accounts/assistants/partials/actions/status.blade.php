@can('update', $assistant)
    <a href="{{ route('dashboard.assistants.status', $assistant) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($assistant->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

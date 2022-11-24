@can('update', $supervisor)
    <a href="{{ route('dashboard.supervisors.status', $supervisor) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($supervisor->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

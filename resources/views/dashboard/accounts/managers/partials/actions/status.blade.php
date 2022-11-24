@can('update', $manager)
    <a href="{{ route('dashboard.managers.status', $manager) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($manager->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

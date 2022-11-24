@if(method_exists($manager, 'trashed') && $manager->trashed())
    @can('view', $manager)
        <a href="{{ route('dashboard.managers.trashed.show', $manager) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $manager)
        <a href="{{ route('dashboard.managers.show', $manager) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif
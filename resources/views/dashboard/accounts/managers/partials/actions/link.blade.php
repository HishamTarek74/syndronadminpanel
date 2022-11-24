@if($manager)
    @if(method_exists($manager, 'trashed') && $manager->trashed())
        <a href="{{ route('dashboard.managers.trashed.show', $manager) }}" class="text-decoration-none text-ellipsis">
            {{ $manager->name }}
        </a>
    @else
        <a href="{{ route('dashboard.managers.show', $manager) }}" class="text-decoration-none text-ellipsis">
            {{ $manager->name }}
        </a>
    @endif
@else
    ---
@endif
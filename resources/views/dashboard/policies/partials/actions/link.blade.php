@if($policy)
    @if(method_exists($policy, 'trashed') && $policy->trashed())
        <a href="{{ route('dashboard.policies.trashed.show', $policy) }}" class="text-decoration-none text-ellipsis">
            {{ $policy->name }}
        </a>
    @else
        <a href="{{ route('dashboard.policies.show', $policy) }}" class="text-decoration-none text-ellipsis">
            {{ $policy->name }}
        </a>
    @endif
@else
    ---
@endif

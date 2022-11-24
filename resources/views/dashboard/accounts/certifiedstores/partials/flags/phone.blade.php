<div class="d-inline-flex align-items-center">
    <span class="mx-2">{{ $certifiedstore->phone }}</span>
    @if($certifiedstore->phone_verified_at)
        <span class="badge rounded-pill bg-info">@lang('users.verified')</span>
    @else
        <span class="badge badge-warning">@lang('users.unverified')</span>
    @endif
</div>

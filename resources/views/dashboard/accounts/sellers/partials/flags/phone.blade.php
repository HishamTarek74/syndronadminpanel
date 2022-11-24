<div class="d-inline-flex align-items-center">
    <span class="mx-2">{{ $seller->phone }}</span>
    @if($seller->phone_verified_at)
        <span class="badge rounded-pill bg-info">@lang('users.verified')</span>
    @else
        <span class="badge badge-warning">@lang('users.unverified')</span>
    @endif
</div>

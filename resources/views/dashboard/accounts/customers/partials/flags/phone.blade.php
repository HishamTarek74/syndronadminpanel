<div class="d-inline-flex align-items-center">
    <span class="mx-2">{{ $customer->phone }}</span>
    @if($customer->phone_verified_at)
        <span class="badge rounded-pill bg-info">@lang('users.verified')</span>
    @else
        <span class="badge rounded-pill bg-info ">@lang('users.unverified')</span>
    @endif
</div>
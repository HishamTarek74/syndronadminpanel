<div class="d-inline-flex align-items-center">
    <span class="mx-2">{{ $assistant->phone }}</span>
    @if($assistant->phone_verified_at)
        <span class="badge rounded-pill bg-info ">@lang('users.verified')</span>
    @else
        <span class="badge rounded-pill bg-info ">@lang('users.unverified')</span>
    @endif
</div>
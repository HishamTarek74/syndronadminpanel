@can('update', $customer)
    <a href="{{ route('dashboard.customers.status', $customer) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($customer->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan

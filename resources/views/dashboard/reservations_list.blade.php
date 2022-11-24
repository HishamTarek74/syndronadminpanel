@component('dashboard::components.table-box')
    @slot('title', trans('bookings.plural'))

    <thead>
    <tr>
        <th>@lang('bookings.attributes.customer_id')</th>
        <th class="d-none d-md-table-cell">@lang('customers.attributes.phone')</th>
        <th class="d-none d-md-table-cell">@lang('bookings.attributes.package_id')</th>
        <th class="d-none d-md-table-cell">@lang('bookings.attributes.status')</th>
        <th class="d-none d-md-table-cell">@lang('bookings.attributes.type')</th>
        <th class="d-none d-md-table-cell">@lang('bookings.attributes.price')</th>
        <th class="d-none d-md-table-cell">@lang('bookings.attributes.tax')</th>
        <th style="width: 160px">...</th>
    </tr>
    </thead>
    <tbody>
    @forelse($bookings as $booking)
        <tr>
            <td>
                @if($booking->customer)
                    <a href="{{ route('dashboard.customers.show', $booking->customer) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $booking->customer->name }}
                    </a>
                @else
                    {{ $booking->customer_name }}
                @endif
            </td>
            <td>
                @if($booking->customer)
                    {{ $booking->customer->phone }}
                @else
                    {{ $booking->customer_phone }}
                @endif
            </td>
            <td class="d-none d-md-table-cell">
                {{ $booking->package->id }}
            </td>
            <td class="d-none d-md-table-cell">
                {{ __('bookings.status.' . $booking->status) }}
            </td>
            <td class="d-none d-md-table-cell">
                {{ __('bookings.types.' . $booking->type) }}
            </td>
            <td class="d-none d-md-table-cell">
                {{ $booking->price }}
            </td>
            <td class="d-none d-md-table-cell">
                {{ $booking->tax }}
            </td>
            <td style="width: 160px">
                @include('dashboard.bookings.partials.actions.show')
                @include('dashboard.bookings.partials.actions.edit')
                @include('dashboard.bookings.partials.actions.delete')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('bookings.empty')</td>
        </tr>
    @endforelse
@endcomponent

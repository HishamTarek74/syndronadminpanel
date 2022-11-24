@component('dashboard::components.table-box')
    @slot('title', trans('owner_requests.plural'))

    <thead>
    <tr>
        <th>@lang('owner_requests.attributes.user_id')</th>
        <th>@lang('owner_requests.attributes.id_number')</th>
        <th style="width: 160px">...</th>
    </thead>
    <tbody>
    @forelse($ownerRequests as $ownerRequest)
        <tr>
            <td>
                {{ $ownerRequest->user->name }}
            </td>
            <td>
                {{ $ownerRequest->id_number }}
            </td>

            <td style="width: 160px">
                @include('dashboard.owner_requests.partials.actions.show')

                @include('dashboard.owner_requests.partials.actions.delete')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('owner_requests.empty')</td>
        </tr>
    @endforelse
@endcomponent

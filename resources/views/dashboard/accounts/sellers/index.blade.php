<x-layout :title="trans('sellers.plural')" :breadcrumbs="['dashboard.sellers.index']">
    @include('dashboard.accounts.sellers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('sellers.actions.list') ({{ count_formatted($sellers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Seller::class }}"
                            :resource="trans('sellers.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Seller::class }}"
                            import="{{ \App\Imports\SellersImport::class }}"
                            :resource="trans('sellers.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Seller::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\SellerResource::class }}"
                            fileName="sellers"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        <!--@include('dashboard.accounts.sellers.partials.actions.create')-->
                        @include('dashboard.accounts.sellers.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('sellers.attributes.name')</th>
            <th>@lang('sellers.attributes.id')</th>
            <th class="d-none d-md-table-cell">@lang('sellers.attributes.email')</th>
            <th>@lang('sellers.attributes.phone')</th>
            <th>@lang('customers.attributes.country_id')</th>
            <th>@lang('customers.attributes.expire_date')</th>
            <th>@lang('sellers.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sellers as $seller)
            <tr>
                <td>
                    <x-check-all-item :model="$seller"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.sellers.show', $seller) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.sellers.partials.flags.svg')
                            </span>
                        <img src="{{ $seller->getAvatar() }}"
                             alt="img"
                             class="img-circle img-size-32 mr-2">
                        {{ $seller->name }}
                    </a>
                </td>
                <td>{{ $seller->id }}</td>
                <td class="d-none d-md-table-cell">
                    {{ $seller->email }}
                </td>
                <td>
                    {{ $seller->phone }}
                </td>
                <td>
                    {{ $seller->country_id ? $seller->country->name : __('dashboard.not_found') }}
                </td>
                <td>{{$seller->getExpiredSubscriptionDuration() ?? 'expired' }}</td>
                <td>{{ $seller->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.sellers.partials.actions.show')
                    @include('dashboard.accounts.sellers.partials.actions.edit')
                    @include('dashboard.accounts.sellers.partials.actions.status')
                    @include('dashboard.accounts.sellers.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('sellers.empty')</td>
            </tr>
        @endforelse

        @if($sellers->hasPages())
            @slot('footer')
                {{ $sellers->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

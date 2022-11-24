<x-layout :title="trans('stores.plural')" :breadcrumbs="['dashboard.stores.index']">
    @include('dashboard.accounts.stores.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('stores.actions.list') ({{ count_formatted($stores->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Seller::class }}"
                            :resource="trans('stores.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Seller::class }}"
                            import="{{ \App\Imports\storesImport::class }}"
                            :resource="trans('stores.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Seller::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\SellerResource::class }}"
                            fileName="stores"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.stores.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('stores.attributes.name')</th>
            <th>@lang('stores.attributes.id')</th>
            <th class="d-none d-md-table-cell">@lang('stores.attributes.email')</th>
            <th>@lang('stores.attributes.phone')</th>
            <th>@lang('customers.attributes.country_id')</th>
            <th>@lang('stores.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stores as $store)
            <tr>
                <td>
                    <x-check-all-item :model="$store"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.stores.show', $store) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.stores.partials.flags.svg')
                            </span>
                        <img src="{{ $store->getAvatar() }}"
                             alt="img"
                             class="img-circle img-size-32 mr-2">
                        {{ $store->name }}
                    </a>
                </td>
                <td>{{ $store->id }}</td>
                <td class="d-none d-md-table-cell">
                    {{ $store->email }}
                </td>
                <td>
                    {{ $store->phone }}
                </td>
                <td>
                    {{ $store->country_id ? $store->country->name : __('dashboard.not_found') }}
                </td>
                <td>{{ $store->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.stores.partials.actions.show')
                    @include('dashboard.accounts.stores.partials.actions.edit')
                    @include('dashboard.accounts.stores.partials.actions.status')
                    @include('dashboard.accounts.stores.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('stores.empty')</td>
            </tr>
        @endforelse

        @if($stores->hasPages())
            @slot('footer')
                {{ $stores->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

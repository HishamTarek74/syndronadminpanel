<x-layout :title="trans('stores.trashed')" :breadcrumbs="['dashboard.stores.trashed']">
    @include('dashboard.accounts.stores.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('stores.actions.list') ({{ count_formatted($stores->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('stores.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('stores.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('stores.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('stores.attributes.email')</th>
            <th>@lang('stores.attributes.phone')</th>
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
                    <a href="{{ route('dashboard.stores.trashed.show', $store) }}"
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

                <td class="d-none d-md-table-cell">
                    {{ $store->email }}
                </td>
                <td>
                    @include('dashboard.accounts.stores.partials.flags.phone')
                </td>
                <td>{{ $store->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.stores.partials.actions.show')
                    @include('dashboard.accounts.stores.partials.actions.restore')
                    @include('dashboard.accounts.stores.partials.actions.forceDelete')
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

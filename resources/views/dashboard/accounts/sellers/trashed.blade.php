<x-layout :title="trans('sellers.trashed')" :breadcrumbs="['dashboard.sellers.trashed']">
    @include('dashboard.accounts.sellers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('sellers.actions.list') ({{ count_formatted($sellers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('sellers.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('sellers.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('sellers.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('sellers.attributes.email')</th>
            <th>@lang('sellers.attributes.phone')</th>
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
                    <a href="{{ route('dashboard.sellers.trashed.show', $seller) }}"
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

                <td class="d-none d-md-table-cell">
                    {{ $seller->email }}
                </td>
                <td>
                    @include('dashboard.accounts.sellers.partials.flags.phone')
                </td>
                <td>{{ $seller->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.sellers.partials.actions.show')
                    @include('dashboard.accounts.sellers.partials.actions.restore')
                    @include('dashboard.accounts.sellers.partials.actions.forceDelete')
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

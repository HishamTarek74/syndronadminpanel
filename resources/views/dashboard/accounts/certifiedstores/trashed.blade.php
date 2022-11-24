<x-layout :title="trans('certifiedstores.trashed')" :breadcrumbs="['dashboard.certifiedstores.trashed']">
    @include('dashboard.accounts.certifiedstores.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('certifiedstores.actions.list') ({{ count_formatted($certifiedstores->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('certifiedstores.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Seller::class }}"
                        :resource="trans('certifiedstores.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('certifiedstores.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('certifiedstores.attributes.email')</th>
            <th>@lang('certifiedstores.attributes.phone')</th>
            <th>@lang('certifiedstores.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($certifiedstores as $certifiedstore)
            <tr>
                <td>
                    <x-check-all-item :model="$certifiedstore"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.certifiedstores.trashed.show', $certifiedstore) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.certifiedstores.partials.flags.svg')
                            </span>
                        <img src="{{ $certifiedstore->getAvatar() }}"
                             alt="img"
                             class="img-circle img-size-32 mr-2">
                        {{ $certifiedstore->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $certifiedstore->email }}
                </td>
                <td>
                    @include('dashboard.accounts.certifiedstores.partials.flags.phone')
                </td>
                <td>{{ $certifiedstore->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.certifiedstores.partials.actions.show')
                    @include('dashboard.accounts.certifiedstores.partials.actions.restore')
                    @include('dashboard.accounts.certifiedstores.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('certifiedstores.empty')</td>
            </tr>
        @endforelse

        @if($certifiedstores->hasPages())
            @slot('footer')
                {{ $certifiedstores->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

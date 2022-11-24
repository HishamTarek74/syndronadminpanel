<x-layout :title="trans('certifiedstores.plural')" :breadcrumbs="['dashboard.certifiedstores.index']">
    @include('dashboard.accounts.certifiedstores.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('certifiedstores.actions.list') ({{ count_formatted($certifiedstores->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Seller::class }}"
                            :resource="trans('certifiedstores.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Seller::class }}"
                            import="{{ \App\Imports\certifiedstoresImport::class }}"
                            :resource="trans('certifiedstores.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Seller::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\SellerResource::class }}"
                            fileName="certifiedstores"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        <!--@include('dashboard.accounts.certifiedstores.partials.actions.create')-->
                        @include('dashboard.accounts.certifiedstores.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('certifiedstores.attributes.name')</th>
            <th>@lang('certifiedstores.attributes.id')</th>
            <th class="d-none d-md-table-cell">@lang('certifiedstores.attributes.email')</th>
            <th>@lang('certifiedstores.attributes.phone')</th>
            <th>@lang('customers.attributes.country_id')</th>
            <th>@lang('customers.attributes.expire_date')</th>
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
                    <a href="{{ route('dashboard.certifiedstores.show', $certifiedstore) }}"
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
                <td>
                    {{ $certifiedstore->id }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $certifiedstore->email }}
                </td>
                <td>
                    {{ $certifiedstore->phone }}
                </td>
                <td>
                    {{ $certifiedstore->country_id ? $certifiedstore->country->name : __('dashboard.not_found') }}
                </td>
                <td>{{$seller->getExpiredSubscriptionDuration() ?? 'expired' }}</td>
                <td>{{ $certifiedstore->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.certifiedstores.partials.actions.show')
                    @include('dashboard.accounts.certifiedstores.partials.actions.edit')
                    @include('dashboard.accounts.certifiedstores.partials.actions.status')
                    @include('dashboard.accounts.certifiedstores.partials.actions.delete')
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

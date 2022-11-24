<x-layout :title="trans('policies.trashed')" :breadcrumbs="['dashboard.policies.trashed']">
    @include('dashboard.policies.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('policies.actions.list') ({{ count_formatted($policies->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Policy::class }}"
                        :resource="trans('policies.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Policy::class }}"
                        :resource="trans('policies.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('policies.attributes.name')</th>
            <th>@lang('policies.attributes.shop_category_id')</th>
            <th>@lang('policies.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($policies as $policy)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$policy"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.policies.show', $policy) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $policy->name }}
                    </a>
                </td>
                <td>{{ $policy->shop_category->name }}</td>

                <td>{{ $policy->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.policies.partials.actions.show')
                    @include('dashboard.policies.partials.actions.restore')
                    @include('dashboard.policies.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('policies.empty')</td>
            </tr>
        @endforelse

        @if($policies->hasPages())
            @slot('footer')
                {{ $policies->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

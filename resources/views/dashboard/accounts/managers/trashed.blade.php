<x-layout :title="trans('managers.trashed')" :breadcrumbs="['dashboard.managers.trashed']">
    @include('dashboard.accounts.managers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('managers.actions.list') ({{ count_formatted($managers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Manager::class }}"
                        :resource="trans('managers.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Manager::class }}"
                        :resource="trans('managers.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('managers.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('managers.attributes.email')</th>
            <th>@lang('managers.attributes.phone')</th>
            <th>@lang('managers.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($managers as $manager)
            <tr>
                <td>
                    <x-check-all-item :model="$manager"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.managers.trashed.show', $manager) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.managers.partials.flags.svg')
                            </span>
                        <img src="{{ $manager->getAvatar() }}"
                             alt="img"
                             class="img-circle img-size-32 mr-2">
                        {{ $manager->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $manager->email }}
                </td>
                <td>
                    @include('dashboard.accounts.managers.partials.flags.phone')
                </td>
                <td>{{ $manager->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.managers.partials.actions.show')
                    @include('dashboard.accounts.managers.partials.actions.restore')
                    @include('dashboard.accounts.managers.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('managers.empty')</td>
            </tr>
        @endforelse

        @if($managers->hasPages())
            @slot('footer')
                {{ $managers->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

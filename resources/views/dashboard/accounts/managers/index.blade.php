<x-layout :title="trans('managers.plural')" :breadcrumbs="['dashboard.managers.index']">
    @include('dashboard.accounts.managers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('managers.actions.list') ({{ count_formatted($managers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Manager::class }}"
                            :resource="trans('managers.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Manager::class }}"
                            import="{{ \App\Imports\managersImport::class }}"
                            :resource="trans('managers.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Manager::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\managerResource::class }}"
                            fileName="managers"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.managers.partials.actions.create')
                        @include('dashboard.accounts.managers.partials.actions.trashed')
                    </div>
                </div>
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
                    <a href="{{ route('dashboard.managers.show', $manager) }}"
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
                    {{ $manager->phone }}
                </td>
                <td>{{ $manager->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.managers.partials.actions.show')
                    @include('dashboard.accounts.managers.partials.actions.edit')
                    @include('dashboard.accounts.managers.partials.actions.status')
                    @include('dashboard.accounts.managers.partials.actions.delete')
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

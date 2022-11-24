<x-layout :title="trans('roles.plural')" :breadcrumbs="['dashboard.roles.index']">
    @include('dashboard.roles.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title', trans('roles.actions.list'))

        @slot('tools')
            @include('dashboard.roles.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('roles.attributes.name')</th>
            <th>@lang('roles.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <td>
                    <a href="{{ route('dashboard.roles.show', $role) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.roles.partials.flags.svg')
                            </span>
                        {{ $role->name }}
                    </a>
                </td>

                <td>{{ $role->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.roles.partials.actions.show')
                    @include('dashboard.roles.partials.actions.edit')
                    @include('dashboard.roles.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('roles.empty')</td>
            </tr>
        @endforelse


    @endcomponent
</x-layout>

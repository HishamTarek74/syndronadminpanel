<x-layout :title="trans('assistants.trashed')" :breadcrumbs="['dashboard.assistants.trashed']">
    @include('dashboard.accounts.assistants.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('assistants.actions.list') ({{ count_formatted($assistants->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Assistant::class }}"
                        :resource="trans('assistants.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Assistant::class }}"
                        :resource="trans('assistants.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('assistants.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('assistants.attributes.email')</th>
            <th>@lang('assistants.attributes.phone')</th>
            <th>@lang('assistants.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($assistants as $assistant)
            <tr>
                <td>
                    <x-check-all-item :model="$assistant"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.assistants.trashed.show', $assistant) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.assistants.partials.flags.svg')
                            </span>
                        <img src="{{ $assistant->getAvatar() }}"
                             alt="img"
                             class="img-circle img-size-32 mr-2">
                        {{ $assistant->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $assistant->email }}
                </td>
                <td>
                    @include('dashboard.accounts.assistants.partials.flags.phone')
                </td>
                <td>{{ $assistant->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.assistants.partials.actions.show')
                    @include('dashboard.accounts.assistants.partials.actions.restore')
                    @include('dashboard.accounts.assistants.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('assistants.empty')</td>
            </tr>
        @endforelse

        @if($assistants->hasPages())
            @slot('footer')
                {{ $assistants->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

<x-layout :title="$manager->name" :breadcrumbs="['dashboard.managers.show', $manager]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('managers.attributes.name')</th>
                <td>{{ $manager->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('managers.attributes.email')</th>
                <td>{{ $manager->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('managers.attributes.phone')</th>
                <td>
                    {{ $manager->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('managers.attributes.avatar')</th>
                <td>
                    @if($manager->getFirstMedia('avatars'))
                        <file-preview :media="{{ $manager->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $manager->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $manager->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.managers.partials.actions.edit')
            @include('dashboard.accounts.managers.partials.actions.delete')
            @include('dashboard.accounts.managers.partials.actions.restore')
            @include('dashboard.accounts.managers.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

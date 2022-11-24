<x-layout :title="$assistant->name" :breadcrumbs="['dashboard.assistants.show', $assistant]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('assistants.attributes.name')</th>
                <td>{{ $assistant->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('assistants.attributes.email')</th>
                <td>{{ $assistant->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('assistants.attributes.phone')</th>
                <td>
                    {{ $assistant->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('assistants.attributes.avatar')</th>
                <td>
                    @if($assistant->getFirstMedia('avatars'))
                        <file-preview :media="{{ $assistant->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $assistant->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $assistant->name }}">
                    @endif


                </td>
            </tr>
            <tr>
                <th width="200">@lang('roles.plural')</th>
                <td>
                    @foreach($assistant->roles as $role)
                    <h4><span class="badge badge-pill bg-info">{{$role->name}}</span></h4>
                    @endforeach
                </td>

            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.assistants.partials.actions.impersonate')
            @include('dashboard.accounts.assistants.partials.actions.edit')
            @include('dashboard.accounts.assistants.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>

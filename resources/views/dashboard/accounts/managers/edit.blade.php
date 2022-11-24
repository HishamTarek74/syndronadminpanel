<x-layout :title="$manager->name" :breadcrumbs="['dashboard.managers.edit', $manager]">
    {{ BsForm::resource('managers')->putModel($manager, route('dashboard.managers.update', $manager), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('managers.actions.edit'))

        @include('dashboard.accounts.managers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('managers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

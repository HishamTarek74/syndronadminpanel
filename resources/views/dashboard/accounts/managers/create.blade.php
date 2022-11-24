<x-layout :title="trans('managers.actions.create')" :breadcrumbs="['dashboard.managers.create']">
    {{ BsForm::resource('managers')->post(route('dashboard.managers.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('managers.actions.create'))

        @include('dashboard.accounts.managers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('managers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
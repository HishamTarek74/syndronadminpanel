<x-layout :title="trans('certifiedstores.actions.create')" :breadcrumbs="['dashboard.certifiedstores.create']">
    {{ BsForm::resource('certifiedstores')->post(route('dashboard.certifiedstores.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('certifiedstores.actions.create'))

        @include('dashboard.accounts.certifiedstores.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('certifiedstores.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

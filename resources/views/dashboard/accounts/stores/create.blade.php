<x-layout :title="trans('stores.actions.create')" :breadcrumbs="['dashboard.stores.create']">
    {{ BsForm::resource('stores')->post(route('dashboard.stores.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('stores.actions.create'))

        @include('dashboard.accounts.stores.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('stores.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

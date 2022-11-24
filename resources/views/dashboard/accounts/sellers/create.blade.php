<x-layout :title="trans('sellers.actions.create')" :breadcrumbs="['dashboard.sellers.create']">
    {{ BsForm::resource('sellers')->post(route('dashboard.sellers.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('sellers.actions.create'))

        @include('dashboard.accounts.sellers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('sellers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

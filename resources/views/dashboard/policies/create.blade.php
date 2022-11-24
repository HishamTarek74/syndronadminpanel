<x-layout :title="trans('policies.actions.create')" :breadcrumbs="['dashboard.policies.create']">
    {{ BsForm::resource('policies')->post(route('dashboard.policies.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('policies.actions.create'))

        @include('dashboard.policies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('policies.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
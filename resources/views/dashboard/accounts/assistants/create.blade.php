<x-layout :title="trans('assistants.actions.create')" :breadcrumbs="['dashboard.assistants.create']">
    {{ BsForm::resource('assistants')->post(route('dashboard.assistants.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('assistants.actions.create'))

        @include('dashboard.accounts.assistants.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('assistants.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
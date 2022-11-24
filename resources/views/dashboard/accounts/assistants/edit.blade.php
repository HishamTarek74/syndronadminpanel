<x-layout :title="$assistant->name" :breadcrumbs="['dashboard.assistants.edit', $assistant]">
    {{ BsForm::resource('assistants')->putModel($assistant, route('dashboard.assistants.update', $assistant), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('assistants.actions.edit'))

        @include('dashboard.accounts.assistants.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('assistants.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

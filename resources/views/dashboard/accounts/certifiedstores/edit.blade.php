<x-layout :title="$certifiedstore->name" :breadcrumbs="['dashboard.certifiedstores.edit', $certifiedstore]">
    {{ BsForm::resource('certifiedstores')->putModel($certifiedstore, route('dashboard.certifiedstores.update', $certifiedstore), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('certifiedstores.actions.edit'))

        @include('dashboard.accounts.certifiedstores.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('certifiedstores.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

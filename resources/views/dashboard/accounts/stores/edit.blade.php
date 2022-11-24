<x-layout :title="$store->name" :breadcrumbs="['dashboard.stores.edit', $store]">
    {{ BsForm::resource('stores')->putModel($store, route('dashboard.stores.update', $store), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('stores.actions.edit'))

        @include('dashboard.accounts.stores.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('stores.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

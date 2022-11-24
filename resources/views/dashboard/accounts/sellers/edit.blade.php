<x-layout :title="$seller->name" :breadcrumbs="['dashboard.sellers.edit', $seller]">
    {{ BsForm::resource('sellers')->putModel($seller, route('dashboard.sellers.update', $seller), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('sellers.actions.edit'))

        @include('dashboard.accounts.sellers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('sellers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>

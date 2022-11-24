<x-layout :title="$policy->name" :breadcrumbs="['dashboard.policies.edit', $policy]">
    {{ BsForm::resource('policies')->putModel($policy, route('dashboard.policies.update', $policy)) }}
    @component('dashboard::components.box')
        @slot('title', trans('policies.actions.edit'))

        @include('dashboard.policies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('policies.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
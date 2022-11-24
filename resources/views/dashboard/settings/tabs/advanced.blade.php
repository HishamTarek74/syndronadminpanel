<x-layout :title="trans('settings.tabs.advanced')" :breadcrumbs="['dashboard.settings.index']">
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    @component('dashboard::components.box')
            {{ BsForm::number('owner_percentage')->step(.1)->value(Settings::get('owner_percentage')) }}
            {{ BsForm::number('tax_percentage')->step(.1)->value(Settings::get('tax_percentage')) }}
        

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
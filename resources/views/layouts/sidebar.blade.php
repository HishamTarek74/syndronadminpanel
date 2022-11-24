@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.accounts.sidebar')
@include('dashboard.countries.partials.actions.sidebar')


@include('dashboard.notifications.sidebar')

@include('dashboard.feedback.partials.actions.sidebar')
@include('dashboard.settings.sidebar')


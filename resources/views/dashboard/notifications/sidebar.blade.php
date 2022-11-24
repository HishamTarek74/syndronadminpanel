@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Admin::class])
    @slot('url', route('dashboard.notifications.index'))
    @slot('name', trans('notifications.plural'))
    @slot('active', request()->routeIs('*notifications*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('notifications.actions.list'),
            'url' => route('dashboard.notifications.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Admin::class],
            'active' => request()->routeIs('*notifications.index')
            || request()->routeIs('*notifications.show'),
        ],
        [
            'name' => trans('notifications.actions.create'),
            'url' => route('dashboard.notifications.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Admin::class],
            'active' => request()->routeIs('*notifications.create'),
        ],
    ])
@endcomponent

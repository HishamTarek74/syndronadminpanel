@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Policy::class])
    @slot('url', route('dashboard.policies.index'))
    @slot('name', trans('policies.plural'))
    @slot('active', request()->routeIs('*policies*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('policies.actions.list'),
            'url' => route('dashboard.policies.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Policy::class],
            'active' => request()->routeIs('*policies.index')
            || request()->routeIs('*policies.show'),
        ],
        [
            'name' => trans('policies.actions.create'),
            'url' => route('dashboard.policies.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Policy::class],
            'active' => request()->routeIs('*policies.create'),
        ],
    ])
@endcomponent

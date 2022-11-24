@if(Gate::allows('viewAny', \App\Models\Admin::class))
    @component('dashboard::components.sidebarItem')
        @slot('url', '#')
        @slot('name', trans('promotions.app_content'))
        @slot('icon', 'fas fa-align-center')
        @slot('tree', [
        [
            'name' => trans('promotions.plural'),
            'url' => route('dashboard.promotions.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Promotion::class],
            'active' => request()->routeIs('*promotions.index')
            || request()->routeIs('*promotions.show')
            || request()->routeIs('*promotions.cities*'),
        ],
        [
            'name' => trans('packages.plural'),
            'url' => route('dashboard.packages.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Package::class],
            'active' => request()->routeIs('*packages.index')
            || request()->routeIs('*packages.show')
            || request()->routeIs('*packages.cities*'),
        ],
         [
            'name' => trans('package_features.plural'),
            'url' => route('dashboard.package_features.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\PackageFeature::class],
            'active' => request()->routeIs('*package_features.index')
            || request()->routeIs('*package_features.show')
            || request()->routeIs('*package_features.cities*'),
        ],
       [
            'name' => trans('points.plural'),
            'url' => route('dashboard.points.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Point::class],
            'active' => request()->routeIs('*points.index')
            || request()->routeIs('*points.show'),
        ],
        ])
    @endcomponent

@endif

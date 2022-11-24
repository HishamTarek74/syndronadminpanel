@if(Gate::allows('viewAny', \App\Models\User::class)
    || Gate::allows('viewAny', \App\Models\Supervisor::class)
    || Gate::allows('viewAny', \App\Models\Role::class)
    || Gate::allows('viewAny', \App\Models\Customer::class))
    @component('dashboard::components.sidebarItem')
        @slot('url', '#')
        @slot('name', trans('users.plural'))
        @slot('active', request()->routeIs('*admins*') || request()->routeIs('*admins*'))
        @slot('icon', 'fas fa-users')
        @slot('tree', [
            [
                'name' => trans('admins.plural'),
                'url' => route('dashboard.admins.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Admin::class],
                'active' => request()->routeIs('*admins*'),
            ],
            [
                'name' => trans('supervisors.plural'),
                'url' => route('dashboard.supervisors.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Supervisor::class],
                'active' => request()->routeIs('*supervisors*'),
            ],
            [
                'name' => trans('roles.plural'),
                'url' => route('dashboard.roles.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Role::class],
                'active' => request()->routeIs('*roles*')
            ],
        ])
    @endcomponent
    @component('dashboard::components.sidebarItem')
        @slot('url', '#')
        @slot('name', 'الاعضاء')
        @slot('active', request()->routeIs('*customers*') || request()->routeIs('*customers*'))
        @slot('icon', 'fas fa-users')
        @slot('tree', [
                  [
                  'name' => trans('customers.plural'),
                  'url' => route('dashboard.customers.index'),
                  'can' => ['ability' => 'viewAny', 'model' => \App\Models\Customer::class],
                  'active' => request()->routeIs('*customers*'),
              ],
      ])
    @endcomponent
@endif

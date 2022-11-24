@can('create', \App\Models\Store::class)
    <a href="{{ route('dashboard.stores.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('stores.actions.create')
    </a>
@endcan

@can('create', \App\Models\Seller::class)
    <a href="{{ route('dashboard.sellers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('sellers.actions.create')
    </a>
@endcan

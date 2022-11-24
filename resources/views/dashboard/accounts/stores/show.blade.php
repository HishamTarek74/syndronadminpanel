<x-layout :title="$store->name" :breadcrumbs="['dashboard.stores.show', $store]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'gray',
                            'icon' => 'fa fa-bullhorn',
                            'text' => trans('customers.ads_count'),
                            'number' => number_format($ads_count),
                        ])
                    </div>
                    <div class="col-md-4">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'orange',
                            'icon' => 'fas fa-shopping-cart',
                            'text' => trans('customers.sales_count'),
                            'number' => number_format($sales_count),
                        ])
                    </div>
                    <div class="col-md-4">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'pink',
                            'icon' => 'fa fa-window-close',
                            'text' => trans('customers.reports_count'),
                            'number' => number_format($reports_count),
                        ])
                    </div>

                    <div class="col-md-4">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'orange',
                            'icon' => 'fas fa-shopping-cart',
                            'text' => trans('customers.balance'),
                            'number' => number_format($balance),
                        ])
                    </div>

                    <div class="col-md-4">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'gray',
                            'icon' => 'fa fa-envelope-open',
                            'text' => trans('customers.commission'),
                            'number' => number_format(22.00),
                        ])
                    </div>

                </div>
            </div>
        </div>

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('stores.attributes.name')</th>
                <td>{{ $store->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('stores.attributes.email')</th>
                <td>{{ $store->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.country_id')</th>
                <td>{{ $store->country_id ? $store->country->name : '-' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('stores.attributes.phone')</th>
                <td>
                    {{ $store->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('customers.member_since')</th>
                <td>
                    {{ $store->created_at }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('stores.attributes.avatar')</th>
                <td>
                    @if($store->getFirstMedia('avatars'))
                        <file-preview :media="{{ $store->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $store->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $store->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.stores.partials.actions.edit')
            @include('dashboard.accounts.stores.partials.actions.delete')
            @include('dashboard.accounts.stores.partials.actions.restore')
            @include('dashboard.accounts.stores.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

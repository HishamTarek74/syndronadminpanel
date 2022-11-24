<x-layout :title="$seller->name" :breadcrumbs="['dashboard.sellers.show', $seller]">
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
                <th width="200">@lang('sellers.attributes.name')</th>
                <td>{{ $seller->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('sellers.attributes.email')</th>
                <td>{{ $seller->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.country_id')</th>
                <td>{{ $seller->country_id ? $seller->country->name : '-' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('sellers.attributes.phone')</th>
                <td>
                    {{ $seller->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('customers.member_since')</th>
                <td>
                    {{ $seller->created_at }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('sellers.attributes.avatar')</th>
                <td>
                    @if($seller->getFirstMedia('avatars'))
                        <file-preview :media="{{ $seller->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $seller->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $seller->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.sellers.partials.actions.edit')
            @include('dashboard.accounts.sellers.partials.actions.delete')
            @include('dashboard.accounts.sellers.partials.actions.restore')
            @include('dashboard.accounts.sellers.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

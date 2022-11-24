<x-layout :title="$customer->name" :breadcrumbs="['dashboard.customers.show', $customer]">
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
                <th width="200">@lang('customers.attributes.name')</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.email')</th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.country_id')</th>
                <td>
                    {{ $customer->country->name }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.phone')</th>
                <td>
                    {{ $customer->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('customers.member_since')</th>
                <td>
                    {{ $customer->created_at }}
                </td>
            </tr>

            <tr>
                <th width="200">@lang('customers.attributes.avatar')</th>
                <td>
                    @if($customer->getFirstMedia('avatars'))
                        <file-preview :media="{{ $customer->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $customer->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $customer->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.customers.partials.actions.edit')
            @include('dashboard.accounts.customers.partials.actions.delete')
            @include('dashboard.accounts.customers.partials.actions.restore')
            @include('dashboard.accounts.customers.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

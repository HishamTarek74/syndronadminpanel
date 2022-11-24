<x-layout :title="$certifiedstore->name" :breadcrumbs="['dashboard.certifiedstores.show', $certifiedstore]">
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
                <th width="200">@lang('certifiedstores.attributes.name')</th>
                <td>{{ $certifiedstore->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('certifiedstores.attributes.email')</th>
                <td>{{ $certifiedstore->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('customers.attributes.country_id')</th>
                <td>{{ $certifiedstore->country_id ? $certifiedstore->country->name : '-' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('certifiedstores.attributes.phone')</th>
                <td>
                    {{ $certifiedstore->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('customers.member_since')</th>
                <td>
                    {{ $store->created_at }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('certifiedstores.attributes.avatar')</th>
                <td>
                    @if($certifiedstore->getFirstMedia('avatars'))
                        <file-preview :media="{{ $certifiedstore->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $certifiedstore->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $certifiedstore->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.certifiedstores.partials.actions.edit')
            @include('dashboard.accounts.certifiedstores.partials.actions.delete')
            @include('dashboard.accounts.certifiedstores.partials.actions.restore')
            @include('dashboard.accounts.certifiedstores.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

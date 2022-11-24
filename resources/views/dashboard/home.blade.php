<x-layout :title="trans('dashboard.home')" :breadcrumbs="['dashboard.home']">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @include('dashboard::components.info-box', [
                        'icon_color' => 'danger',
                        'icon' => 'users',
                        'text' => trans('customers.plural'),
                        'number' => number_format(200),
                    ])
                </div>
            </div>
        </div>
    </div>
    <div>
        <div id="chart5"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- customers LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('statistics.customers')</h3>
                </div>
                <div class="card-body">
                    <div id="chart1"></div>
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer text-center">--}}
{{--                    <a href="{{route('dashboard.customers.index')}}">{{__('reports.statistics.customers.view_all')}}</a>--}}
{{--                </div>--}}
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
    </div>

</x-layout>

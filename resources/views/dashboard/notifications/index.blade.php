<x-layout :title="trans('notifications.plural')" :breadcrumbs="['dashboard.notifications.index']">

    @component('dashboard::components.table-box')
        @slot('title', trans('notifications.plural'))
        @slot('tools')
            @include('dashboard.notifications.partials.actions.create')
        @endslot
        <thead>
        <tr>
            <th>@lang('notifications.attributes.id')</th>
            <th>@lang('notifications.attributes.sent_to')</th>
            <th>@lang('notifications.attributes.count')</th>
            <th>@lang('notifications.attributes.created_at')</th>
            <th>@lang('notifications.attributes.country_city')</th>
            <th>@lang('notifications.attributes.title')</th>
            <th>@lang('notifications.attributes.body')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($notifications as $key => $notification)
            <tr>
                <td>
                    {{ ++$key }}
                </td>
                <td>
                    {{ __('notifications.users.' .$notification->to) }}
                </td>
                <td>
                    {{ \DB::table('notifications')
                        ->whereJsonContains('data', ['data'=> $notification->id])
                        ->where('read_at', '!=', null)
                        ->count() }}
                </td>
                <td>
                    {{ $notification->created_at->diffForHumans() }}
                </td>
                <td>
                    @if($notification->cities[0] == 0) 
                        {{ __('notifications.all_cities') }}
                    @elseif($notification->cities)  
                        @foreach($notification->cities as $city) 
                        {{ \App\Models\City::find($city)->country->name }} - {{ \App\Models\City::find($city)->name }}
                        <br>
                        @endforeach
                    @else 
                    - {{ $notification->cities }}
                    @endif
                </td>
                
                <td>
                    {{ $notification->title ?? trans('notifications.attributes.title') }}
                </td>
                <td>
                    {{ json_decode(\DB::table('notifications')
                    ->whereJsonContains('data', ['data'=> $notification->id])->first()->data, true)['body'] }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.notifications.partials.actions.show')
                 
                    @include('dashboard.notifications.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('notifications.empty')</td>
            </tr>
        @endforelse

        @if($notifications->hasPages())
            @slot('footer')
                {{ $notifications->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

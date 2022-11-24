<x-layout :title="trans('policies.plural')" :breadcrumbs="['dashboard.policies.index']">
    @include('dashboard.policies.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('policies.actions.list') ({{ $policies->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Policy::class }}"
                    :resource="trans('policies.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Policy::class }}"
                            import="{{ \App\Imports\PoliciesImport::class }}"
                            exportResource="{{ App\Http\Resources\PolicyResource::class }}"
                            :resource="trans('policies.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Policy::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\PolicyResource::class }}"
                            fileName="Policies"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.policies.partials.actions.create')
                    @include('dashboard.policies.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("policies.attributes.name")
            </th>
            <th>
                @lang("policies.attributes.shop_category_id")
            </th>
            <th>@lang('policies.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($policies as $policy)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$policy"></x-check-all-item>
                </td>
                
                
                <td>{{ $policy->name }}</td>
                <td>{{ $policy->shop_category->name }}</td>
                <td>{{ $policy->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.policies.partials.actions.show')
                    @include('dashboard.policies.partials.actions.edit')
                    @include('dashboard.policies.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('policies.empty')</td>
            </tr>
        @endforelse

        @if($policies->hasPages())
            @slot('footer')
                {{ $policies->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

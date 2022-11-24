<x-layout :title="$policy->name" :breadcrumbs="['dashboard.policies.show', $policy]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("policies.attributes.name")</th>
                            <td>{{ $policy->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.policies.partials.actions.edit')
                    @include('dashboard.policies.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>

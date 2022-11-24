@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

<select2
    name="shop_category_id"
    id="shop_category_id"
    value="{{isset($policy) ? $policy->shop_category_id : ''}}"
    label="@lang('policies.attributes.shop_category_id')"
    remote-url="{{ route('api.shop_categories.select') }}"
></select2>
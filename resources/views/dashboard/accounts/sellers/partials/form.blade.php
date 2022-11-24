@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}

@if(Settings::get('dashboard_template') == 'syndron')
    <div class="mb-3">
        <label class="form-label">@lang('sliders.attributes.country_id')</label>
        <select class="single-select" value="{{isset($seller) ? $seller->country_id : ""}}" name="country_id">
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{  isset($slider)&&$country->id == $slider->country_id ? 'selected' : '' }}> {{ $country->name }} </option>
            @endforeach
        </select>
    </div>

@else
<select2
    name="country_id"
    id="country_id"
    value="{{ isset($seller) ? $seller->country_id : "" }}"
    label="@lang('sliders.attributes.country_id')"
    remote-url="{{ route('api.countries.select', ['parent' => 'main']) }}"
></select2>
@endif

{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}


@isset($seller)
    {{ BsForm::image('avatar')->collection('avatars')->files($seller->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

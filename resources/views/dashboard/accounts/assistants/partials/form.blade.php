@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

    <select2
        placeholder="@lang('roles.singular')"
        name="role"
        id="role"
        value="{{  $assistant->roles->count() ? $assistant->roles->first()->id : ""}}"
        label="@lang('roles.singular')"
        remote-url="{{ route('api.roles.select') }}"
    ></select2>

@isset($assistant)
    {{ BsForm::image('avatar')->collection('avatars')->files($assistant->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

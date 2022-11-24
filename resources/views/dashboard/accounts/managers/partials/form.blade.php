@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

@isset($manager)
    {{ BsForm::image('avatar')->collection('avatars')->files($manager->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

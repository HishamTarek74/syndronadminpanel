@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::email('email')->required() }}
{{ BsForm::text('phone')->required() }}

<div class="form-group">
    <label>الدور  </label>

    <select id="role" data-placeholder="الدور"
            class="select form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role">
        @if (count($roles)>0)
            @foreach ($roles as $role)
                <option value="{{$role->name}}"
                    {{isset($admin) ? count($admin->getRoleNames())>0&&($admin->getRoleNames()[0]==$role->name) ? 'selected' : '' : ''}}>
                    {{ $role->name }}</option>
            @endforeach
        @endif
    </select>
    @if ($errors->has('role'))
        <span class="help-block invalid-feedback">
                    <strong>{{ $errors->first('role') }}</strong>
               </span>
    @endif
</div>


{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}
@isset($admin)
    {{ BsForm::image('avatar')->collection('avatars')->files($admin->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

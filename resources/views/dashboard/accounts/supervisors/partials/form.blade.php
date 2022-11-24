@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}


@if(auth()->user()->isAdmin())
<div class="form-group">
    <label>الدور  </label>
    <select id="role" data-placeholder="الدور"
            class="select form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role">
        @if (count($roles)>0)
            @foreach ($roles as $role)
                <option value="{{$role->name}}"
                    {{isset($supervisor) ? count($supervisor->getRoleNames())>0&&($supervisor->getRoleNames()[0]==$role->name) ? 'selected' : '' : ''}}>
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

@endif
{{-- @if(auth()->user()->isAdmin())
    <fieldset>
        <legend>@lang('role.plural')</legend>
        @foreach(config('permission.supported') as $permission)
            {{ BsForm::checkbox('permissions[]')
                    ->value($permission)
                    ->label(trans(str_replace('manage.', '', $permission.'.permission')))
                    ->checked(isset($supervisor) && $supervisor->hasPermissionTo($permission)) }}
        @endforeach
    </fieldset>
@endif --}}

{{--@if(auth()->user()->isAdmin())--}}
{{--    <select2--}}
{{--        placeholder="@lang('roles.singular')"--}}
{{--        name="role"--}}
{{--        id="role"--}}
{{--        value="{{  $supervisor->roles->count() ? $supervisor->roles->first()->id : ""}}"--}}
{{--        label="@lang('roles.singular')"--}}
{{--        remote-url="{{ route('api.roles.select') }}"--}}
{{--    ></select2>--}}
{{--@endif--}}


@php $team_id = request()->get('team_id'); @endphp
@php
    if(isset($supervisor))
        $data = $supervisor->team_id;
    elseif(isset($team_id))
        $data = $team_id;
    else
        $data = '';
@endphp

@if(Settings::get('dashboard_template') == 'syndron')
    <div class="mb-3">
        <label class="form-label">@lang('users.team_id')</label>
        <select class="single-select"   name="team_id">
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{  isset($supervisor)&&$team->id == $supervisor->team->id ? 'selected' : '' }}> {{ $team->name }} </option>
            @endforeach
        </select>
    </div>

@else
    <select2
        name="team_id"
        id="team_id"
        value="{{$data }}"
        label="@lang('users.team_id')"
        remote-url="{{ route('api.teams.select') }}"
    ></select2>
@endif

@isset($supervisor)
    {{ BsForm::image('avatar')->collection('avatars')->files($supervisor->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

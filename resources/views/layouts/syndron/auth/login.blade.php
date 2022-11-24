<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ Locales::getDir() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('dashboard.auth.login.title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('syndron/assets/images/favicon-32x32.png')}}" type="image/png"/>
    <!--plugins-->
    <link href="{{ asset('syndron/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{ asset('syndron/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{ asset('syndron/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('syndron/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{ asset('syndron/assets/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{ asset('syndron/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('syndron/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('syndron/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link
        href="{{ app()->getLocale() == 'ar' ? asset('syndron/assets/css/app.css') : asset('syndron/assets/css/app-ltr.css')}}"
        rel="stylesheet">
    <link href="{{ asset('syndron/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{  asset('syndron/assets/css/dark-theme.css')}}"/>
    <link rel="stylesheet" href="{{ asset('syndron/assets/css/semi-dark.css')}}"/>
    <link rel="stylesheet" href="{{ asset('syndron/assets/css/header-colors.css')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="PUSHER_APP_KEY" content="{{ config('broadcasting.connections.pusher.key') }}">
    <meta name="PUSHER_APP_CLUSTER" content="{{ config('broadcasting.connections.pusher.options.cluster') }}">
    <meta name="PUSHER_APP_HOST" content="{{ config('broadcasting.connections.pusher.options.host') }}">
    <meta name="PUSHER_APP_PORT" content="{{ config('broadcasting.connections.pusher.options.port') }}">

    <link rel="icon"
          href="{{  optional(Settings::instance('logo')) ? optional(Settings::instance('logo'))->getFirstMediaUrl('logo') : app_favicon() }}"
          type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="mb-4 text-center">
                                    <img
                                        src="{{  optional(Settings::instance('logo')) ? optional(Settings::instance('logo'))->getFirstMediaUrl('logo') : app_favicon() }}"
                                        width="180" alt=""/>
                                </div>
                                <div class="text-center">
                                    <h3 class="">@lang('dashboard.auth.login.title')</h3>
                                </div>

                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress"
                                                   class="form-label">@lang('dashboard.auth.login.email')</label>
                                            <input type="email"
                                                   class="form-control @error('email') border-danger @enderror"
                                                   id="inputEmailAddress"
                                                   value="{{ old('email') }}"
                                                   autofocus
                                                   name="email"
                                                   placeholder="@lang('dashboard.auth.login.email')">
                                            @error('email')<strong class="text-danger"> {{$message}}</strong> @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword"
                                                   class="form-label">@lang('dashboard.auth.login.password')</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                       name="password"
                                                       class="form-control border-end-0 @error('password') border-danger @enderror"
                                                       id="inputChoosePassword" autocomplete="current-password"
                                                       placeholder="@lang('dashboard.auth.login.password')">

                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>

                                            </div>
                                            @error('password')<strong
                                                class="text-danger">{{$message}}</strong> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="flexSwitchCheckChecked" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckChecked">@lang('dashboard.auth.login.remember')</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i> @lang('dashboard.auth.login.submit')
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="{{ asset('syndron/assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{ asset('syndron/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('syndron/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('syndron/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('syndron/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('syndron/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('syndron/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<script src="{{ asset('syndron/assets/js/index.js')}}"></script>
<!--app JS-->
<script src="{{ asset('syndron/assets/js/app.js')}}"></script>
@stack('scripts')
</body>

</html>

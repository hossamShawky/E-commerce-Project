<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>تسجيل دخول الادمن </title>
    <link rel="apple-touch-icon" href="admin/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="admin/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/vendors.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="admin/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="admin/css-rtl/style-rtl.css">
    <!-- END Custom CSS-->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

{{--    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">--}}
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">




<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="assets/front/images/logo.png" alt="LOGO"/>

                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>الدخول للوحة التحكم </span>
                                </h6>


                            </div>

                            <div class="row mr-2 ml-2">
                                @if(Session::has('message'))
                                    <b class="alert alert-danger">{{Session('message')}}</b>
                                @endif

                            </div>
                            <!-- begin alet section-->
{{--                            <div class="row mr-2 ml-2">--}}
{{--                                <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                                        id="type-error">   هناك خطا في بيانات الدحول--}}
{{--                                </button>--}}
{{--                            </div>--}}
                            <!-- end alet section-->

                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" action="/login" method="post"
                                          novalidate>
                                        {{csrf_field() }}
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" name="email"
                                                   class="form-control form-control-lg input-lg"
                                                   id="email" placeholder="أدخل البريد الالكتروني "
                                            value="{{old('email')}}"
                                            >
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>

                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror

                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                   class="form-control form-control-lg input-lg"
                                                   id="user-password"
                                                   placeholder="أدخل كلمة المرور">
                                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            <span class="text-danger"> </span>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember_me" id="remember-me"
                                                           class="chk-remember">
                                                    <label for="remember-me">تذكر دخولي</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                class="ft-unlock"></i>
                                            دخول
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="admin/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="admin/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="admin/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="admin/js/core/app-menu.js" type="text/javascript"></script>
<script src="admin/js/core/app.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="admin/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script>

</script>
</body>
</html>

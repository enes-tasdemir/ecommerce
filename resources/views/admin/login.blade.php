<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Bootstrap demo</title>
    <!--favicon-->
    <link rel="icon" href="/admin_files/assets/images/favicon-32x32.png" type="image/png">

    <!--plugins-->
    <link href="/admin_files/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin_files/assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_files/assets/plugins/metismenu/mm-vertical.css">
    <!--bootstrap css-->
    <link href="/admin_files/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="/admin_files/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/admin_files/sass/main.css" rel="stylesheet">
    <link href="/admin_files/sass/dark-theme.css" rel="stylesheet">
    <link href="/admin_files/sass/responsive.css" rel="stylesheet">

</head>

<body class="bg-login">


    <!--authentication-->

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card rounded-4">
                    <div class="card-body p-5">
                        <img src="/admin_files/assets/images/logo1.png" class="mb-4" width="145" alt="">
                        <h4 class="fw-bold">@lang('admin_login.title')</h4>
                        <p class="mb-0">@lang('admin_login.description')</p>

                        <div class="form-body my-4">
                            <form class="row g-3" action="{{ route('admin.login.post') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">@lang('admin_login.email')</label>
                                    <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="@lang('admin_login.email')">
                                    <div err-name="email"></div>
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">@lang('admin_login.password')</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0"
                                            id="inputChoosePassword" placeholder="@lang('admin_login.password')">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                    <div err-name="password"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="remember_me" value="1">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">@lang('admin_login.remember_me')</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">@lang('admin_login.login')</button>
                                    </div>
                                </div>
                                <div err-name="error"></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>

    <!--authentication-->


    <!--plugins-->
    <script src="/admin_files/assets/js/jquery.min.js"></script>
    <script src="/js/form_post.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>

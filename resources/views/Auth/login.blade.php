<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('Admin/images/favicon.ico') }}">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('Admin/css/core/libs.min.css') }}">

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/hope-ui.min.css?v=4.0.0') }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/custom.min.css?v=4.0.0') }}">

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/dark.min.css') }}">

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/customizer.min.css') }}">

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/rtl.min.css') }}">

    <!-- Custom styles -->
    <style>
        .bg-cover {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                                </svg>
                                            </div>
                                            <div class="logo-mini">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <!--logo End-->
                                        <h4 class="logo-title ms-3">Monitoring Apps</h4>
                                    </a>
                                    <h2 class="mb-2 text-center">Login</h2>
                                    <p class="text-center">Selamat Datang Dari Aplikasi Monitoring</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg">
                        <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                                <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                                <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                                <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <div class="bg-cover" style="background-image: url('{{ asset('Admin/images/auth/rsi-a-yani.jpg') }}');"></div>
                </div>
            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('Admin/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('Admin/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('Admin/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('Admin/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('Admin/js/charts/dashboard.js') }}" ></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('Admin/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('Admin/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('Admin/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('Admin/js/plugins/form-wizard.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('Admin/js/hope-ui.js') }}" defer></script>
</body>
</html>

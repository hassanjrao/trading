<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css">

    <link rel="stylesheet" href="{{ asset('front-assets/css/compare_style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>
        @yield('page-title') - {{ config('app.name') }}
    </title>

    <style>
        * {
            font-weight: bold !important;
        }
    </style>

    @yield('styles')
    @livewireStyles

</head>

<body>
    <header class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-9">
                    {{-- <div > --}}
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('front-assets/images/logofull 1.png') }}">
                    </a>
                    {{-- </div> --}}
                </div>
                <div class="col-md-3  ">
                    <form>
                        <div class="search">
                            <span class="fa fa-search"></span>
                            <input type="text" placeholder="Search 'Apex Trader Funding'">

                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-12">
                    <div class="navbar">

                        <div class="hamburger" onclick="toggleMenu()">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <div class="menu" id="menu">
                            <div class="menu-item">
                                <a class="menu-button" href="{{ route('front.compare') }}">Compare</a>
                            </div>
                            <div class="dropdown">
                                <button class="menu-button">Tools <i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></button>
                                <div class="dropdown-content">

                                    <a href="{{ route('front.map') }}">The Map</a>

                                    <a href="{{ route('front.review_report') }}">Review</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="menu-button">Top Lists <i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{ route('firms.most-voted') }}">Most Voted</a>
                                    <a href="{{ route('firms.index') }}">Top Firms</a>
                                </div>
                            </div>
                            <div class="menu-item">
                                @auth
                                    <a class="menu-button" href="{{ route('profile.index') }}"><img
                                            src="https://img.icons8.com/ios-glyphs/30/ffffff/user.png" alt="My Account">My
                                        Account</a>
                                @endauth
                                @guest

                                    <a class="menu-button" href="{{ route('register') }}"><img
                                            src="https://img.icons8.com/ios-glyphs/30/ffffff/user.png" alt="Sign In"> Sign
                                        In</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Page Title -->

    @yield('content')



    <!-- Footer -->
    <div class="footer_height"></div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8 col-12">
                    <div class="footer_div">
                        <div class="div-56">
                            <a href="">Privacy Policy</a>
                            <a href=""> Terms Of Use</a>
                            <a href=""> Copyright @PropFirmMap 2024</a>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
    </footer>
</body>
<!-- End Footer -->

<!--  End Sign Up Form -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/laravel.app.js') }}"></script>

<script>
    var currentStep = 1;
    var totalSteps = 3;

    function showStep(step) {
        for (var i = 1; i <= totalSteps; i++) {
            document.getElementById('step' + i).classList.remove('active');
        }
        document.getElementById('step' + step).classList.add('active');
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }



    function toggleMenu() {
        var menu = document.getElementById("menu");
        if (menu.style.display === "flex") {
            menu.style.display = "none";
        } else {
            menu.style.display = "flex";
        }
    }
</script>

@stack('scripts')

@livewireScripts

@include('sweetalert::alert')

</html>

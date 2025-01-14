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

    {{-- fav icon --}}
    <link rel="icon" href="{{ asset('media/fav.png') }}" type="image/gif" sizes="16x16">

    <title>
        @yield('page-title') - {{ config('app.name') }}
    </title>

    <style>
        * {
            font-weight: bold !important;
        }

        .img_data {
            width: 60px !important;
        }

        .about_img {
            width: 32px !important;
        }

        a {
            color: black;
        }

        .btn-block,
        .frmbtn {
            color: white !important;
        }

        a:hover {
            color: none;
            text-decoration: none
        }


        @media (max-width: 576px) {
            .logo {
                position: relative;
                top: -32px;
                z-index: 222 !important;
            }

            .logo img {
                width: 12rem !important;
            }
        }

        @media (max-width: 768px) {
            .logo {
                position: relative;
                top: -32px;
                z-index: 222 !important;
            }

            .logo img {
                width: 15rem !important;
            }
        }


        .search-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        #searchInput {
            width: 100%;
            border-radius: 50px;
            padding: 10px 20px;
            border: 2px solid white;
            background-color: white;
            font-size: 16px;
            color: #333;
            z-index: 2;
        }

        .suggestions {
            position: absolute;
            width: 92%;
            background-color: white;
            border: none;
            border-radius: 10px;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            top: 64px;
            left: 16px;
            z-index: 10000;
        }

        .suggestions li {
            padding: 10px;
            cursor: pointer;
        }

        .suggestions li:hover {
            background-color: #f1f1f1;
        }

        .search-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7ea6f7;
            /* The background color as shown in your image */
            padding: 20px;
            border-radius: 15px;
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #333;
        }
    </style>


    @php
        $randomFirm = \App\Models\Firm::inRandomOrder()->first();
        $placeHolderText = "Try Searching '" . $randomFirm->name . "'";

        $placeHolderTextFontSize = '1rem !important';

        if (strlen($placeHolderText) > 10) {
            $placeHolderTextFontSize = '11px !important';
        }

        if (strlen($placeHolderText) > 34) {
            $placeHolderTextFontSize = '9px !important';
        }

    @endphp

    <style>
        /* for small devices */

        @media (max-width: 576px) {


            #searchPlaceholder::placeholder {
                font-size: {{ $placeHolderTextFontSize }};
            }

        }
    </style>

    @yield('styles')
    @livewireStyles

</head>

<body>
    <header class="pt-5">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-lg-3">
                    {{-- <div > --}}
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('front-assets/images/logofull 1.png') }}">
                    </a>
                    {{-- </div> --}}
                </div>
                @if (!request()->is('/'))
                    <div class="col-lg-3">

                        <form>
                            <div class="search d-flex align-items-center"
                                style="padding: 1px 15px !important; width:90%">
                                <span class="fa fa-search"></span>
                                <input type="text" id="searchInput" placeholder="{{ $placeHolderText }}">
                                <ul id="suggestionList" class="suggestions list-unstyled d-none"></ul>

                            </div>

                        </form>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="navbar">

                        <div class="hamburger" onclick="toggleMenu()">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <div class="menu" id="menu">
                            <div class="menu-item">
                                <a class="menu-button" href="{{ route('offers.index') }}">Offers</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-button" href="{{ route('compare.index') }}">Compare</a>
                            </div>
                            <div class="dropdown">
                                <button class="menu-button">Tools <i class="fa fa-chevron-down"
                                        aria-hidden="true"></i></button>
                                <div class="dropdown-content">

                                    <a href="{{ route('front.map') }}">The Map</a>

                                    <a href="{{ route('review-report.index') }}">Review</a>
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
                                    <a class="menu-button" style="padding-left: 4px !important"
                                        href="{{ route('profile.index') }}"><img
                                            src="https://img.icons8.com/ios-glyphs/30/ffffff/user.png" alt="My Account">My
                                        Account</a>
                                @endauth
                                @guest

                                    <a class="menu-button" href="{{ route('login') }}"><img
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

<script src="{{ asset('js/app.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

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


<script>
    const searchInput = document.getElementById('searchInput');
    const suggestionList = document.getElementById('suggestionList');


    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();

        axios.get('/firms/search', {
                params: {
                    search: query
                }
            })
            .then(response => {
                console.log('response', response);

                let firms = response.data.data.firms;

                if (firms.length > 0) {
                    suggestionList.innerHTML = '';

                    suggestionList.classList.remove('d-none');

                    firms.forEach(firm => {
                        let result = document.createElement('div');
                        result.classList.add('d-flex', 'align-items-center', 'p-2',
                            'border-bottom');

                        let anchor = document.createElement('a');
                        anchor.href = '/firms/' + firm.slug;

                        let img = document.createElement('img');
                        img.src = firm.logo_url;
                        img.alt = firm.name;
                        // add img size style
                        img.style.width = '50px';
                        img.style.height = '50px';
                        // add margin right
                        img.style.marginRight = '10px';
                        result.appendChild(img);

                        let name = document.createElement('div');
                        name.innerText = firm.name;
                        result.appendChild(name);

                        anchor.appendChild(result);

                        suggestionList.appendChild(anchor);


                    });
                } else {

                    suggestionList.classList.add('d-none');

                }

            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                // hide loader
            });

    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.position-relative')) {
            suggestionList.classList.add('d-none');
        }
    });
</script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    function copytoClipBoard(e) {
        const copyButton = e;



        // Copy button content to clipboard
        const textToCopy = copyButton.textContent.trim();
        navigator.clipboard.writeText(textToCopy).then(() => {

        }).catch(err => {
            console.error('Error copying text: ', err);
        });
    }
</script>

@stack('scripts')

@livewireScripts

@include('sweetalert::alert')

</html>

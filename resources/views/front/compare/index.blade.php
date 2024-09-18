@extends('layouts.front')

@section('page-title', 'Compare')

@section('styles')


    <style>
        /* placeholder color */
        input[type='search']::-webkit-input-placeholder {
            color: #ccc !important;
        }


        .checkBtn {
            /* width: 8rem; */
            color: #7489e1 !important;
            transition: background-color 0.3s, color 0.3s;
            border: 4px solid transparent;
            background: linear-gradient(to right, #FBF5F3, #FBF5F3), linear-gradient(to right, #7a95f8, #6453ca);
            background-clip: padding-box, border-box;
            background-origin: padding-box, border-box;
            cursor: pointer;
            font-family: 'Metropolis', sans-serif;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            vertical-align: middle;
            text-align: center;
            white-space: nowrap;
            display: inline-block;
            border-radius: 8px;
            margin-right: 10px;
        }

        .w-10rem {
            width: 10rem;
        }

        .checkBtn.active {
            background: linear-gradient(100deg, #7A95F8 0%, #6453CA 100%);
            color: #FBF5F3 !important;
            border: none;
            padding: .65rem .75rem;
        }

        .checkBtn.deactive {
            color: #7a95f8 !important;
            transition: background-color 0.3s, color 0.3s !important;
            border: 4px solid transparent !important;
            background: linear-gradient(to right, #FBF5F3, #FBF5F3), linear-gradient(to right, #7a95f8, #6453ca) !important;
            background-clip: padding-box, border-box !important;
            background-origin: padding-box, border-box !important;
        }
    </style>

@endsection

@section('content')

    <br><br>

    <h2 class="page_title pt-4 text-center text-white">Find Your Best Plan</h2>

    <!-- End Page Title -->


    <!-- Sign Up Form -->

    <div class="container  mt-2 pt-2 ">

        <div class="tab-content" id="myTabContent">
            <form action="{{ route('compare.index') }}" method="GET" id="filterForm">
                <input type="hidden" name="search" value="true">
                <div class="container">
                    <div class="section-title">Asset Type</div>
                    <div class="d-flex justify-content-start" data-toggle="buttons">
                        @foreach ($assetTypes as $assetType)
                            <button type="button"
                                class="checkBtn w-10rem {{ in_array($assetType->id, $selectedAssetTypes) ? 'active' : '' }}"
                                id="assetType-{{ $assetType->id }}"
                                onclick="filterClicked('assetType',{{ $assetType->id }})">
                                {{ $assetType->name }}
                            </button>
                        @endforeach
                    </div>

                    <div class="section-title">Account Size</div>
                    <div class="d-flex justify-content-start" data-toggle="buttons">
                        @foreach ($top7AccountSizes as $accountSize)
                            <button type="button"
                                class="checkBtn w-10rem {{ in_array($accountSize->id, $selectedAccountSizes) ? 'active' : '' }}"
                                id="accountSize-{{ $accountSize->id }}"
                                onclick="filterClicked('accountSize',{{ $accountSize->id }})">
                                {{ $accountSize->size }}
                            </button>
                        @endforeach
                    </div>
                    {{-- @if ($otherAccountSizes->count() > 0)
                        <div class="section-title">See More </div>
                        <div class="btn-group btn-group-toggle d-flex flex-wrap mt-3" data-toggle="buttons">
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 2K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 6K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 15K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 20K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 30K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 40K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 60K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                120K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                240K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                250K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                400K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                500K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 1M
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 2M
                            </label>
                        </div>
                    @endif --}}

                    <div class="section-title">Steps</div>
                    <div class="d-flex justify-content-start" data-toggle="buttons">

                        @foreach ($steps as $step)
                            <button type="button"
                                class="checkBtn w-10rem {{ in_array($step->id, $selectedSteps) ? 'active' : '' }}"
                                id="step-{{ $step->id }}" onclick="filterClicked('step',{{ $step->id }})">
                                {{ $step->name }}
                            </button>
                        @endforeach
                    </div>

                    <div class="section-title">Extra Filters</div>
                    <div class="d-flex justify-content-start" data-toggle="buttons">

                        @foreach ($technologies as $technology)
                            <button type="button"
                                class="checkBtn w-10rem {{ in_array($technology->id, $selectedTechnologies) ? 'active' : '' }}"
                                id="technology-{{ $technology->id }}"
                                onclick="filterClicked('technology',{{ $technology->id }})">
                                {{ $technology->name }}
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-primary btn-block" type="submit"
                            style="background-color: #7A95F8; border: none;width: 30%;">Search</button>
                    </div>
                </div>
            </form>

        </div>





    </div>

    @if ($firmChallenges->count() <= 0)
        <div class="container">
            <div class="tab-content" id="myTabContent" style="min-height: 0px">
                <h2 class="text-center">
                    No results found
                </h2>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="search-container">
                <div class="input-group">
                    <span class="search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001a1.007 1.007 0 0 0-.11.11l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.11-.11zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>

                </div>
                <br>
            </div>
            <div class="content-3" id="">
                <div class="container-fluid mt-5 tabss">
                    <div class="table-responsivess">

                        <table class="table table-bordered nowrap" id="example"
                            style="width:100%;     border-collapse: collapse !important;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Firm</th>
                                    <th>Price</th>
                                    <th>Account Size</th>
                                    <th>Profit Target</th>
                                    <th>Max. Daily Loss</th>
                                    <th>Max. Total Drawdown</th>
                                    <th>Years Established</th>
                                    <th>Technology</th>
                                    <th>Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($firmChallenges as $challenge)
                                    <tr>
                                        <td>
                                            <a href="{{ route('firms.show', $challenge->firm->id) }}">
                                                <img class="img_data" src="{{ $challenge->firm->logo_url }}">
                                                <p class="text_name">

                                                    {{ $challenge->firm->name }}
                                                </p>
                                            </a>
                                        </td>
                                        <td>
                                            <p class="wsx" style="font-size: 15px; margin-bottom: 0px">
                                                {{ config('app.currency_symbol') . $challenge->before_price }}
                                            </p>
                                            <p class="orginal" style="font-size: 20px; margin-bottom: 1px">
                                                {{ config('app.currency_symbol') . $challenge->actual_price }}
                                            </p>
                                            @if ($challenge->actual_price_note)
                                                <span style="font-size: 10px">
                                                    {{ $challenge->actual_price_note }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $challenge->accountSize->size }} ({{ $challenge->step->name }})</td>
                                        <td>
                                            @foreach ($challenge->firmChallengeDetails as $detail)
                                                {{ 'P' . $loop->iteration . ': ' . $detail->profit_target }}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($challenge->firmChallengeDetails as $detail)
                                                {{ 'P' . $loop->iteration . ': ' . $detail->max_daily_loss }}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>

                                            @foreach ($challenge->firmChallengeDetails as $detail)
                                                {{ 'P' . $loop->iteration . ': ' . $detail->max_total_drawdown }}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($challenge->firm->established)->format('M Y') }}
                                            <br><img class="img_data img-fluid"
                                                style="width: 3rem !important; margin:5px 0px;"
                                                src="{{ $challenge->firm->country->flag_url }}"><br><span class="c_name">
                                                {{ $challenge->firm->country->name }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $challenge->firm->technology->name }}
                                        </td>
                                        <td class="r_data">
                                            {{ $challenge->rewards }}
                                            <img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    @endif



@endsection

@push('scripts')
    <script>
        var assetTypes = [];
        var accountSizes = [];
        var steps = [];
        var technologies = [];

        // get assetTypes from url string
        var urlParams = new URLSearchParams(window.location.search);
        var assetTypesParam = urlParams.get('asset_types');
        var accountSizesParam = urlParams.get('account_sizes');
        var stepsParam = urlParams.get('steps');
        var technologiesParam = urlParams.get('technologies');

        if (assetTypesParam) {
            assetTypes = assetTypesParam.split(',').map(function(item) {
                return parseInt(item, 10);
            });
        }

        if (accountSizesParam) {
            accountSizes = accountSizesParam.split(',').map(function(item) {
                return parseInt(item, 10);
            });
        }

        if (stepsParam) {
            steps = stepsParam.split(',').map(function(item) {
                return parseInt(item, 10);
            });
        }

        if (technologiesParam) {
            technologies = technologiesParam.split(',').map(function(item) {
                return parseInt(item, 10);
            });
        }


        $(document).ready(function() {
            $("#example").DataTable({
                aaSorting: [],
                // responsive: true,
                scrollCollapse: true,
                scrollX: '200px',

                // columnDefs: [{
                //         responsivePriority: 1,
                //         targets: 0
                //     },
                //     {
                //         responsivePriority: 2,
                //         targets: -1
                //     }
                // ]
            });

            $(".dataTables_filter input")
                .attr("placeholder", "Search for a company or challenge from the list")
                .css({
                    width: "300px",
                    display: "inline-block",
                    color: "#6F6F6F !important"
                });

            $('[data-toggle="tooltip"]').tooltip();


            // add click event to custom-radio-label

        });

        /* add flex-column-reverse class in a div which is after div with id=example_wrapper */
        $("#example_wrapper").next().addClass("d-flex flex-column-reverse");

        function filterClicked(type, id) {
            if (type == 'assetType') {

                // if exists remove active class and remove from array
                if (assetTypes.includes(id)) {
                    $('#assetType-' + id).removeClass('active');
                    // add deactive class
                    $('#assetType-' + id).addClass('deactive');

                    assetTypes = assetTypes.filter(function(value, index, arr) {
                        return value != id;
                    });

                    console.log('assetTypes', assetTypes);
                    return;
                }

                $('#assetType-' + id).removeClass('deactive');
                $('#assetType-' + id).addClass('active');


                assetTypes.push(id);

                console.log('assetTypes', assetTypes);

            }

            if (type == 'accountSize') {

                // if exists remove active class and remove from array
                if (accountSizes.includes(id)) {
                    $('#accountSize-' + id).removeClass('active');
                    // add deactive class
                    $('#accountSize-' + id).addClass('deactive');

                    accountSizes = accountSizes.filter(function(value, index, arr) {
                        return value != id;
                    });

                    console.log('accountSizes', accountSizes);
                    return;
                }

                $('#accountSize-' + id).removeClass('deactive');
                $('#accountSize-' + id).addClass('active');

                accountSizes.push(id);
            }

            if (type == 'step') {

                // if exists remove active class and remove from array
                if (steps.includes(id)) {
                    $('#step-' + id).removeClass('active');
                    // add deactive class
                    $('#step-' + id).addClass('deactive');

                    steps = steps.filter(function(value, index, arr) {
                        return value != id;
                    });

                    console.log('steps', steps);
                    return;
                }

                $('#step-' + id).removeClass('deactive');
                $('#step-' + id).addClass('active');

                steps.push(id);
            }

            if (type == 'technology') {

                // if exists remove active class and remove from array
                if (technologies.includes(id)) {
                    $('#technology-' + id).removeClass('active');
                    // add deactive class
                    $('#technology-' + id).addClass('deactive');

                    technologies = technologies.filter(function(value, index, arr) {
                        return value != id;
                    });

                    console.log('technologies', technologies);
                    return;
                }

                $('#technology-' + id).removeClass('deactive');
                $('#technology-' + id).addClass('active');

                technologies.push(id);
            }

            // console.log('accountSizes', accountSizes);
            // console.log('steps', steps);
        }

        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let queryString = '?';

            if (assetTypes.length > 0) {
                queryString += 'asset_types=' + assetTypes.join(',') + '&';
            }

            if (accountSizes.length > 0) {
                queryString += 'account_sizes=' + accountSizes.join(',') + '&';
            }

            if (steps.length > 0) {
                queryString += 'steps=' + steps.join(',') + '&';
            }

            if (technologies.length > 0) {
                queryString += 'technologies=' + technologies.join(',') + '&';
            }

            console.log('queryString', queryString);

            window.location.href = '{{ route('compare.index') }}' + queryString;
        });
    </script>
@endpush

@extends('layouts.front')

@section('content')
    <!-- Page Title -->

    <h2 class="page_title pt-4 text-center text-white">Find Your Best Plan</h2>


    <div class="container  mt-2 pt-4 ">

        <div class="tab-content" id="myTabContent">
            <div class="container">
                <div class="section-title">Asset Type</div>
                <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                    <label class="btn custom-radio-label">
                        <input type="radio" name="asset-type" class="custom-radio-input" autocomplete="off">
                        Futures</label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="asset-type" class="custom-radio-input" autocomplete="off"> CFD
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="asset-type" class="custom-radio-input" autocomplete="off"> Stocks
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="asset-type" class="custom-radio-input" autocomplete="off"> Crypto
                    </label>
                </div>

                <div class="section-title">Account Size</div>
                <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 5K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 10K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 25K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 50K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 100K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 200K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 300K
                    </label>
                </div>
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
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 120K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 240K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 250K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 400K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 500K
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 1M
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 2M
                    </label>
                </div>

                <div class="section-title">Steps</div>
                <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                    <label class="btn custom-radio-label">
                        <input type="radio" name="steps" class="custom-radio-input" autocomplete="off"> Instant
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="steps" class="custom-radio-input" autocomplete="off"> 1-Step
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="steps" class="custom-radio-input" autocomplete="off"> 2-Step
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="steps" class="custom-radio-input" autocomplete="off"> 3-Step
                    </label>
                </div>

                <div class="section-title">Extra Filters</div>
                <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                    <label class="btn custom-radio-label">
                        <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off"> News
                        Trading Allowed
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off"> Only
                        White-Label Tech.
                    </label>
                    <label class="btn custom-radio-label">
                        <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off"> Only
                        Proprietary Tech.
                    </label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary btn-block"
                        style="background-color: #7489e1; border: none;width: 30%;">Search</button>
                </div>
            </div>

            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                <form class="mt-3">
                    <div class="form-group">
                        <label for="featuresInput1">features Input 1</label>
                        <input type="text" class="form-control" id="featuresInput1" placeholder="Enter something">
                    </div>
                    <div class="form-group">
                        <label for="featuresInput2">features Input 2</label>
                        <input type="text" class="form-control" id="featuresInput2" placeholder="Enter something">
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="cfd" role="tabpanel" aria-labelledby="cfd-tab">
                <form class="mt-3">
                    <div class="form-group">
                        <label for="cfdInput1">cfd Input 1</label>
                        <input type="text" class="form-control" id="cfdInput1" placeholder="Enter something">
                    </div>
                    <div class="form-group">
                        <label for="cfdInput2">cfd Input 2</label>
                        <input type="text" class="form-control" id="cfdInput2" placeholder="Enter something">
                    </div>
                </form>
            </div>
        </div>



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

    </div>
    <div class="container-fluid">
        <div class="content-3" id="">
            <div class="container-fluid mt-5 tabss">
                <div class="table-responsive">

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
                            <tr>
                                <td><img class="img_data" src="{{  asset('front-assets/images/1.png')}}"></td>
                                <td>
                                    <p class="wsx">$41.50</p>$31.50
                                </td>
                                <td>5K (2-Step)</td>
                                <td>P1: 8% ($400)<br>P2: 5% ($250)</td>
                                <td>P1: 5% ($250)<br>P2: 5% ($250)<br>Funded: 12% ($600)</td>
                                <td>P1: 10% ($500)<br>P2: 8% ($400)</td>
                                <td>June 2022<br><img class="img_data" src="{{  asset('front-assets/images/united-states.png')}}"></td>
                                <td>White-Label</td>
                                <td>5 Points<img class="img_data" src="{{  asset('front-assets/images/922.png')}}" style="width: 50px;">
                                </td>
                            </tr>
                            <tr>
                                <td><img class="img_data" src="{{  asset('front-assets/images/logo.png')}}"></td>
                                <td>
                                    <p class="wsx">$41.50</p>$62.5<p class="wsxx">Mounthly</p>
                                </td>
                                <td>50K</td>
                                <td>$3000</td>
                                <td>None</td>
                                <td>$2000</td>
                                <td>August 2023 <br><img class="img_data" src="{{  asset('front-assets/images/france.png')}}"></td>
                                <td>Proprietary</td>
                                <td>5 Points<img class="img_data" src="{{  asset('front-assets/images/922.png')}}" style="width: 50px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                aaSorting: [],
                // responsive: true,

                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });

            $(".dataTables_filter input")
                .attr("placeholder", "Search here...")
                .css({
                    width: "300px",
                    display: "inline-block"
                });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush

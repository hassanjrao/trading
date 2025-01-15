@extends('layouts.front')

@section('content')
    <!-- <h2 class="page_title pt-4 text-center text-white">Find Your Best Plan</h2> -->
    <div class="container mt-4 pt-4">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="pro">
                    <img src="{{ asset('front-assets/images/logo.png') }}" width="100%"> <br>
                    <h4 class="p_name_1">
                        <b>Phoenix Trader Funding</b>
                    </h4><img class="img_data" src="{{ asset('front-assets/images/france.png') }}">
                </div>

            </div>
            <div class="col-md-9 col-12">
                <div class="checkout">
                    <p class="order_summry"> Order Summary</p>
                    <div class="main_summry">
                        <div class="order_summry_section d-flex">
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Account Type
                                </p>
                                <div class="detaits_name">
                                    <b>5K</b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Steps
                                </p>
                                <div class="detaits_name">
                                    <b>2-step</b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Profit Target
                                </p>
                                <div class="detaits_name">
                                    <b>8% ($400)</b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Max. Daily Loss
                                </p>
                                <div class="detaits_name">
                                    <b>8% ($400)</b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Max. Total Drawdown
                                </p>
                                <div class="detaits_name">
                                    <b>8% ($400)</b>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-3">
                        <input type="email" class="form-control search_email" placeholder=" e.g example@gmail.com">
                    </div>
                    <div class="order_summry_section d-flex mt-3">
                        <div class="section_order_details">
                            <p class="sec_title_order">
                                Price
                            </p>
                            <div class="detaits_name">
                                <b>$37.5 <span>$50.0</span></b>

                            </div>
                        </div>
                    </div>
                    <p class="sec_title_order mt-3">
                        Having a doubt?
                    </p>
                    <button class="btn btn-primary choose_btn mt-3" id="toggleButton"> Choose another</button>
                    <div class="row mt-3 " id="toggleDiv">
                        <div class="col-md-8 chose_option ml-2">
                            <ul class="nav nav-tabs justify-content-center" id="checkmyTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all"
                                        role="tab" aria-controls="home" aria-selected="true">Instant</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab"
                                        aria-controls="features" aria-selected="false">1-Step</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cfd-tab" data-toggle="tab" href="#cfd" role="tab"
                                        aria-controls="cfd" aria-selected="false">2-Step</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                        aria-controls="review" aria-selected="false">3-Step</a>
                                </li>
                            </ul>
                            <div class="tab-content checkout_tabs" id="checkmyTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel"
                                    aria-labelledby="all-tab">
                                    <p class="sec_title_order mt-3 ">
                                        List of All the Instant Challenges for MyFunded Fx
                                    </p>

                                    <br>

                                    {{-- <span class="does_not_belong mt-3 text-white"> This Firm does not belogn any
                                        challanges</span> --}}

                                </div>
                                <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                    <p class="sec_title_order mt-3 ">
                                        List of All the Instant Challenges for MyFunded Fx
                                    </p>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="5k"
                                                    name="5k" required>
                                                <label class="checkbox-label sec_title_order" for="5k">5K</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="10k"
                                                    name="10k" required>
                                                <label class="checkbox-label sec_title_order" for="10k">10K</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="15k"
                                                    name="15k" required>
                                                <label class="checkbox-label sec_title_order" for="15k">15K</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="20k"
                                                    name="20k" required>
                                                <label class="checkbox-label sec_title_order" for="20k">20K</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="25k"
                                                    name="25k" required>
                                                <label class="checkbox-label sec_title_order" for="25k">25K</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="30k"
                                                    name="30k" required>
                                                <label class="checkbox-label sec_title_order" for="30k">30k</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="5k_max"
                                                    name="5k_max" required>
                                                <label class="checkbox-label sec_title_order" for="5k_max">5K
                                                    max</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="10k_max"
                                                    name="10k_max" required>
                                                <label class="checkbox-label sec_title_order" for="10k_max">10K
                                                    max</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="15k_max"
                                                    name="15k_max" required>
                                                <label class="checkbox-label sec_title_order" for="15k_max">15K
                                                    max</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="20k_max"
                                                    name="20k_max" required>
                                                <label class="checkbox-label sec_title_order" for="20k_max">20K
                                                    max</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="25k_max"
                                                    name="25k_max" required>
                                                <label class="checkbox-label sec_title_order" for="25k_max">25K
                                                    max</label>
                                            </div>
                                            <div class="form-group form-check  pl-0 checks_tabs mb-3">
                                                <input type="checkbox" class="form-check-input" id="30k_max"
                                                    name="30k_max" required>
                                                <label class="checkbox-label sec_title_order" for="30k_max">30k
                                                    max</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cfd" role="tabpanel" aria-labelledby="cfd-tab">
                                    <!-- CFD Tab Content -->
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!-- Reviwe Report -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group form-check mt-4 pl-0">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                        <label class="checkbox-label sec_title_order" for="terms">I accept the Terms of Service &
                            Privacy Policy</label>
                    </div>
                    <div class="form-group form-check pl-0">
                        <input type="checkbox" class="form-check-input" id="terms2" name="terms2" required>
                        <label class="checkbox-label sec_title_order" for="terms2">I accept the Terms of Service &
                            Privacy Policy</label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <button class="btn btn-primary btn_checkout">Proceed to checkout <i
                                    class="fa fa-chevron-right" aria-hidden="true"></i></button>
                            {{-- <p class="sec_title_order text-center">
                                This Purchase will give you 5 reward points
                            </p> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Page  -->
@endsection

@push('scripts')
    <script>
            document.getElementById('toggleButton').addEventListener('click', function() {
        var div = document.getElementById('toggleDiv');
        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });

    </script>
@endpush

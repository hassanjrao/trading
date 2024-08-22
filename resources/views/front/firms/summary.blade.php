@extends('layouts.front')

@section('page-title', 'Checkout')

@section('styles')

    <link rel="stylesheet" href="{{ asset('front-assets/css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/checkout.css') }}">

@endsection

@section('content')
    <br><br>
    <!-- <h2 class="page_title pt-4 text-center text-white">Find Your Best Plan</h2> -->
    <div class="container mt-4 pt-4">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="pro">
                    <img src="{{ $firm->logo_url }}" width="80%"> <br>
                    <h5 class="p_name_1">
                        <b>{{ $firm->name }}</b>
                    </h5>
                    <a href="{{ $firm->url }}" class="p_des">{{ $firm->url }}</a><br>
                    <img class="img_data img-fluid" style="width: 3rem !important" src="{{ $firm->country->flag_url }}">
                </div>

            </div>
            <div class="col-md-9 col-12">
                <div class="checkout">
                    <p class="order_summry"> Order Summary</p>
                    <div class="main_summry">
                        <div class="order_summry_section d-flex first_r">
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Account Type
                                </p>
                                <div class="detaits_name">
                                    <b>
                                        {{ $firmChallenge->accountSize->size }}
                                    </b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Steps
                                </p>
                                <div class="detaits_name">
                                    <b>
                                        {{ $firmChallenge->step->name }}
                                    </b>
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Profit Target
                                </p>
                                <div class="detaits_name">
                                    @foreach ($firmChallenge->firmChallengeDetails as $detail)
                                        <span class="mb-2">
                                            <b>
                                                {{ $detail->profit_target }}
                                            </b>
                                            <br>
                                        </span>
                                    @endforeach

                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Max. Daily Loss
                                </p>
                                <div class="detaits_name">

                                    @foreach ($firmChallenge->firmChallengeDetails as $detail)
                                        <b>{{ $detail->max_daily_loss }}</b>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="section_order_details">
                                <p class="sec_title_order">
                                    Max. Total Drawdown
                                </p>
                                <div class="detaits_name">

                                    @foreach ($firmChallenge->firmChallengeDetails as $detail)
                                        <b>{{ $detail->max_total_drawdown }}</b>
                                        <br>
                                    @endforeach

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
                                <b>{{ config('app.currency_symbol') . $firmChallenge->actual_price }}
                                    <span>{{ config('app.currency_symbol') . $firmChallenge->before_price }}</span></b>

                            </div>
                        </div>
                    </div>
                    <p class="sec_title_order mt-3">
                        Having a doubt?
                    </p>
                    <button class="btn btn-primary choose_btn mt-3" id="toggleButton"> Choose another</button>
                    <div class="row mt-3 " id="toggleDiv">
                        <div class="col-md-8 chose_option ml-2">
                            <ul class="nav nav-tabs justify-content-left" id="checkmyTab" role="tablist">

                                @foreach ($steps as $step)
                                    <li class="nav-item">
                                        <a class="nav-link active" id="step{{ $step->id }}" data-toggle="tab"
                                            href="#step{{ $step->id }}" role="tab" aria-controls="home"
                                            aria-selected="true">
                                            {{ $step->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="tab-content checkout_tabs" id="checkmyTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel"
                                    aria-labelledby="all-tab">
                                    <p class="sec_title_order mt-3 ">
                                        List of All the Instant Challenges for MyFunded Fx
                                    </p>

                                    <br>
                                    <p>
                                        <span class="does_not_belong mt-3 text-white"> This Firm dose not have instant
                                            challenges.</span>
                                    </p>
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
                        <label class="checkbox-label sec_title_order" for="terms">I would like to receive exclusive
                            offers and valuable updates.</label>
                    </div>
                    <div class="form-group form-check pl-0">
                        <input type="checkbox" class="form-check-input" id="terms2" name="terms2" required>
                        <label class="checkbox-label sec_title_order" for="terms2">By checking out, I agree to this
                            website's Terms of Service and Privacy Policy.</label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <button class="btn btn-primary btn_checkout">Proceed to checkout <i
                                    class="fa fa-chevron-right" aria-hidden="true"></i></button>
                            <p class="sec_title_order text-center" style="font-size: 11px;">
                                This Purchase will give you <strong style="color: #747474; font-size: 14px;">5</strong>
                                reward points
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

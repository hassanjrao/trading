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
                    <a href="{{ $firm->checkout_link }}" class="p_des" style="font-size: 12px">{{ $firm->url }}</a><br>
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

                    <div class="mt-3 row">
                        <div class="col-lg-5">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control search_email" placeholder=" e.g example@gmail.com"
                                style="width: 96%">
                        </div>
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

                    <div id="mapVue">
                        <summary-choose-another :steps='{{ $steps }}' :firm='{{ $firm }}' />
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
                            <a href="{{ $firm->checkout_link }}" class="btn btn-primary btn_checkout">Proceed to checkout
                                <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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

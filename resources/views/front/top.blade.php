@extends('layouts.front')

@section('content')
    <!-- Page Title -->

    <h2 class="page_title pt-4 text-center text-white">Top Firm</h2>
    <p class="text-center text-white">Here is the list of top-ranked firms by their reviews</p>

    <!-- End Page Title -->


    <!-- Sign Up Form -->

    <div class="container  mt-2 pt-4 ">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home"
                    aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab"
                    aria-controls="features" aria-selected="false">Futures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cfd-tab" data-toggle="tab" href="#cfd" role="tab" aria-controls="cfd"
                    aria-selected="false">CFD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false">+ Review/Report A Firm</a>
            </li>
        </ul>
        <div class="tab-content top_firm_tabs" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                <div class="row mb-3">
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="review_tab">

                            <div class="rating-section top_firm_rating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center new_top">
                                        <p class="top_firm_title"><img src="{{  asset('front-assets/images/logo.png')}}"> Phoenix Trader
                                            Funding


                                        </p>

                                        <div class="shadow">
                                            <div class="bt_backs"></div>
                                            <h4 class="mb-0_1">4.3</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="review-stats mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">5 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 70%;"></div>
                                        </div>
                                        <span class="progress_titles">70 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles">50 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 80%;"></div>
                                        </div>
                                        <span class="progress_titles">80 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 90%;"></div>
                                        </div>
                                        <span class="progress_titles">90 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 100%;"></div>
                                        </div>
                                        <span class="progress_titles">100 Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                <!-- Futures Tab Content -->
            </div>
            <div class="tab-pane fade" id="cfd" role="tabpanel" aria-labelledby="cfd-tab">
                <!-- CFD Tab Content -->
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <!-- Reviwe Report -->
            </div>
        </div>
    </div>
@endsection

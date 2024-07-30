@extends('layouts.front')

@section('content')
    <br><br>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-12">
                <div class="review_tab">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="p_data">
                                <div class="data">
                                    <p style="display: flex;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b> <img class="img_data"
                                                src="{{ asset('front-assets/images/france.png') }}"> <br>
                                            <a href="https://phoenixtraderfunding.com"
                                                class="p_des">https://phoenixtraderfunding.com</a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p class="p_text">Established</p>
                            <p class="d_est"><b>August 2024</b></p>
                        </div>
                        <div class="col-md-2">
                            <p class="p_text">Asset</p>
                            <p class="d_est"><b>August 2024</b></p>
                        </div>

                    </div>
                    <br>
                    <ul class="nav nav-tabs justify-content-center" id="myTab_p" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="challenges-tab" data-toggle="tab" href="#challenges"
                                role="tab" aria-controls="challenges" aria-selected="true">Challenges</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="firmistics-tab" data-toggle="tab" href="#firmistics" role="tab"
                                aria-controls="firmistics" aria-selected="false">Firmistics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                aria-controls="about" aria-selected="false">About</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <br>
        <div class="tab-content p_tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="challenges" role="tabpanel" aria-labelledby="challenges-tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-12">
                        <div class="profile_challenge">
                            <div class="row gx-5 abot_rev">
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Profit Split</p>
                                        <p class="d_est1"><b>80% to 90%</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Technology</p>
                                        <p class="d_est1"><b>Proprietary</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Direct Path to Live Funded</p>
                                        <p class="d_est1"><b>Yes</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Payout Frequency</p>
                                        <p class="d_est1"><b>Every 10 Trading Days</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="p_table"
                                style="width:100%; border-collapse: collapse !important;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Price</th>
                                        <th>Account Size</th>
                                        <th>Profit Target</th>
                                        <th>Max. Daily Loss</th>
                                        <th>Max. Total Drawdown</th>
                                        <th>Profit Split</th>
                                        <th>Activation Fee</th>
                                        <th>Reward</th>
                                        <th>Buy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="wsx">$41.50</p>
                                            <p class="orginal">$42.50</p><span>Monthly</span>
                                        </td>
                                        <td>50K</td>
                                        <td>$3000</td>
                                        <td>$1200</td>
                                        <td>$2500</td>
                                        <td>80% to 90%</td>
                                        <td>$149</td>
                                        <td>5 Points</td>
                                        <td><img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="wsx">$41.50</p>
                                            <p class="orginal">$42.50</p><span>Monthly</span>
                                        </td>
                                        <td>50K</td>
                                        <td>$3000</td>
                                        <td>$1200</td>
                                        <td>$2500</td>
                                        <td>80% to 90%</td>
                                        <td>$149</td>
                                        <td>5 Points</td>
                                        <td><img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="wsx">$41.50</p>
                                            <p class="orginal">$42.50</p><span>Monthly</span>
                                        </td>
                                        <td>50K</td>
                                        <td>$3000</td>
                                        <td>$1200</td>
                                        <td>$2500</td>
                                        <td>80% to 90%</td>
                                        <td>$149</td>
                                        <td>5 Points</td>
                                        <td><img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="wsx">$41.50</p>
                                            <p class="orginal">$42.50</p><span>Monthly</span>
                                        </td>
                                        <td>50K</td>
                                        <td>$3000</td>
                                        <td>$1200</td>
                                        <td>$2500</td>
                                        <td>80% to 90%</td>
                                        <td>$149</td>
                                        <td>5 Points</td>
                                        <td><img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="review_tab">

                            <div class="rating-section">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <h4>Current Rating
                                            <br>
                                            <span class="p_des">Based on 198 Reviews</span>
                                        </h4>

                                        <div class="shadow">
                                            <div class="bt_back"></div>
                                            <h4 class="mb-0">4.3</h4>
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
                                            <div class="rating-bar-fill" style="width: 30%;"></div>
                                        </div>
                                        <span class="progress_titles">30 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 10%;"></div>
                                        </div>
                                        <span class="progress_titles">10 Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 5%;"></div>
                                        </div>
                                        <span class="progress_titles">05 Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="benefits-drawbacks mb-3 review_tab">
                            <h5 class="head_5">Main Benefits</h5>
                            <p class="p_des">(from user reviews)</p>
                            <p class="text_review">The website is really made and the payouts are fast.</p>
                        </div>
                        <div class="benefits-drawbacks review_tab">
                            <h5 class="head_5">Main Drawbacks</h5>
                            <p class="p_des">(from user reviews)</p>
                            <p class="text_review">Lack of Support</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <br>
                        <div class="list_review">
                            <h5>
                                List of Reviews
                            </h5>
                            <a href="#" class="btn btn-primary newbtn">+ Add Yours</a>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="review_tab">

                            <div class="rating-section">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('front-assets/images/Sans titre 2.png') }}"
                                            style="width: 46px; ">
                                        <h4 class="names">BASHIR
                                            <br>
                                            <span class="p_des">United Kingdom</span>
                                        </h4>

                                        <div class="date_show">

                                            <span><i class="fa fa-calendar"> </i> Submitted on June 10, 2024 </span>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="sect">
                                            <p class="sect_p">Account Size</p>
                                            <p class="act"><b class="acct_val">5K</b></p>
                                        </div>
                                        <div class="sect">
                                            <p class="sect_p">Account Size</p>
                                            <p class="act"><b class="acct_val">5K</b></p>
                                        </div>
                                        <div class="sect">
                                            <p class="sect_p">Account Size</p>
                                            <p class="act"><b class="acct_val">5K</b></p>
                                        </div>
                                        <div class="sect">
                                            <p class="sect_p">Account Size</p>
                                            <p class="act"><b class="acct_val">5K</b></p>
                                        </div>
                                        <div class="sect">
                                            <p class="sect_p">Account Size</p>
                                            <p class="act"><b class="acct_val">5K</b></p>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="sect">
                                            <p class="sect_p">Review</p>
                                            <textarea id="textarea" class="styled-textarea"></textarea>

                                        </div>
                                        <div class="row reviews">
                                            <div class="col-md-5">
                                                <div class="sect ">
                                                    <p class="sect_p">Rating</p>
                                                    <div class="review-stats ">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">5 Stars</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 70%;">
                                                                </div>
                                                            </div>
                                                            <span class="progress_titles">70 Reviews</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">4 Stars</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 50%;">
                                                                </div>
                                                            </div>
                                                            <span class="progress_titles">50 Reviews</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">3 Stars</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 30%;">
                                                                </div>
                                                            </div>
                                                            <span class="progress_titles">30 Reviews</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">2 Stars</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 10%;">
                                                                </div>
                                                            </div>
                                                            <span class="progress_titles">10 Reviews</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">1 Star</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 5%;"></div>
                                                            </div>
                                                            <span class="progress_titles">05 Reviews</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="sect sec_height">
                                                    <p class="sect_p">Main Benifit</p>
                                                    <p class="rat_text"> This is really a great firm, I loved every
                                                        part of it.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="sect sec_height">
                                                    <p class="sect_p">Main Drawbacks</p>
                                                    <p class="rat_text"> This is really a great firm, I loved every
                                                        part of it.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="sect half_sec">
                                                    <p class="sect_p">Did you find this review useful ?</p>
                                                    <p class="sect_p"> <i class="fa fa-thumbs-o-up"
                                                            aria-hidden="true"></i> <i class="fa fa-thumbs-o-down"
                                                            aria-hidden="true"></i> 15 out of 18 found it useful</p>
                                                </div>

                                                <div class="sect half_sec">

                                                    <p class="sect_p"> <button id="toggleButton">Certificates /
                                                            Payouts <b class="acct_val">2</b> <i
                                                                class="fa fa-chevron-right"
                                                                aria-hidden="true"></i></button></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="toggleDiv" class="sect payout_img">
                                            <img src="{{ asset('front-assets/images/bas2 1.png') }}">
                                            <img src="{{ asset('front-assets/images/bas2 1.png') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <br>

            </div>
            <div class="tab-pane fade" id="firmistics" role="tabpanel" aria-labelledby="firmistics-tab">
                <!-- <h2>heeel4o</h2> -->
            </div>
            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-12">
                        <div class="profile_challenge">
                            <div class="row gx-5 abot_rev">
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Chief Executive Officer</p>
                                        <p class="d_est1"><img src="{{ asset('front-assets/images/unnamed 1.png') }}"
                                                class="about_img"><b>Leon Grimm</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">TrustPilot</p>
                                        <p class="d_est1"><b>3.9 </b> <img
                                                src="{{ asset('front-assets/images/image 1.png') }}" class="about_img">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Payment Method</p>
                                        <p class="d_est1"> <img src="{{ asset('front-assets/images/payment 1.png') }}"
                                                class="about_img"><b>Credit Card </b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Payout Method</p>
                                        <p class="d_est1"> <img src="{{ asset('front-assets/images/unnamed 4.png') }}"
                                                class="about_img"><b>Payoneer </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-12">
                        <div class="profile_challenge">
                            <div class="row gx-5 abot_rev">
                                <div class="col-md-6 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text_about">Platform</p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/unnamed 7.png') }}"
                                                class="about_img">
                                            <b>R| Trader Pro </b>
                                        </p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/images 3.png') }}" class="about_img">
                                            <b>Trading View </b>
                                        </p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/unnamed 8.png') }}"
                                                class="about_img">
                                            <b>NinjaTrader </b>
                                        </p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/MetaTrader_5 1.png') }}"
                                                class="about_img">
                                            <b>Tradovate </b>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text_about">Commissions Structure</p>

                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/images 2.png') }}" class="about_img">
                                            <b>Purple Trading</b>
                                            <li>Forex, Oil, XPT, XPD, AU, AG: <b>$6</b> per standard lot</li>
                                            <li> Indices, Crypto: <b>Commission Free</b></li>
                                        </p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/unnamed 2.png') }}"
                                                class="about_img">
                                            <b>Trading View </b>
                                        </p>
                                        <p class="d_est1_about">
                                            <img src="{{ asset('front-assets/images/unnamed 3.png') }}"
                                                class="about_img">
                                            <b>NinjaTrader </b>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-12">
                        <div class="profile_challenge">
                            <div class="row gx-5 abot_rev">
                                <div class="col-md-12 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text_about">About</p>
                                        <p class="d_est1_about">

                                            Description of the firm Description of the firmDescription of the
                                            firmDescription of the firmDescription of the firmDescription of the
                                            firmDescription of the firmDescription of the firmDescription of the firm
                                            Description of the firmDescription of the firmDescription
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#p_table").DataTable({
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

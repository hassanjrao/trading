@extends('layouts.front')

@section('page-title', 'Firm Name')

@section('styles')

    <link rel="stylesheet" href="{{ asset('front-assets/css/profile.css') }}">
@endsection

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
                                    <p style="display: flex;     align-items: center;">
                                        <img class="img_data" src="{{ $firm->logo_url }}" style="width: 50px">
                                        <span class="p_name">
                                            <b>
                                                {{ $firm->name }}
                                            </b> <img class="img_data img-fluid" style="width: 2rem !important" src="{{ $firm->country->flag_url }}"> <br>
                                            <a href="{{ $firm->url }}" target="__blank"
                                                class="p_des">{{ $firm->url }}
                                            </a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p class="p_text">Established</p>
                            <p class="d_est">
                                <b>
                                    {{ Carbon\Carbon::parse($firm->established)->format('M Y') }}
                                </b>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p class="p_text">Asset</p>
                            <p class="d_est">
                                <b>
                                    {{ $firm->assetType->name }}
                                </b>
                            </p>
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
                                        <p class="d_est1"><b>
                                                {{ $firm->profit_split }}
                                            </b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Technology</p>
                                        <p class="d_est1"><b>
                                                {{ $firm->technology->name }}
                                            </b></p>
                                    </div>
                                </div>
                                @if ($firm->direct_path_to_live_funded)
                                    <div class="col-md-3 ">
                                        <div class="chalng_tabs review_tab">
                                            <p class="p_text">Direct Path to Live Funded</p>
                                            <p class="d_est1"><b>
                                                    {{ $firm->direct_path_to_live_funded ? 'Yes' : 'No' }}
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                @elseif ($firm->daily_drawdown)
                                    <div class="col-md-3 ">
                                        <div class="chalng_tabs review_tab">
                                            <p class="p_text">Daily Drawdown</p>
                                            <p class="d_est1"><b>
                                                    {{ $firm->daily_drawdown }}
                                                </b></p>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Payout Frequency</p>
                                        <p class="d_est1 d-flex flex-column"><b>
                                                {{ $firm->payout_frequency }}
                                            </b>
                                            {{-- <br> --}}
                                            <span style="font-size: 14px; ">{{ $firm->payout_frequency_note }}</span>
                                        </p>

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
                                    @foreach ($firmChallenges as $challenge)
                                        <tr>
                                            <td>
                                                <p class="wsx">
                                                    {{ config('app.currency_symbol') . $challenge->before_price }}
                                                </p>
                                                <p class="orginal">
                                                    {{ config('app.currency_symbol') . $challenge->actual_price }}
                                                </p>
                                                @if ($challenge->actual_price_note)
                                                    <span>
                                                        {{ $challenge->actual_price_note }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $challenge->accountSize->size }} ({{ $challenge->step->name }})
                                            </td>
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
                                                {{ $challenge->profit_split }}
                                            </td>
                                            <td>
                                                {{ config('app.currency_symbol') . $challenge->activation_fee }}
                                            </td>
                                            <td>
                                                {{ $challenge->rewards }}
                                            </td>
                                            <td>
                                                <a href="{{ route('firms.summary', $challenge) }}">
                                                    <img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                        style="width: 50px;">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                    <div class="d-flex align-items-start">
                                        <h4 style="color: #5B5B5B;">Current Rating
                                            <br>
                                            <span class="p_des">Based on <strong>198</strong> Reviews</span>
                                        </h4>

                                        <div class="ml-2 ratess">
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
                                        <span class="progress_titles"><strong>70</strong> Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">4 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 50%;"></div>
                                        </div>
                                        <span class="progress_titles"><strong>50</strong> Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">3 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 30%;"></div>
                                        </div>
                                        <span class="progress_titles"><strong>30</strong> Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">2 Stars</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 10%;"></div>
                                        </div>
                                        <span class="progress_titles"><strong>10</strong> Reviews</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="progress_title">1 Star</span>
                                        <div class="rating-bar  flex-grow-1">
                                            <div class="rating-bar-fill" style="width: 5%;"></div>
                                        </div>
                                        <span class="progress_titles"><strong>05</strong> Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-3 ">
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
                            <a href="#" class="btn btn-primary newbtn ml-2">+ Add Yours</a>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="review_tab r_tab_user">

                            <div class="rating-section">
                                <div class="mb-4 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/Sans titre 2.png" style="width: 46px; ">
                                        <h4 class="names">BASHIR
                                            <br>
                                            <span class="p_des">United Kingdom</span>
                                        </h4>

                                        <div class="date_show">

                                            <span><i class="fa fa-calendar"> </i> Submitted on June 10, 2024 </span>

                                        </div>
                                    </div>

                                </div>
                                <div class="row  ">
                                    <div class="col-md-3 col-sec-1">
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
                                        <div class="sect r_col_1">
                                            <p class="sect_p">Review</p>
                                            <textarea id="textarea" class="styled-textarea"
                                                placeholder="This is really a great firm, I loved every part of it except the support team which was kind of slow and unresponsive. Nevertheless I got paid out in an impressive amount of time and thumb up for that"></textarea>

                                        </div>
                                        <div class="row reviews mt-2">
                                            <div class="col-md-5">
                                                <div class="sect ">
                                                    <p class="sect_p">Rating</p>
                                                    <div class="review-stats ">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">Dashboard</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 50%;"></div>
                                                            </div>
                                                            <span class="progress_titles">3 Stars</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">Support Team</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 70%;"></div>
                                                            </div>
                                                            <span class="progress_titles">4 Stars</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">Payout Process</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill"
                                                                    style="width: 100%; border-radius: 24px;"></div>
                                                            </div>
                                                            <span class="progress_titles">5 Stars</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">Rules</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill"
                                                                    style="width: 100%; border-radius: 24px;"></div>
                                                            </div>
                                                            <span class="progress_titles">5 Stars</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="progress_title">General Rating</span>
                                                            <div class="rating-bar  flex-grow-1">
                                                                <div class="rating-bar-fill" style="width: 70%;"></div>
                                                            </div>
                                                            <span class="progress_titles">4 Stars</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="sect sec_height">
                                                    <p class="sect_p">Main Benifit</p>
                                                    <p class="rat_text"> This is really a great firm, I loved every part of
                                                        it.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="sect sec_height">
                                                    <p class="sect_p">Main Drawbacks</p>
                                                    <p class="rat_text"> This is really a great firm, I loved every part of
                                                        it.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="sect half_sec" style="    margin-bottom: 10px;">
                                                    <p class="sect_p " style="width: 100%;">Did you find this review
                                                        useful ?</p>
                                                    <p class="sect_p"> <i class="fa fa-thumbs-o-up"
                                                            aria-hidden="true"></i> <i class="fa fa-thumbs-o-down"
                                                            aria-hidden="true"></i> 15 out of 18 found it useful</p>
                                                </div>

                                                <div class="sect half_sec">

                                                    <p class="sect_p"> <button id="toggleButton">Certificates / Payouts <b
                                                                class="acct_val">2</b> <i class="fa fa-chevron-right"
                                                                aria-hidden="true"></i></button></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div id="toggleDiv" class="sect payout_img">
                                            <img src="../assets/images/bas2 1.png">
                                            <img src="../assets/images/bas2 1.png">
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
                                                class="about_img"><b>
                                                {{ $firm->about->chief_executive_officer }}
                                            </b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">TrustPilot</p>
                                        <p class="d_est1"><b style="font-size:22px;">
                                                {{ $firm->about->trust_pilot }}
                                            </b> <img src="{{ asset('front-assets/images/image 1.png') }}"
                                                class="about_img"></p>
                                    </div>
                                </div>
                                @if ($firm->paymentMethods->count() > 0)
                                    <div class="col-md-3 ">
                                        <div class="chalng_tabs review_tab">
                                            <p class="p_text">Payment Method</p>
                                            <p class="d_est1">

                                                @foreach ($firm->paymentMethods as $paymentMethod)
                                                    <div>
                                                        <img src="{{ $paymentMethod->logo_url }}" class="about_img">
                                                        <b>
                                                            {{ $paymentMethod->name }}
                                                        </b>
                                                    </div>
                                                @endforeach


                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-3 ">
                                    <div class="chalng_tabs review_tab">
                                        <p class="p_text">Payout Method</p>
                                        <p class="d_est1">

                                            @foreach ($firm->payoutMethods as $payoutMethod)
                                                <div>
                                                    <img src="{{ $payoutMethod->logo_url }}" class="about_img">
                                                    <b>
                                                        {{ $payoutMethod->name }}
                                                    </b>
                                                </div>
                                            @endforeach
                                        </p>
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
                                    <div class="chalng_tabs review_tab p-4 ">
                                        <p class="p_text_about">Platform</p>

                                        @foreach ($firm->platforms as $platform)
                                            <p class="d_est1_about">
                                            <img src="{{ $platform->logo_url }}" class="about_img">
                                                <b>{{ $platform->name }} <span
                                                        style="font-size:smaller">{{ $platform->note ? '(' . $platform->note . ')' : '' }}
                                                    </span></b>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="chalng_tabs review_tab p-4 ">
                                        <p class="p_text_about">Commissions Structure</p>

                                        @if ($firm->about->commission_strucuture_link)
                                            <b>See thier <a href="{{ $firm->commission_strucuture_link }} "
                                                    target="__blank">full</a> article</b>
                                        @else
                                            @foreach ($firm->commissionStructures as $commission)
                                                <p class="d_est1_about">
                                                    <img src="{{ $commission->image_url }}" class="about_img">
                                                    <b>{{ $commission->name }}</b>
                                                    @if ($commission->points)
                                                        @foreach ($commission->points as $point)
                                                            <li>
                                                                {{ $point }}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </p>
                                            @endforeach
                                        @endif
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
                                    <div class="chalng_tabs review_tab p-4 ">
                                        <p class="p_text_about">About</p>
                                        <p class="d_est1_about">

                                            {{ $firm->about->description }}
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

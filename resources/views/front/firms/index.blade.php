@extends('layouts.front')

@section('page-title', 'Top Firms')

@section('styles')


    <link rel="stylesheet" href="{{ asset('front-assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/top.css') }}">
    <link href="https://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">

@endsection

@section('content')

<br><br><br>


    <h2 class="page_title pt-4 text-center text-white">Top Firm</h2>
    <p class="text-center text-white">Here is the list of top-ranked firms by their reviews</p>

    <!-- End Page Title -->

    @php
        $tab = $_GET['type'] ?? 'all';
    @endphp

    <!-- Sign Up Form -->

    <div class="container  mt-2 pt-4 ">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                    <li class="nav-item mb-2">
                        <a class="nav-link {{ $tab == 'all' ? 'active' : '' }}" id="all-tab"
                            href="{{ route('firms.index') }}" role="tab" aria-controls="home"
                            aria-selected="true"><b>All</b></a>
                    </li>

                    @foreach ($assetTypes as $type)
                        <li class="nav-item mb-2">
                            <a class="nav-link {{ $tab == $type->id ? 'active' : '' }}" id="{{ $type->id }}-tab"
                                href="{{ route('firms.index') . '?type=' . $type->id }}" role="tab">
                                <b>{{ $type->name }}</b>
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>
            <div class="col-md-12 mt-2">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                    <li class="nav-item rev_tab">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                            aria-controls="review" aria-selected="false"><b>+ Review/Report A Firm</b></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content top_firm_tabs" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                <div class="row">

                    @foreach ($firms as $firm)
                        <div class="col-md-4 col-12 mb-3">
                            <div class="review_tab">

                                <div class="rating-section top_firm_rating">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center new_top">
                                            <p class="top_firm_title"><img src="{{ $firm->logo_url }}">
                                                <a href="{{ route('firms.show', $firm->id) }}"> {{ $firm->name }}</a>
                                            </p>

                                            <div class="">
                                                <div class="bt_backs"></div>
                                                <h4 class="mb-0_1">4.3</h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="review-stats mt-4 ">
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
                                                <div class="rating-bar-fill" style="width: 100%; border-radius: 24px;">
                                                </div>
                                            </div>
                                            <span class="progress_titles">5 Stars</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="progress_title">Rules</span>
                                            <div class="rating-bar  flex-grow-1">
                                                <div class="rating-bar-fill" style="width: 100%; border-radius: 24px;">
                                                </div>
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
                        </div>
                    @endforeach


                </div>

            </div>

        </div>
    </div>


@endsection

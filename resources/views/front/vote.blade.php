@extends('layouts.front')


@section('content')
    <h2 class="page_title pt-4 text-center text-white">Most Voted Firms</h2>

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
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">1</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">2</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">1</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cfd" role="tabpanel" aria-labelledby="cfd-tab">
                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">1</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">1</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-1 col-1">
                        <div class="number">
                            <p class="text-white">1</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-7 border_line">
                        <div class="data">
                            <p>
                                <img class="img_data" src="{{  asset('front-assets/images/logo.png')}}">
                                <b>Phoenix Trader Funding</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3  col-3 border_line">
                        <div class="button_v">
                            <button class="btn btn-primary">Vote</button>
                            <p>Voted by <span class="counter">53</span> people</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

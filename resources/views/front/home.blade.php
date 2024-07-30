@extends('layouts.front')


@section('content')
    <!-- End Page Title -->

    <!-- Section 1 -->

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-containers">
                    <input type="text" class="search-input" placeholder='Try searching "My Funded FX"'>
                    <button class="search-button">
                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png" alt="Search">
                    </button>
                </div>
                <p class="head_search mt-3">Popular Firms</p>
                <div class="popular-firms">
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/Sans titre 1.png') }}" alt="Topstep">
                        <div>Topstep</div>
                    </div>
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/Apex-Trader-Funding-logo 1.png') }}"
                            alt="Apex Trader Funding">
                        <div>Apex Trader Funding</div>
                    </div>
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/52xgnta2_400x400 1.png') }}" alt="Goat Funded Trader">
                        <div>Goat Funded Trader</div>
                    </div>
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/e_NDgVTP_400x400 1.png') }}" alt="MyFundedFX">
                        <div>MyFundedFX</div>
                    </div>
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/logo.png') }}" alt="Phoenix Trader Funding">
                        <div>Phoenix Trader Funding</div>
                    </div>
                    <div class="firm-logo">
                        <img src="{{ asset('front-assets/images/images 1.png') }}" alt="FTMO">
                        <div>FTMO</div>
                    </div>

                </div>
                <div class="mt-4 text-center">
                    <p class="compare_texts">Not sure what you're looking for?</p>
                    <button class="compare-button">Compare</button>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 1 End   -->

    <!-- Section 2 -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-container_2">
                    <div class="search-box">
                        <input type="text" placeholder="Try searching 'My Funded FX'" class="form-control">
                        <button class="cros-btn">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;"
                                alt="Search"
                                style="
                                width: 13px;position: relative;left: -15px;">
                        </button>
                        <button class="search-button"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png"
                                alt="Search" style="width: 20px;background-color: #6154cc;"></button>
                    </div>
                    <div class="search-results">
                        <div class="no-results"><span class="result-text">No results found for "MyFunded"
                            </span><button class="add-firm-btn">+ Add Firm</button></div>
                        <div class="result">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d5d4397811296cded23531c79005bccfe3c9f77d7afeb10f3d83207c061b315e?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&"
                                alt="Firm Logo">
                            <div>MyFundedFX</div>
                        </div>
                        <div class="result">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6687f47d59730374db21ff83723383580e8363ec3026af3a9efc79689831cd05?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&"
                                alt="Firm Logo">
                            <div>MyFundedFutures</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 2 End   -->


    <!-- Section 3 -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-container_2">
                    <div class="search-box">
                        <input type="text" placeholder="Try searching 'My Funded FX'" class="form-control">
                        <button class="cros-btn">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;"
                                alt="Search"
                                style="
                                width: 13px;position: relative;left: -15px;">
                        </button>
                        <button class="search-button"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png"
                                alt="Search" style="width: 20px;background-color: #6154cc;"></button>
                    </div>
                    <div class="search-results">
                        <div class="result">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6687f47d59730374db21ff83723383580e8363ec3026af3a9efc79689831cd05?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&"
                                alt="Firm Logo">
                            <div>MyFundedFutures</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 3 End   -->


    <!-- Section 4 -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-containers">
                    <input type="text" class="search-input" placeholder='Try searching "My Funded FX"'>
                    <button class="search-button">
                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png" alt="Search">
                    </button>
                </div>
                <div class="search-resultsaf">
                    <div class="search-resultsaf-con">
                        <div class="search-resultsaf-con-column-1">
                            <div class="div-9">
                                <div class="div-10">
                                    No results found for “Somethingimpossibletofind”
                                </div>
                                <div class="div-11">
                                    It appears that this company is not currently registered on Prop
                                    Firm Map.
                                    <br />
                                    <br />
                                    Press &quot;Add Firm&quot; and this firm will be added to our
                                    database, assuming it exists.
                                </div>
                            </div>
                        </div>
                        <div class="button-1"><button type="button" class="div-12">+ Add Firm</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 4 End   -->
    <!-- Section 4 -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-containers">
                    <input type="text" class="search-input" placeholder='Try searching "My Funded FX"'>
                    <button class="search-button">
                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png" alt="Search">
                    </button>
                </div>
                <div class="search-resultsaf">
                    <div class="search-resultsaf-con">
                        <div class="search-resultsaf-con-column-1">
                            <div class="div-9">
                                <div class="div-10">
                                    No results found for “Somethingimpossibletofind”
                                </div>
                                <div class="div-11">
                                    It appears that this company is not currently registered on Prop
                                    Firm Map.
                                    <br />
                                    <br />
                                    The first “Somethingimpossibletofind” will be added to PropFirmMap provided that it
                                    exists.
                                </div>
                            </div>
                        </div>
                        <div class="button-1"><button type="button" class="btn-style">Request Submitted</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 4 End   -->
@endsection

@extends('layouts.front')

@section('page-title', 'Compare')

@section('styles')



@endsection

@section('content')

    <br><br>

    <h2 class="page_title pt-4 text-center text-white">Find Your Best Plan</h2>

    <!-- End Page Title -->


    <!-- Sign Up Form -->

    <div class="container  mt-2 pt-2 ">

        <div class="tab-content" id="myTabContent">
            <form action="{{ route('compare.index') }}" method="GET">
                <input type="hidden" name="search" value="true">
                <div class="container">
                    <div class="section-title">Asset Type</div>
                    <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">
                        @foreach ($assetTypes as $assetType)
                            <label
                                class="btn custom-radio-label {{ request('asset_type') == $assetType->id ? 'active' : '' }}">
                                <input type="radio" name="asset_type" class="custom-radio-input" autocomplete="off"
                                    value="{{ $assetType->id }}"
                                    {{ request('asset_type') == $assetType->id ? 'checked' : '' }}>
                                {{ $assetType->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="section-title">Account Size</div>
                    <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">
                        @foreach ($top7AccountSizes as $accountSize)
                            <label
                                class="btn custom-radio-label {{ request('account_size') == $accountSize->id ? 'active' : '' }}">
                                <input type="radio" name="account_size" class="custom-radio-input" autocomplete="off"
                                    value="{{ $accountSize->id }}"
                                    {{ request('account_size') == $accountSize->id ? 'checked' : '' }}>
                                {{ $accountSize->size }}
                            </label>
                        @endforeach
                    </div>
                    @if ($otherAccountSizes->count() > 0)
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
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                120K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                240K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                250K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                400K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off">
                                500K
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 1M
                            </label>
                            <label class="btn custom-radio-label">
                                <input type="radio" name="account-size" class="custom-radio-input" autocomplete="off"> 2M
                            </label>
                        </div>
                    @endif

                    <div class="section-title">Steps</div>
                    <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">

                        @foreach ($steps as $step)
                            <label class="btn custom-radio-label {{ request('step') == $step->id ? 'active' : '' }}">
                                <input type="radio" name="step" class="custom-radio-input" autocomplete="off"
                                    value="{{ $step->id }}" {{ request('step') == $step->id ? 'checked' : '' }}>
                                {{ $step->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="section-title">Extra Filters</div>
                    <div class="btn-group btn-group-toggle compare_togs" data-toggle="buttons">
                        <label class="btn custom-radio-label">
                            <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off">
                            News
                            Trading Allowed
                        </label>
                        <label class="btn custom-radio-label">
                            <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off">
                            Only
                            White-Label Tech.
                        </label>
                        <label class="btn custom-radio-label">
                            <input type="radio" name="extra-filters" class="custom-radio-input" autocomplete="off">
                            Only
                            Proprietary Tech.
                        </label>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary btn-block" type="submit"
                            style="background-color: #7A95F8; border: none;width: 30%;">Search</button>
                    </div>
                </div>
            </form>

        </div>





    </div>

    @if ($firmChallenges->count() > 0)
        <div class="container-fluid">
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
            <div class="content-3" id="">
                <div class="container-fluid mt-5 tabss">
                    <div class="table-responsivess">

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
                                @foreach ($firmChallenges as $challenge)
                                    <tr>
                                        <td>
                                            <a href="{{ route('firms.show',$challenge->firm->id) }}">
                                                <img class="img_data" src="{{ $challenge->firm->logo_url }}">
                                                <p class="text_name">

                                                    {{ $challenge->firm->name }}
                                                </p>
                                            </a>
                                        </td>
                                        <td>
                                            <p class="wsx">${{ $challenge->before_price }}</p>
                                            ${{ $challenge->actual_price }}
                                        </td>
                                        <td>{{ $challenge->accountSize->size }} ({{ $challenge->step->name }})</td>
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
                                            {{ Carbon\Carbon::parse($challenge->firm->established)->format('M Y') }}
                                            <br><img class="img_data img-fluid" style="width: 3rem !important"
                                                src="{{ $challenge->firm->country->flag_url }}"><br><span class="c_name">
                                                {{ $challenge->firm->country->name }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $challenge->firm->technology->name }}
                                        </td>
                                        <td class="r_data">
                                            {{ $challenge->rewards }}
                                            <img class="img_data" src="{{ asset('front-assets/images/922.png') }}"
                                                style="width: 50px;">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    @endif



@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                aaSorting: [],
                // responsive: true,
                scrollCollapse: true,
                scrollX: '200px',

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
                .attr("placeholder", "Search for a company or chalange from the list")
                .css({
                    width: "300px",
                    display: "inline-block"
                });

            $('[data-toggle="tooltip"]').tooltip();


            // add click event to custom-radio-label

        });
    </script>
@endpush

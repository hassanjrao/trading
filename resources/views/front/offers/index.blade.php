@extends('layouts.front')

@section('page-title', 'Current Offers')


@section('styles')


    <link rel="stylesheet" href="{{ asset('front-assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/top.css') }}">
    <link href="https://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">

    <style>
        .review-rating-block {
            margin-top: 25px;
        }


        .review-rating {
            background: #6453C0;
            border-radius: 45px;
            color: white;
            padding: 3px 17px;
            z-index: 1;
            position: relative;

        }

        .review-back {
            background: #7A95F8;
            border-radius: 45px;
            color: white;
            padding: 3px 17px;
            height: 38px;
            z-index: 0;
            position: relative;
            bottom: 48px;
            right: 3px;
        }

        .search-container .search-icon{
            top: -1.6rem;
        }

        th{
            text-align: center !important
        }
    </style>

@endsection

@section('content')

    <br><br><br>


    <h2 class="page_title pt-4 text-center text-white">All Current Offers</h2>

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
                            href="{{ route('offers.index') }}" role="tab" aria-controls="home"
                            aria-selected="true"><b>All</b></a>
                    </li>

                    @foreach ($assetTypes as $type)
                        <li class="nav-item mb-2">
                            <a class="nav-link {{ $tab == $type->id ? 'active' : '' }}" id="{{ $type->id }}-tab"
                                href="{{ route('offers.index') . '?type=' . $type->id }}" role="tab">
                                <b>{{ $type->name }}</b>
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>


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
                <div class="container-fluid tabss">
                    <div class="table-responsivess">

                        <table class="table table-bordered nowrap" id="example"
                            style="width:100%;     border-collapse: collapse !important;">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-start">Firm</th>
                                    <th style="width: 30px !important">Discount</th>
                                    <th>Promo Code</th>
                                    <th>Buy</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>
                                            <a href="{{ route('firms.show-slug', $offer->firm->slug) }}">
                                                <img class="img_data" src="{{ $offer->firm->logo_url }}">
                                                <p class="text_name">

                                                    {{ $offer->firm->name }}
                                                </p>
                                            </a>
                                        </td>
                                        <td>
                                            <p class="text_name">
                                                {{ $offer->description }}
                                            </p>
                                        </td>
                                        <td>
                                            <a onclick="copytoClipBoard(this)"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Press to copy"
                                             class="btn promo-btn btn-sm btn-primary text-white">
                                                {{-- percentage icon --}}
                                                 <i class="fa fa-tags"></i>
                                                 {{-- promo code --}}
                                                 <span>{{ $offer->promo_code }}</span>
                                             </a>
                                        </td>
                                        <td>
                                            <a href="">
                                                <img class="img_data"
                                                    src="{{ asset('front-assets/images/922.png') }}"
                                                    style="width: 50px;">
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>


    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#example").DataTable({
                    aaSorting: [],
                    // responsive: true,
                    scrollCollapse: true,
                    scrollX: '200px',

                    // columnDefs: [{
                    //         responsivePriority: 1,
                    //         targets: 0
                    //     },
                    //     {
                    //         responsivePriority: 2,
                    //         targets: -1
                    //     }
                    // ]
                });

                $(".dataTables_filter input")
                    .attr("placeholder", "Search for a company")
                    .css({
                        width: "300px",
                        display: "inline-block",
                        color: "#fff !important"
                    });

                $('[data-toggle="tooltip"]').tooltip();


                // add click event to custom-radio-label

            });
        </script>
    @endpush

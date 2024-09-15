@extends('layouts.front')

@section('page-title', 'Most Voted')

@section('styles')

    <link href="https://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">

    <style>
        .tab-content{
            min-height: 0px;
        }
    </style>

@endsection

@section('content')


    <h2 class="page_title pt-4 text-center text-white">Most Voted Firms</h2>

    <!-- End Page Title -->
    @php
        $tab = $_GET['type'] ?? 'all';
    @endphp


    <!-- Sign Up Form -->

    <div class="container  mt-2 pt-4 ">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">


            <li class="nav-item mb-2">
                <a class="nav-link {{ $tab == 'all' ? 'active' : '' }}" id="all-tab" href="{{ route('firms.most-voted') }}"
                    role="tab" aria-controls="home" aria-selected="true"><b>All</b></a>
            </li>
            @foreach ($assetTypes as $type)
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $tab == $type->id ? 'active' : '' }}" id="{{ $type->id }}-tab"
                        href="{{ route('firms.most-voted') . '?type=' . $type->id }}" role="tab">
                        <b>{{ $type->name }}</b>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">


                @if(count($firms) == 0)
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h3>No firm in this category has been voted by anyone yet</h3>
                    </div>
                </div>
                @endif
                @foreach ($firms as $firm)
                    <div class="row mb-3">
                        <div class="col-md-1 col-1">
                            <div class="number">
                                <p class="text-white">
                                    <b>{{ $loop->iteration }}</b>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8 col-7 border_line">
                            <div class="data">
                                <p>
                                    <img class="img_data" src="{{ $firm->logo_url }}">
                                    <b>
                                        <a href="{{ route('firms.show', $firm->id) }}">{{ $firm->name }}</a>
                                    </b>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3  col-3 border_line">
                            <div class="button_v">
                                @auth

                                    <form action="{{ route('firms.submit-vote') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="firm_id" value="{{ $firm->id }}">
                                        <input type="hidden" name="type" value="{{ $tab }}">
                                        <button class="btn btn-primary"><b>Vote</b></button>
                                    </form>
                                @endauth
                                @guest

                                    <a href="{{ route('login') }}" class="btn btn-primary"><b>Sign In to vote</b></a>
                                @endguest
                                <p>Voted by <span class="counter">
                                        {{ $firm->user_votes_count }}
                                    </span> people</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

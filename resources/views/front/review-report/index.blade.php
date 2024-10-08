@extends('layouts.front')

@section('page-title', 'Review & Report')

@section('styles')

    <link rel="stylesheet" href="{{ asset('front-assets/css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/homepage.css') }}">

    <style>
        .firm-selected {
            background: #7a95f8 !important;
            color: #FBF5F3 !important;
        }
        .frmbtn{
            color: #7a95f8 !important;
        }
        .img_data{
            margin-right: 10px;
        }
    </style>

@endsection


@section('content')

    <br><br>

    <div id="mapVue">
        <review-report :account-sizes='{{ $accountSizes }}' :steps='{{ $steps }}' :user='{{ auth()->user() }}' :place-holder-text="{{ json_encode($placeHolderText) }}">

        </review-report>
    </div>

@endsection

@push('scripts')
@endpush

@extends('layouts.front')

@section('page-title', 'My Account')

@section('styles')

    <link rel="stylesheet" href="{{ asset('front-assets/css/top.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/compare_style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/user.css') }}">


    <link href="https://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">
@endsection

@php
    $tab = request()->get('tab') ?? 'profile';
@endphp

@section('content')
    <div class="container-fluid  mt-2 pt-4 ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <p class="text-white" style="font: 14px;">
                    <img alt="User Pic" src="{{ auth()->user()->profile_picture_url }}" class="profile-image1 img-fluid"
                        style="width: 100px; height: 100px; border-radius: 50%;" id="profileImage">
                    {{ auth()->user()->name }}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">

                <ul class="nav nav-tabs justify-content-center" id="EmyTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $tab == 'profile' ? 'active' : '' }}" id="profile-tab" data-toggle="tab"
                            href="#profile" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-pencil"
                                aria-hidden="true"></i>
                            Edit My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab == 'password' ? 'active' : '' }}" id="password-tab" data-toggle="tab"
                            href="#password" role="tab" aria-controls="password" aria-selected="false"><i
                                class="fa fa-unlock-alt" aria-hidden="true"></i> Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab == 'review' ? 'active' : '' }}" id="review-tab" data-toggle="tab"
                            href="#review" role="tab" aria-controls="review" aria-selected="false"><img
                                src="{{ asset('front-assets/images/feedback 1.png') }}">
                            Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab == 'support' ? 'active' : '' }}" id="support-tab" data-toggle="tab"
                            href="#support" role="tab" aria-controls="support" aria-selected="false"><i
                                class="fa fa-comments" aria-hidden="true"></i>
                            Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sign-tab" data-toggle="tab" href="#sign" role="tab"
                            aria-controls="sign" aria-selected="false"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            Sign Out</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content user_tabs" id="EmyTabContent">
                    <div class="tab-pane fade {{ $tab == 'profile' ? 'show active' : '' }}" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="user_form">

                            <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="tab" value="profile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Name"
                                                value="{{ auth()->user()->name }}" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>How long have you been Trading for?</label>
                                            <select class="custom-select" id="inputGroupSelect02"
                                                name="trading_experience">
                                                @foreach ($tradingExperiences as $experience)
                                                    <option value="{{ $experience->id }}"
                                                        {{ auth()->user()->trading_experience_id == $experience->id ? 'selected' : '' }}>
                                                        {{ $experience->experience }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Did you already take a Propfirm Challenge?</label>
                                            <select class="custom-select" id="inputGroupSelect02"
                                                name="prop_firm_challenge">
                                                @foreach ($firmChallenges as $challenge)
                                                    <option value="{{ $challenge->id }}"
                                                        {{ auth()->user()->prop_firm_challenge_id == $challenge->id ? 'selected' : '' }}>
                                                        {{ $challenge->challenge }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Profile Picture</label>
                                            <div class="profile-pic" id=''>

                                                <img alt="User Pic" src="{{ auth()->user()->profile_picture_url }}"
                                                    class="profile-image1">
                                                <input id="profile-image-upload" class="hidden" type="file"
                                                    name="profile_picture" accept="image/*" onchange="previewFile()">
                                                <div style="color:#999;"> </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="submit" class="btn btn-primary frmbtn pr-5 pl-5">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="tab-pane fade {{ $tab == 'password' ? 'show active' : '' }}" id="password"
                        role="tabpanel" aria-labelledby="password-tab">
                        <div class="user_form">
                            <form method="POST" action="{{ route('profile.update-password', auth()->user()->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="tab" value="password">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Actual Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="**********" name="actual_password" required>

                                            @error('actual_password')
                                                <span class="text-white" role="alert">
                                                    <strong>{{ '*' . $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" id="new_password"
                                                placeholder="**********" name="new_password" required>

                                            @error('new_password')
                                                <span class="text-white" role="alert">
                                                    <strong>{{ '*' . $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">


                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" class="form-control" id="new_confirm_password"
                                                placeholder="**********" name="new_confirm_password" required>

                                            @error('new_confirm_password')
                                                <span class="text-white" role="alert">
                                                    <strong>{{ '*' . $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="submit" class="btn btn-primary frmbtn pr-5 pl-5">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ $tab == 'review' ? 'show active' : '' }}" id="review" role="tabpanel"
                        aria-labelledby="review-tab">
                        <p class="profile_review"><span>Your Reviews</span> </p>

                        <p class="mt-4 text-center text-white" style="font-weight: bold;">
                            You don't have any reviews yet. When you do, they'll apear here.
                        </p>
                    </div>
                    <div class="tab-pane fade {{ $tab == 'support' ? 'show active' : '' }}" id="support" role="tabpanel"
                        aria-labelledby="support-tab">
                        <p class="profile_review">A question? Contact Us! </p>
                        <div class="user_form">
                            <form method="POST" action="{{ route('profile.contact-us', auth()->user()->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="question" required>

                                           </textarea>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">


                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <button type="submit" class=" btn btn-primary frmbtn pr-5 pl-5">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- <div class="tab-pane fade" id="sign" role="tabpanel" aria-labelledby="sign-tab">

                                                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewFile() {
            var preview = document.querySelector('#profileImage');
            console.log(preview);
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function() {
            $('.profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });
    </script>
@endpush

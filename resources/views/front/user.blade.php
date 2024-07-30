@extends('layouts.front')

@section('content')


    <div class="container-fluid  mt-2 pt-4 ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <p class="text-white" style="font: 14px;"> <img alt="User Pic"
                        src="{{  asset('front-assets/images/65b97f82aa9d0b5ea0de494c_profile-image 1.png')}}" id="profile-image1"> John Doe
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">

                <ul class="nav nav-tabs justify-content-center" id="EmyTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                            aria-controls="home" aria-selected="true"><i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab"
                            aria-controls="features" aria-selected="false"><i class="fa fa-unlock-alt"
                                aria-hidden="true"></i> Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cfd-tab" data-toggle="tab" href="#cfd" role="tab"
                            aria-controls="cfd" aria-selected="false"><img src="{{  asset('front-assets/images/feedback 1.png')}}">
                            Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                            aria-controls="review" aria-selected="false"><i class="fa fa-comments" aria-hidden="true"></i>
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
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="user_form">

                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Name"
                                                name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>How long have you been Trading for?</label>
                                            <select class="custom-select" id="inputGroupSelect02">
                                                <option selected>6 months - 1year</option>
                                                <option value="1">5 months - 1year</option>
                                                <option value="2">4 months - 1year</option>
                                                <option value="3">3 months - 1year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Did you already take a Propfirm Challenge?</label>
                                            <select class="custom-select" id="inputGroupSelect02">
                                                <option selected>6 months - 1year</option>
                                                <option value="1">5 months - 1year</option>
                                                <option value="2">4 months - 1year</option>
                                                <option value="3">3 months - 1year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Profile Picture</label>
                                            <div class="profile-pic">

                                                <img alt="User Pic"
                                                    src="{{  asset('front-assets/images/65b97f82aa9d0b5ea0de494c_profile-image 1.png')}}"
                                                    id="profile-image1">
                                                <input id="profile-image-upload" class="hidden" type="file"
                                                    onchange="previewFile()">
                                                <div style="color:#999;"> </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="button" class="btn btn-primary frmbtn pr-5 pl-5">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                        <div class="user_form">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Actual Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="**********" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" id="new_password"
                                                placeholder="**********" name="new_password" required>
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
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="button" class="btn btn-primary frmbtn pr-5 pl-5">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cfd" role="tabpanel" aria-labelledby="cfd-tab">
                        <p class="profile_review"><span>Your Reviews</span> </p>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <p class="profile_review">A question ? Contact Us ! </p>
                        <div class="user_form">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control">

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

                                        <button type="button" class=" btn btn-primary frmbtn pr-5 pl-5">save</button>
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
            var preview = document.querySelector('img');
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
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });
    </script>
@endpush

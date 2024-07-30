@extends('layouts.front')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-12">
                <form class="" id="multiStepForms">
                    <h2 class="page_title pt-4 pb-4 text-center text-white"> Review / Report Firms</h2>
                    <div class="step active review_tabs" id="step1">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 1 : Find the Firm
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="search-containers"
                                    style="background: #D0D0D0; padding-top: 7px; padding-bottom: 7px;">
                                    <input type="text" style="    background: transparent;" class="search-input"
                                        placeholder='Try searching "My Funded FX"'>
                                    <button class="search-button">
                                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png" alt="Search">
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <p style="font-size: 16px; color: #828282;">Do you report a payout denial or unjustified breach
                            ?</p>
                        <br>
                        <div class="step_form_btn d-flex">
                            <button type="button" onclick="showStep(2)" class="btn btn-primary frmbtn">No</button>
                            <button type="button" onclick="showStep(5)" class="btn btn-primary">Payout
                                Denial</button>
                            <button type="button" onclick="showStep(6)" class="btn btn-primary">Unjustified
                                Breach</button>
                        </div>
                    </div>
                    <div class="step review_tabs" id="step2">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 2 : Accounts Detail
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="data">
                                    <p style="display: flex; align-items: center; justify-content: flex-end;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control review_form_input" id="name"
                                    placeholder="Name" name="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control review_form_input" id="email"
                                    placeholder="Email" name="email">
                            </div>
                        </div><br class="none">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control review_form_input">
                                    <option selected>50K</option>
                                    <option value="1">60K</option>
                                    <option value="2">80K</option>
                                    <option value="3">90K</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control review_form_input">
                                    <option selected>Instant</option>
                                    <option value="1">Step-1</option>
                                    <option value="2">Step-2</option>

                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 col-6 text-right">
                                <button type="button" onclick="showStep(1)" class="btn btn-primary r_button frmbtn">Back
                                </button>
                            </div>
                            <div class="col-md-6 col-6 text-left">
                                <button type="button" onclick="showStep(3)"
                                    class="btn btn-primary frmbtn r_button">Next</button>
                            </div>
                        </div>


                    </div>
                    <div class="step review_tabs" id="step3">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 3 : Rating / Review
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="data">
                                    <p style="display: flex; align-items: center; justify-content: flex-end;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div><br>
                        <textarea class="form-control review_form_input" placeholder="Review of the firm (minimum 150 characters)">

                            </textarea>
                        <br>
                        <div class="rating-container">
                            <div class="rating">

                                <div class="stars" data-rating="0">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <p>Dashboard</p>
                            </div>
                            <div class="rating">

                                <div class="stars" data-rating="0">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <p>Support Team</p>
                            </div>
                            <div class="rating">

                                <div class="stars" data-rating="0">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <p>Payout Process</p>
                            </div>
                            <div class="rating">

                                <div class="stars" data-rating="0">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <p>Rules</p>
                            </div>

                        </div>
                        <div class="ratings">

                            <div class="stars" data-rating="0">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>

                            </div>
                            <p>General Rating</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right col-6">
                                <button type="button" onclick="showStep(2)" class="btn btn-primary r_button frmbtn">Back
                                </button>
                            </div>
                            <div class="col-md-6 text-left col-6">
                                <button type="button" onclick="showStep(4)"
                                    class="btn btn-primary frmbtn r_button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="step review_tabs" id="step4">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 4 : Conformation
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="data">
                                    <p style="display: flex; align-items: center; justify-content: flex-end;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Confirmation_container">
                                    <input type="text" class="confirmation-input"
                                        placeholder='Order Confirmation (Required)'>
                                    <img src="{{ asset('front-assets/images/document 1.png') }}" alt="document">
                                </div>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="What are the main advantages of this company?">

                                    </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="What are the main drawbacks of this company?">

                                    </textarea>
                            </div>

                        </div><br>
                        <div class="form-group form-check review">
                            <input type="checkbox" class="form-check-input " id="terms" name="terms">
                            <label class="checkbox-label " for="terms">I accept the Terms of Service & Privacy
                                Policy</label>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 text-right col-6">
                                <button type="button" onclick="showStep(3)" class="btn btn-primary r_button frmbtn">Back
                                </button>
                            </div>
                            <div class="col-md-6 text-left col-6">
                                <button type="submit" id="submit_form" class="btn btn-primary frmbtn r_button"
                                    onclick="submitForm()">Submit</button>
                            </div>
                        </div>


                    </div>
                    <div class="step review_tabs" id="step5">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 2 : Details
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="data">
                                    <p style="display: flex; align-items: center; justify-content: flex-end;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Confirmation_container">
                                    <input type="text" class="confirmation-input"
                                        placeholder='Uploadf Funding Certificate form the firm '>
                                    <img src="{{ asset('front-assets/images/document 1.png') }}" alt="document">
                                </div>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="What is the firm’s reason for refusing payout?">

                                    </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="Add more details (Falculative)">

                                    </textarea>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Confirmation_container">
                                    <input type="text" class="confirmation-input"
                                        placeholder='Upload correspondence with the company (Falculative)'>
                                    <img src="{{ asset('front-assets/images/document 1.png') }}" alt="document">
                                </div>
                            </div>

                        </div><br>
                        <div class="form-group form-check review">
                            <input type="checkbox" class="form-check-input " id="terms_2" name="terms_2">
                            <label class="checkbox-label " for="terms_2">I accept the Terms And Condition</label>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 text-right col-6">
                                <button type="button" onclick="showStep(1)" class="btn btn-primary r_button frmbtn">Back
                                </button>
                            </div>
                            <div class="col-md-6 text-left col-6">
                                <button type="submit" id="submit_form" class="btn btn-primary frmbtn r_button"
                                    onclick="submitForm()">Submit</button>
                            </div>
                        </div>


                    </div>
                    <div class="step review_tabs" id="step6">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="p_data">
                                    <div class="data_r">
                                        <p class="revie_title">
                                            Step 2 : Details
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="data">
                                    <p style="display: flex; align-items: center; justify-content: flex-end;">
                                        <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                                        <span class="p_name">
                                            <b>Phoenix Trader Funding</b>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="What is the firm’s reason for refusing payout?">

                                    </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control review_form_input" placeholder="Add more details (Falculative)">

                                    </textarea>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Confirmation_container">
                                    <input type="text" class="confirmation-input"
                                        placeholder='Uploadf Funding Certificate form the firm '>
                                    <img src="{{ asset('front-assets/images/document 1.png') }}" alt="document">
                                </div>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Confirmation_container">
                                    <input type="text" class="confirmation-input"
                                        placeholder='Upload correspondence with the company (Falculative)'>
                                    <img src="{{ asset('front-assets/images/document 1.png') }}" alt="document">
                                </div>
                            </div>

                        </div><br>
                        <div class="form-group form-check review">
                            <input type="checkbox" class="form-check-input " id="terms_3" name="terms_3">
                            <label class="checkbox-label " for="terms_3">I accept the Terms And Condition</label>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 text-right col-6">
                                <button type="button" onclick="showStep(1)" class="btn btn-primary r_button frmbtn">Back
                                </button>
                            </div>
                            <div class="col-md-6 text-left col-6">
                                <button type="submit" id="submit_form" class="btn btn-primary frmbtn r_button"
                                    onclick="submitForm()">Submit</button>
                            </div>
                        </div>


                    </div>
                </form>
                <div class="toggleDiv success_message" id="successMessage">
                    <h2 class="page_title pt-4 text-center text-white">Submission Confirmed</h2>
                    <div class="data mt-4" style="background-color:#FBF5F3 ; border-radius: 20px;padding: 20px;">
                        <p style="display: flex; align-items: center; justify-content: center;">
                            <img class="img_data" src="{{ asset('front-assets/images/logo.png') }}">
                            <span class="p_name">
                                <b>Phoenix Trader Funding</b>

                            </span>
                        </p><br>
                        <p class="text-center" style="font-size: 16px; color: #828282;">
                            Thank you for reviewing this firm, it will greatly help other users.
                            <br><br>We'll be analyzing it and if everything's in order, it'll be added to our site.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <br>



    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('submit_form').addEventListener('click', function() {
            var div = document.getElementById('toggleDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        });

        function showStep(step) {
            const steps = document.querySelectorAll('.step');
            steps.forEach((stepElement) => {
                stepElement.classList.remove('active');
            });
            document.getElementById(`step${step}`).classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('.star');


            stars.forEach(star => {
                star.addEventListener('click', setRating);
            });



            function setRating(event) {
                const span = event.currentTarget;
                const stars = span.parentNode.querySelectorAll('.star');
                const rating = span.getAttribute('data-value');

                stars.forEach(star => {
                    star.classList.remove('selected');
                    if (star.getAttribute('data-value') <= rating) {
                        star.classList.add('selected');
                    } else {
                        star.classList.remove('selected');
                    }
                });

                span.parentNode.setAttribute('data-rating', rating);
            }


        });

        function submitForm() {
            const form = document.getElementById('multiStepForms');
            const successMessage = document.getElementById('successMessage');

            form.style.display = 'none';
            successMessage.style.display = 'block';
        }
    </script>
@endpush

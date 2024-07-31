@extends('layouts.front')

@section('content')
    <!-- Page Title -->

    <h2 class="page_title pt-4 text-center text-white">Sign up</h2>

    <div class="container signup mt-2 pt-4 ">
        <form id="multiStepForm">
            <!-- Step 1 -->
            <div class="step active" id="step1">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="country" placeholder="Country" name="country" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                        required>
                </div>
                <button type="button" class="btn btn-primary frmbtn pr-5 pl-5" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2 -->
            <div class="step" id="step2">
                <div class="form-group">
                    <label class="text-white ">How long have you been trading for?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trading_experience" id="option1"
                            value="0-6 months" required>
                        <label class="form-check-label text-white" for="option1">0-6 months</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trading_experience" id="option2"
                            value="6 months - 1 year">
                        <label class="form-check-label text-white" for="option2">6 months - 1 year</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trading_experience" id="option3"
                            value="1 year - 2 years">
                        <label class="form-check-label text-white" for="option3">1 year - 2 years</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trading_experience" id="option4"
                            value="2 years - 5 years">
                        <label class="form-check-label text-white" for="option4">2 years - 5 years</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trading_experience" id="option5"
                            value="5 years+">
                        <label class="form-check-label text-white" for="option5">5 years+</label>
                    </div>
                </div>
                <button type="button" class=" back" onclick="prevStep()"><i class="fa fa-chevron-left"
                        aria-hidden="true"></i></button>
                <button type="button" class="btn btn-primary pr-5 pl-5 frmbtn" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3 -->
            <div class="step" id="step3">
                <div class="form-group">
                    <label class="text-white">Did you already take a prop firm challenge?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prop_firm_challenge" id="option6"
                            value="Never" required>
                        <label class="form-check-label text-white" for="option6">Never</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prop_firm_challenge" id="option7"
                            value="1">
                        <label class="form-check-label text-white" for="option7">1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prop_firm_challenge" id="option8"
                            value="1-5">
                        <label class="form-check-label text-white" for="option8">1-5</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prop_firm_challenge" id="option9"
                            value="5+">
                        <label class="form-check-label text-white" for="option9">5+</label>
                    </div>
                </div>
                <div class="form-group form-check signup">
                    <input type="checkbox" class="form-check-input " id="terms" name="terms" required>
                    <label class="checkbox-label text-white" for="terms">I accept the Terms of Service & Privacy
                        Policy</label>
                </div>
                <button type="button" class=" back" onclick="prevStep()"><i class="fa fa-chevron-left"
                        aria-hidden="true"></i></button>
                <button type="submit" class="btn btn-success frmbtn pr-5 pl-5">Create My Account</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <!-- Footer -->
    <script>
        var currentStep = 1;
        var totalSteps = 3;

        function showStep(step) {
            for (var i = 1; i <= totalSteps; i++) {
                document.getElementById('step' + i).classList.remove('active');
            }
            document.getElementById('step' + step).classList.add('active');
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }
    </script>
@endpush

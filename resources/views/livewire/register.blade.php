<div>
    <br><br>
    <div class="d-flex justify-content-center w-100 mt-4 align-items-center">


        @if ($step > 1)
            <button type="button" class="back" wire:click="backStep()"><i class="fa fa-chevron-left"
                    aria-hidden="true"></i></button>
        @endif

        <h2 class="page_title text-center text-white">Sign up</h2>


    </div>
    <div class="container signup mt-2 pt-4 ">




        <form id="multiStepForm">
            <!-- Step 1 -->
            @if ($step == 1)
                <div class="step active" id="step1">
                    <div class="form-group text-left">
                        <input type="text" class="form-control" id="name" placeholder="Name" wire:model='name'>

                        @error('name')
                            <span class="text-white" role="alert">
                                <strong>{{ '*' . $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            wire:model='email'>

                        @error('email')
                            <span class="text-white" role="alert">
                                <strong>{{ '*' . $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <input type="text" class="form-control" id="country" placeholder="Country"
                            wire:model='country'>


                        @error('country')
                            <span class="text-white" role="alert">
                                <strong>{{ '*' . $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            wire:model='password'>

                        @error('password')
                            <span class="text-white" role="alert">
                                <strong>{{ '*' . $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary frmbtn pr-5 pl-5" wire:click="nextStep">Next</button>

                </div>
            @elseif ($step == 2)
                <!-- Step 2 -->
                <!-- Step 2 -->
                <div class="step active" id="step2">
                    <div class="form-group">
                        <label class="text-white "><b>How long have you been trading for?</b></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='tradingExperience' id="option1"
                                value="0-6 months">
                            <label class="form-check-label text-white" for="option1">0-6 months</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='tradingExperience' id="option2"
                                value="6 months - 1 year">
                            <label class="form-check-label text-white" for="option2">6 months - 1 year</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='tradingExperience' id="option3"
                                value="1 year - 2 years">
                            <label class="form-check-label text-white" for="option3">1 year - 2 years</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='tradingExperience' id="option4"
                                value="2 years - 5 years">
                            <label class="form-check-label text-white" for="option4">2 years - 5 years</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='tradingExperience' id="option5"
                                value="5 years+">
                            <label class="form-check-label text-white" for="option5">5 years+</label>
                        </div>
                        @error('tradingExperience')
                            <span class="text-white" role="alert">
                                <strong>{{ '*' . $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary pr-5 pl-5 frmbtn" wire:click="nextStep">Next</button>
                </div>
            @elseif ($step == 3)
                <!-- Step 3 -->
                <div class="step active" id="step3">
                    <div class="form-group">
                        <label class="text-white"><b>Did you already take a prop firm challenge?</b></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='firmChallenge' id="option6"
                                value="Never" required>
                            <label class="form-check-label text-white" for="option6">Never</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='firmChallenge' id="option7"
                                value="1">
                            <label class="form-check-label text-white" for="option7">1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='firmChallenge' id="option8"
                                value="1-5">
                            <label class="form-check-label text-white" for="option8">1-5</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model='firmChallenge' id="option9"
                                value="5+">
                            <label class="form-check-label text-white" for="option9">5+</label>
                        </div>

                    @error('firmChallenge')
                    <span class="text-white" role="alert">
                        <strong>{{ '*' . $message }}</strong>
                    </span>
                @enderror
                    </div>
                    <div class="form-group form-check signup">
                        <input type="checkbox" class="form-check-input " id="terms" wire:model='termsAccepted'>
                        <label class="checkbox-label text-white" for="terms">I accept the Terms of Service &
                            Privacy
                            Policy</label>

                    </div>
                    @error('termsAccepted')
                        <span class="text-white" role="alert">
                            <strong>{{ '*' . $message }}</strong>
                        </span>
                    @enderror
                    <button type="button" wire:click='nextStep' class="btn btn-success frmbtn pr-5 pl-5">Create My
                        Account</button>
                </div>
            @endif
        </form>
    </div>
</div>

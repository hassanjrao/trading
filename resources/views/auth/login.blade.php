@extends('layouts.front')
@section('page-title', 'Sign In')
@section('content')
    <br><br>
    <div class="d-flex justify-content-center w-100 mt-4 align-items-center">
        <h2 class="page_title text-center text-white">Sign In</h2>
    </div>
    <div class="container mt-2 pt-4 ">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('login') }}" class="text-center">
                    @csrf
                    <!-- Step 1 -->

                    <div class="step active" id="step1">

                        <div class="form-group text-left">
                            <input type="email" class="form-control" id="email" placeholder="Email" name='email'
                            required
                                value="{{ old('email') }}">

                            @error('email')
                                <span class="text-white" role="alert">
                                    <strong>{{ '*' . $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-left">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                            required
                                name='password'>

                            @error('password')
                                <span class="text-white" role="alert">
                                    <strong>{{ '*' . $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary frmbtn pr-5 pl-5">Login</button>

                    </div>

                </form>
                {{-- already have an account --}}
                <div class="text-center mt-3">
                    <a href="{{ route('register') }}" class="text-white">Don't have an account? Sign Up</a>
                </div>
            </div>
        </div>


    </div>
@endsection

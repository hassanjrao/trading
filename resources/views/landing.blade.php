@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div class="hero bg-body-extra-light overflow-hidden">
        <div class="hero-inner">
            <div class="content content-full text-center">
                <h1 class="fw-bold mb-2">
                    OneUI <span class="fw-normal">+ Laravel <span class="text-city">8</span></span>
                </h1>
                <p class="fs-lg fw-medium text-muted mb-4">
                    Welcome to the starter kit! Build something amazing!
                </p>
                <a class="btn btn-alt-primary" href="/dashboard">
                    Enter Dashboard
                    <i class="fa fa-fw fa-arrow-right opacity-50 ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection

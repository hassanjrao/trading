@extends('layouts.backend')

@php
    $addEdit = isset($payoutMethod) ? 'Edit' : 'Add';
    $addUpdate = isset($payoutMethod) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Payout Method')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Payout Method</h3>

            </div>
            <div class="block-content">

                @if ($payoutMethod)
                    <form action="{{ route('admin.payout-methods.update', $payoutMethod->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.payout-methods.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('name', $payoutMethod ? $payoutMethod->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12">

                                @if ($payoutMethod && $payoutMethod->logo_path)
                                    <img src="{{ $payoutMethod->logo_url }}" alt="image" class="img-fluid" style="width: 100px">
                                @endif

                                <label class="form-label" for="label">Logo <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="logo"
                                    {{ $payoutMethod ? '' : 'required' }} name="logo">
                                @error('logo')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>



                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary text-white">{{ $addUpdate }}</button>

                    </div>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection

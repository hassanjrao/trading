@extends('layouts.backend')

@php
    $addEdit = isset($accountSize) ? 'Edit' : 'Add';
    $addUpdate = isset($accountSize) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Account Size')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Account Size</h3>

            </div>
            <div class="block-content">

                @if ($accountSize)
                    <form action="{{ route('admin.account-sizes.update', $accountSize->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.account-sizes.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('size', $accountSize ? $accountSize->size : null);

                                ?>
                                <label class="form-label" for="label"> Size <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="size" name="size" placeholder="Enter size">
                                @error('size')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>

                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

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

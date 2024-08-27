@extends('layouts.backend')

@php
    $addEdit = isset($step) ? 'Edit' : 'Add';
    $addUpdate = isset($step) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Step')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Step</h3>

            </div>
            <div class="block-content">

                @if ($step)
                    <form action="{{ route('admin.steps.update', $step->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.steps.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('name', $step ? $step->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('steps', $step ? $step->steps : null);

                                ?>
                                <label class="form-label" for="label">Steps <span
                                        class="text-danger">*</span></label>
                                <input required type="number" value="{{ $value }}" class="form-control"
                                    id="steps" name="steps" placeholder="Enter Steps">
                                @error('steps')
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

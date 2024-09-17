@extends('layouts.backend')

@php
    $addEdit = isset($commissionStructure) ? 'Edit' : 'Add';
    $addUpdate = isset($commissionStructure) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Commission Structure')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Commission Structure</h3>

            </div>
            <div class="block-content">

                @if ($commissionStructure)
                    <form action="{{ route('admin.commission-structure.update', $commissionStructure->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.commission-structure.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('name', $commissionStructure ? $commissionStructure->name : null);

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

                                @if ($commissionStructure && $commissionStructure->image_path)
                                    <img src="{{ $commissionStructure->image_url }}" alt="image" class="img-fluid" style="width: 100px">
                                @endif

                                <label class="form-label" for="label">Logo <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="logo"
                                    {{ $commissionStructure ? '' : 'required' }} name="logo">
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

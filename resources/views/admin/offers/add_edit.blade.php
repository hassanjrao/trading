@extends('layouts.backend')

@php
    $addEdit = isset($offer) ? 'Edit' : 'Add';
    $addUpdate = isset($offer) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Offer')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Offer</h3>

            </div>
            <div class="block-content">

                @if ($offer)
                    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('firm', $offer ? $offer->firm_id : null);

                                ?>
                                <label class="form-label" for="label"> Firm <span
                                        class="text-danger">*</span></label>

                                <select required class="form-control" id="firm" name="firm">
                                    <option value="">Select Firm</option>
                                    @foreach ($firms as $firm)
                                        <option value="{{ $firm->id }}" @if ($firm->id == $value) selected @endif>
                                            {{ $firm->name }}</option>
                                    @endforeach
                                </select>

                                @error('firm')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('discount', $offer ? $offer->description : null);

                                ?>
                                <label class="form-label" for="label"> Discount <span class="text-danger">*</span></label>
                                <textarea required class="form-control"
                                    id="discount" name="discount" placeholder="Enter discount">{{ $value }}</textarea>
                                @error('discount')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('promo_code', $offer ? $offer->promo_code : null);

                                ?>
                                <label class="form-label" for="label"> Promo Code <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="promo_code" name="promo_code" placeholder="Enter promo_code">
                                @error('promo_code')
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

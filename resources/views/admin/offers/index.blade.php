@extends('layouts.backend')

@section('page-title', 'Offers')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Offers
                </h3>


                <a href="{{ route('admin.offers.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Firm</th>
                                <th>Discount</th>
                                <th>Promo Code</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($offers as $ind => $offer)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $offer->firm->name }}</td>
                                    <td>{{ $offer->description }}</td>
                                    <td>{{ $offer->promo_code }}</td>
                                    <td>{{ $offer->created_at }}</td>
                                    <td>{{ $offer->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $offer->id }}"
                                            action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $offer->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection

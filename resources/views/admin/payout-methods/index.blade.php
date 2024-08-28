@extends('layouts.backend')

@section('page-title', 'Payout Methods')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Payout Methods
                </h3>


                <a href="{{ route('admin.payout-methods.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($payoutMethods as $ind => $payoutMethod)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $payoutMethod->name }}</td>
                                    <td>
                                        <img src="{{ $payoutMethod->logo_url }}" alt="" style="width: 100px;">
                                    </td>

                                    <td>{{ $payoutMethod->created_at }}</td>
                                    <td>{{ $payoutMethod->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.payout-methods.edit', $payoutMethod->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $payoutMethod->id }}"
                                            action="{{ route('admin.payout-methods.destroy', $payoutMethod->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $payoutMethod->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

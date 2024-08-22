@extends('layouts.backend')

@section('page-title', 'Account Sizes')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Account Sizes
                </h3>


                <a href="{{ route('admin.account-sizes.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Size</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($accountSizes as $ind => $accountSize)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $accountSize->size }}</td>

                                    <td>{{ $accountSize->created_at }}</td>
                                    <td>{{ $accountSize->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.account-sizes.edit', $accountSize->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $accountSize->id }}"
                                            action="{{ route('admin.account-sizes.destroy', $accountSize->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $accountSize->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

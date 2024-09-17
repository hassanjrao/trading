@extends('layouts.backend')

@section('page-title', 'Commission Structures')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Commission Structures
                </h3>


                <a href="{{ route('admin.commission-structure.create') }}" class="btn btn-primary">Add</a>



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
                            @foreach ($commissionStructures as $ind => $commissionStructure)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $commissionStructure->name }}</td>
                                    <td>
                                        <img src="{{ $commissionStructure->image_url }}" alt="" style="width: 100px;">
                                    </td>

                                    <td>{{ $commissionStructure->created_at }}</td>
                                    <td>{{ $commissionStructure->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.commission-structure.edit', $commissionStructure->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $commissionStructure->id }}"
                                            action="{{ route('admin.commission-structure.destroy', $commissionStructure->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $commissionStructure->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

@extends('layouts.backend')

@section('page-title', 'Firms Requests')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Firms Requests
                </h3>


                {{-- <a href="{{ route('admin.firms.create') }}" class="btn btn-primary">Add</a> --}}



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($firmRequests as $ind => $request)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $request->name }}</td>


                                    <td>{{ $request->created_at }}</td>
{{--
                                    <td>


                                        <form id="form-{{ $firm->id }}"
                                            action="{{ route('admin.firms.destroy', $firm->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $firm->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td> --}}


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

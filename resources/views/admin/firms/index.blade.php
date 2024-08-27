@extends('layouts.backend')

@section('page-title', 'Firms')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Firms
                </h3>


                <a href="{{ route('admin.firms.create') }}" class="btn btn-primary">Add</a>



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
                                <th>URL</th>
                                <th>Established Date</th>
                                <th>Country</th>
                                <th>Asset Type</th>
                                <th>Technology</th>
                                <th>Profit Split</th>
                                <th>Direct Path to Live Funded</th>
                                <th>Payout Frequency</th>
                                <th>Payout Frequency Note</th>
                                <th>Daily Drawdown</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($firms as $ind => $firm)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $firm->name }}</td>
                                    <td>
                                        <img src="{{ $firm->logo_url }}" alt="" style="width: 100px;">
                                    </td>
                                    <td>{{ $firm->url }}</td>
                                    <td>{{ $firm->established_date_formatted }}</td>
                                    <td>
                                        <img src="{{ $firm->country->flag_url }}" alt="" style="width: 100px;">
                                    </td>
                                    <td>{{ $firm->assetType->name }}</td>
                                    <td>{{ $firm->technology->name }}</td>
                                    <td>{{ $firm->profit_split }}</td>
                                    <td>
                                        @if($firm->direct_path_to_live_funded)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $firm->payout_frequency }}</td>
                                    <td>{{ $firm->payout_frequency_note }}</td>
                                    <td>{{ $firm->daily_drawdown }}</td>

                                    <td>{{ $firm->created_at }}</td>
                                    <td>{{ $firm->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.firms.challenges', $firm) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Challenges">
                                            <i class="fa fa-tasks"></i>
                                        </a>
                                        <a href="{{ route('admin.firms.edit', $firm->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <form id="form-{{ $firm->id }}"
                                            action="{{ route('admin.firms.destroy', $firm->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $firm->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

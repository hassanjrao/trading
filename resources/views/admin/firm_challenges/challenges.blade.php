@extends('layouts.backend')

@section('page-title', 'Firm ' . $firm->name . ' Challenges')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Firm {{ $firm->name }} Challenges
                </h3>


                <a href="{{ route('admin.firms.index') }}" class="btn btn-success">All Firms</a>

                <a href="{{ route('admin.firms.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Actual Price</th>
                                <th>Actual Price Note</th>
                                <th>Before Price</th>
                                <th>Account Size</th>
                                <th>Step</th>
                                <th>Profit Target</th>
                                <th>Max. Daily Loss</th>
                                <th>Max. Total Drawdown</th>
                                <th>Profit Split</th>
                                <th>Activation Fee</th>
                                <th>Reward</th>

                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($firmChallenges as $ind => $challenge)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td> {{ config('app.currency_symbol') . $challenge->actual_price }}</td>
                                    <td>{{ $challenge->actual_price_note }}</td>
                                    <td>{{ config('app.currency_symbol') . $challenge->before_price }}</td>
                                    <td>{{ $challenge->accountSize->size }}</td>
                                    <td>{{ $challenge->step->name }}</td>
                                    <td>
                                        @foreach ($challenge->firmChallengeDetails as $detail)
                                            {{ 'P' . $loop->iteration . ': ' . $detail->profit_target }}
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($challenge->firmChallengeDetails as $detail)
                                            {{ 'P' . $loop->iteration . ': ' . $detail->max_daily_loss }}
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td>

                                        @foreach ($challenge->firmChallengeDetails as $detail)
                                            {{ 'P' . $loop->iteration . ': ' . $detail->max_total_drawdown }}
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $challenge->profit_split }}
                                    </td>
                                    <td>
                                        {{ config('app.currency_symbol') . $challenge->activation_fee }}
                                    </td>
                                    <td>
                                        {{ $challenge->rewards }}
                                    </td>

                                    <td>{{ $challenge->created_at }}</td>
                                    <td>{{ $challenge->updated_at }}</td>

                                    <td>

                                        <a href="{{ route('admin.firms.edit', $firm->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <form id="form-{{ $firm->id }}"
                                            action="{{ route('admin.firms.destroy', $firm->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $firm->id }})"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
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

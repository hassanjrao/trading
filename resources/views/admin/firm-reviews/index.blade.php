@extends('layouts.backend')

@section('page-title', 'Firms  Reviews')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Firms Reviews
                </h3>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Firm</th>
                                <th>Approved</th>
                                <th>Account Size</th>
                                <th>Step</th>
                                <th>Review</th>
                                <th>Rating Dashboard</th>
                                <th>Rating Support Team</th>
                                <th>Rating Payout Process</th>
                                <th>Rating Rules</th>
                                <th>Rating General</th>
                                <th>Order Confirmation File</th>
                                <th>Main Advantages</th>
                                <th>Main Disadvantages</th>
                                <th>Created At</th>
                                <th>Updated At</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($firmReviews as $ind => $review)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>

                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->firm->name }}</td>
                                    <td>
                                        {{-- switch to approve disapprove --}}
                                        <form action="{{ route('admin.firm-reviews.approve', $review->id) }}" method="POST">
                                            @csrf
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="switch{{ $review->id }}" name="is_approved" {{ $review->is_approved == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label class="form-check-label" for="switch{{ $review->id }}">Approved</label>
                                              </div>
                                        </form>
                                    </td>

                                    <td>{{ $review->accountSize->size }}</td>
                                    <td>{{ $review->step->name }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>{{ $review->rating_dashboard }}</td>
                                    <td>{{ $review->rating_support_team }}</td>
                                    <td>{{ $review->rating_payout_process }}</td>
                                    <td>{{ $review->rating_rules }}</td>
                                    <td>{{ $review->rating_general }}</td>
                                    <td>
                                        @if ($review->order_confirmation_path)
                                            <a href="{{ $review->order_confirmation_url }}" target="_blank">View</a>
                                        @endif
                                    </td>
                                    <td>{{ $review->main_advantages }}</td>
                                    <td>{{ $review->main_disadvantages }}</td>


                                    <td>{{ $review->created_at }}</td>
                                    <td>{{ $review->updated_at }}</td>


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

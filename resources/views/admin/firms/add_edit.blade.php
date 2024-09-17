@extends('layouts.backend')

@php
    $addEdit = isset($step) ? 'Edit' : 'Add';
    $addUpdate = isset($step) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Step')

@section('css_after')

<style>
    .v-application{
        /* background-color: #ebeef2 !important; */
    }
</style>

@endsection

@section('content')


    <div class="content bg-light mb-4" style="background-color: inherit">
        @if($firmID)
        <add-edit-firm
        :steps="{{ $steps }}"
        :account-sizes="{{ $accountSizes }}"
        :technologies="{{ $technologies }}"
        :asset-types="{{ $assetTypes }}"
        :countries="{{ $countries }}"
        :firm-i-d="{{ $firmID }}"
        :firm="{{ $firm }}"
        :payment-methods="{{ $paymentMethods }}"
        :payout-methods="{{ $payoutMethods }}"
        :platforms="{{ $platforms }}"
        :commission-structures="{{ $commissionStructures }}"
        />
        @else
        <add-edit-firm
        :steps="{{ $steps }}"
        :account-sizes="{{ $accountSizes }}"
        :technologies="{{ $technologies }}"
        :asset-types="{{ $assetTypes }}"
        :countries="{{ $countries }}"
        :payment-methods="{{ $paymentMethods }}"
        :payout-methods="{{ $payoutMethods }}"
        :platforms="{{ $platforms }}"
        :commission-structures="{{ $commissionStructures }}"
        />
        @endif
    </div>
@endsection

@section('js_after')


@endsection

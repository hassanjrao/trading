<template>
  <form action="" method="GET">
    <input type="hidden" name="search" value="true" />
    <div class="container">
      <div class="section-title">Asset Type</div>
      <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">
        <label
          class="btn custom-radio-label
                                {{ request('asset_type') == $assetType->id ? 'active' : '' }}"
          id="assetType{{ $assetType->id }}"
        >
          <input type="radio" name="asset_type" class="custom-radio-input"
          autocomplete="off" value="{{ $assetType->id }}"
          {{ request('asset_type') == $assetType->id ? 'checked' : '' }}>
          {{ $assetType->name }}
        </label>
      </div>

      <div class="section-title">Account Size</div>
      <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">
        @foreach ($top7AccountSizes as $accountSize)
        <label
          class="btn custom-radio-label {{ request('account_size') == $accountSize->id ? 'active' : '' }}"
        >
          <input type="radio" name="account_size" class="custom-radio-input"
          autocomplete="off" value="{{ $accountSize->id }}"
          {{ request('account_size') == $accountSize->id ? 'checked' : '' }}>
          {{ $accountSize->size }}
        </label>
        @endforeach
      </div>
      @if ($otherAccountSizes->count() > 0)
      <div class="section-title">See More</div>
      <div class="btn-group btn-group-toggle d-flex flex-wrap mt-3" data-toggle="buttons">
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          2K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          6K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          15K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          20K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          30K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          40K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          60K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          120K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          240K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          250K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          400K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          500K
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          1M
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="account-size"
            class="custom-radio-input"
            autocomplete="off"
          />
          2M
        </label>
      </div>
      @endif

      <div class="section-title">Steps</div>
      <div class="btn-group btn-group-toggle compare_tog" data-toggle="buttons">
        @foreach ($steps as $step)
        <label
          class="btn custom-radio-label {{ request('step') == $step->id ? 'active' : '' }}"
        >
          <input type="radio" name="step" class="custom-radio-input" autocomplete="off"
          value="{{ $step->id }}" {{ request('step') == $step->id ? 'checked' : '' }}>
          {{ $step->name }}
        </label>
        @endforeach
      </div>

      <div class="section-title">Extra Filters</div>
      <div class="btn-group btn-group-toggle compare_togs" data-toggle="buttons">
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="extra-filters1"
            class="custom-radio-input"
            autocomplete="off"
          />
          News Trading Allowed
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="extra-filters2"
            class="custom-radio-input"
            autocomplete="off"
          />
          Only White-Label Tech.
        </label>
        <label class="btn custom-radio-label">
          <input
            type="radio"
            name="extra-filters3"
            class="custom-radio-input"
            autocomplete="off"
          />
          Only Proprietary Tech.
        </label>
      </div>

      <div class="mt-5">
        <button
          class="btn btn-primary btn-block"
          type="submit"
          style="background-color: #7a95f8; border: none; width: 30%"
        >
          Search
        </button>
      </div>
    </div>
  </form>
</template>
<script>
export default {
  props: {
    assetTypes: {
      type: Array,
      required: true,
    },
    top7AccountSizes: {
      type: Array,
      required: true,
    },
    otherAccountSizes: {
      type: Array,
      required: true,
    },
    steps: {
      type: Array,
      required: true,
    },
  },

  data() {
    return {};
  },
  mounted() {},
};
</script>

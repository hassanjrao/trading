<template>
  <div class="row mt-3" id="toggleDiv">
    <div class="col-md-8 chose_option ml-2">
      <ul class="nav nav-tabs justify-content-left" id="checkmyTab" role="tablist">
        <li class="nav-item mb-2" v-for="step in steps" :key="step.id">
          <a
            class="nav-link"
            @click="changeStep(step.id)"
            :id="'step-' + step.id"
            :class="{ active: step.id === selectedStep }"
          >
            {{ step.name }}
          </a>
        </li>
      </ul>
      <div class="tab-content checkout_tabs" id="checkmyTabContent">
        <div
          class="tab-pane fade show active"
          id="all"
          role="tabpanel"
          aria-labelledby="all-tab"
        >
          <p class="sec_title_order mt-3">
            {{ listMsg }}
          </p>

          <br />
          <p>
            <span class="does_not_belong mt-3 text-white" v-if="accountSizes.length == 0 && selectedStep">
              This firm {{ firm.name }} dose not have instant challenges.</span
            >
          </p>
        </div>
        <div
          id="features"
          role="tabpanel"
          aria-labelledby="features-tab"
          v-if="accountSizes.length >0"
        >
          <div class="row mt-3">
            <div class="col-md-6" v-for="accountSize in accountSizes" :key="accountSize.id+Math.random()">
              <div class="form-group form-check pl-0 checks_tabs mb-3">
                <input
                  type="checkbox"
                  class="form-check-input"
                  :id="accountSize.id"
                  :name="accountSize.size"

                  required
                />
                <label class="checkbox-label sec_title_order" :for="accountSize.id">
                    {{ accountSize.size }}
                </label>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    steps: {
      type: Array,
      required: true,
    },
    firm : {
      type: Object,
      required: true,
    },
  },

  data() {
    return {
      selectedStep: null,
      accountSizes: [],
      listMsg: 'Select a step to view account sizes',
    };
  },

  methods: {
    changeStep(step) {
      console.log("changeStep", step);

      this.selectedStep = step;

      axios
        .get("/get-account-sizes", {
          params: {
            step: step,
            firm_id: this.firm.id,
          },
        })
        .then((response) => {
          console.log("response", response.data);
          this.listMsg = 'List of All the Instant Challenges for '+this.firm.name;
            this.accountSizes = response.data.accountSizes;
        })
        .catch((error) => {
          console.error("error", error);
        });
    },
  },
};
</script>

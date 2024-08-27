<template>
  <v-app app>
    <v-tabs background-color="bg-default-darker" center-active dark v-model="tab">
      <v-tab
        v-for="(tab, ind) in tabs"
        :key="ind"
        :disabled="tab.label !== 'firm_info' && !selectedFirmID ? true : false"
      >
        <v-icon small :color="tab.icon.color" class="mr-1">{{ tab.icon.icon }}</v-icon>
        {{ tab.text }}
      </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item v-for="(tab, i) in tabs" :key="i">
        <v-card flat>
          <v-card-text v-if="tab.label == 'firm_info'">
            <FirmInfo
              :createdFirm="firm"
              :asset-types="assetTypes"
              :technologies="technologies"
              :countries="countries"
              :firmID="firmID"
              @firmIDGenerated="getFirmID"
            />
          </v-card-text>

          <v-card-text v-if="tab.label == 'firm_about'">
            <FirmAbout
              :paymentMethods="paymentMethods"
              :payoutMethods="payoutMethods"
              :platforms="platforms"
              :firm="firm"
            />
          </v-card-text>

          <v-card-text v-if="tab.label == 'firm_challenges'">
            <FirmChallenges />
          </v-card-text>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-app>
</template>

<script>
import FirmInfo from "./FirmInfo.vue";
import FirmAbout from "./FirmAbout.vue";
import FirmChallenges from "./FirmChallenges.vue";

export default {
  components: {
    FirmInfo,
    FirmAbout,
    FirmChallenges,
  },

  props: {
    firm: {
      type: Object,
      required: false,
      default: () => ({}),
    },
    firmID: {
      type: Number,
    },
    assetTypes: {
      type: Array,
      required: true,
    },
    steps: {
      type: Array,
      required: true,
    },
    technologies: {
      type: Array,
      required: true,
    },
    accountSizes: {
      type: Array,
      required: true,
    },
    countries: {
      type: Array,
      required: true,
    },
    paymentMethods: {
      type: Array,
      required: true,
    },
    payoutMethods: {
      type: Array,
      required: true,
    },
    platforms: {
      type: Array,
      required: true,
    },
  },

  data() {
    return {
      tab: "firm_info",
      selectedFirmID: null,
      tabs: [
        {
          label: "firm_info",
          text: "Firm Info",
          icon: {
            icon: "mdi-information",
            color: "primary",
          },
        },
        {
          label: "firm_about",
          text: "Firm About",
          icon: {
            icon: "mdi-information",
            color: "primary",
          },
        },
        {
          label: "firm_challenges",
          text: "Firm challenges",
          icon: {
            icon: "mdi-information",
            color: "primary",
          },
        },
      ],
    };
  },

  methods: {
    getFirmID(firmID) {
      this.selectedFirmID = firmID;

      console.log("AddEditFirm.vue getFirmID=>firmID", firmID);
    },
  },

  mounted() {
    console.log("AddEditFirm.vue firmID", this.firm);
    this.selectedFirmID = this.firmID;
  },
};
</script>

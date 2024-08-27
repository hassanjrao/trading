<template>
  <v-app app>
    <v-card-title class="d-flex justify-content-between">
      <h6 class="headline mb-0">Firm About</h6>

      <v-btn color="primary" :loading="loading" @click="submitFirmAbout">Submit</v-btn>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text>
      <v-form ref="firmInfoForm" v-model="valid" lazy-validation>
        <v-container>
          <v-row>
            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="ceo"
                v-model="firmAbout.chief_executive_officer"
                label="CEO"
                :rules="[(v) => !!v || 'CEO is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="3" md="2">
              <v-text-field
                ref="trust_pilot"
                v-model="firmAbout.trust_pilot"
                label="Trust Pilot"
                :rules="[(v) => !!v || 'Trust Pilot is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-autocomplete
                ref="payment_methods"
                v-model="firmAbout.payment_methods"
                label="Payment Method(s)"
                :rules="[(v) => !!v || 'Please select at least one payment method']"
                :items="paymentMethods"
                item-text="name"
                item-value="id"
                chips
                clearable
                deletable-chips
                multiple
                small-chips
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-autocomplete
                ref="payout_methods"
                v-model="firmAbout.payout_methods"
                label="Payout Method(s)"
                :rules="[(v) => !!v || 'Please select at least one Payout method']"
                :items="payoutMethods"
                item-text="name"
                item-value="id"
                chips
                clearable
                deletable-chips
                multiple
                small-chips
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-autocomplete
                ref="platforms"
                v-model="firmAbout.platforms"
                label="Platform(s)"
                :rules="[(v) => !!v || 'Please select at least one Platform']"
                :items="platforms"
                item-text="name"
                item-value="id"
                chips
                clearable
                deletable-chips
                multiple
                small-chips
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="12" md="12">
              <v-textarea
                ref="description"
                v-model="firmAbout.description"
                label="Description"
                :rules="[(v) => !!v || 'Description is required']"
              ></v-textarea>
            </v-col>
          </v-row>
        </v-container>
      </v-form>
    </v-card-text>
  </v-app>
</template>

<script>
import alert from "../../shared/alert";
export default {
  props: {
    firm: {
      type: Object,
      required: false,
      default: () => ({}),
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
      firmAbout: {
        chief_executive_officer: "",
        trust_pilot: "",
        payment_methods: null,
        payout_methods: null,
        platforms: null,
        description: "",
      },
      valid: false,
      loading: false,
    };
  },

  methods: {
    submitFirmAbout() {
      if (!this.$refs.firmInfoForm.validate()) {
        return;
      }

      this.loading = true;


      axios
        .post("/admin/firms/submit-about/", {
            ...this.firmAbout,
            firm_id: this.firm.id,
        })
        .then((response) => {
          this.loading = false;

          this.showStatus(response.data.message, "success");
        })
        .catch((error) => {
          this.loading = false;

          this.showStatus(error.response.data.message, "error");
        });
    },
  },

  mounted() {
    console.log("FirmAbout.vue mounted=>paymentMethods", this.paymentMethods, this.firm);
    if(this.firm && this.firm.about) {
      this.firmAbout =this.firm.about;
      this.firmAbout.payment_methods=this.firm.payment_methods.map((item) => item.id);
        this.firmAbout.payout_methods=this.firm.payout_methods.map((item) => item.id);
        this.firmAbout.platforms=this.firm.platforms.map((item) => item.id);
    }
  },
  created() {
    this.showStatus = alert.showStatus;
  },
};
</script>

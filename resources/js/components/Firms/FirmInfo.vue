<template>
  <v-app app>
    <v-card-title class="d-flex justify-content-between">
      <h6 class="headline mb-0">Firm Information</h6>

      <v-btn color="primary" :loading="loading" @click="submitFirmInfo">Submit</v-btn>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text>
      <v-form ref="firmInfoForm" v-model="valid" lazy-validation>
        <v-container>
          <v-row>
            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="name"
                v-model="firm.name"
                label="Firm Name"
                :rules="[(v) => !!v || 'Name is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="url"
                v-model="firm.url"
                label="Firm URL"
                :rules="[(v) => !!v || 'URL is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-menu
                ref="dateMenu"
                v-model="dateMenu"
                :close-on-content-click="false"
                :return-value.sync="firm.established_date"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="firm.established_date"
                    label="Established Date"
                    prepend-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    :rules="[(v) => !!v || 'Established Date is required']"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="firm.established_date" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="dateMenu = false"> Cancel </v-btn>
                  <v-btn
                    text
                    color="primary"
                    @click="$refs.dateMenu.save(firm.established_date)"
                  >
                    OK
                  </v-btn>
                </v-date-picker>
              </v-menu>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-autocomplete
                ref="asset_type"
                v-model="firm.asset_type_id"
                label="Asset Type"
                :rules="[(v) => !!v || 'Asset Type is required']"
                :items="assetTypes"
                item-text="name"
                item-value="id"
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-autocomplete
                ref="country"
                v-model="firm.country_id"
                label="Country"
                :rules="[(v) => !!v || 'Country is required']"
                :items="countries"
                item-text="name"
                item-value="id"
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-autocomplete
                ref="technology"
                v-model="firm.technology_id"
                label="Technology"
                :rules="[(v) => !!v || 'Technology is required']"
                :items="technologies"
                item-text="name"
                item-value="id"
              ></v-autocomplete>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="profit_split"
                v-model="firm.profit_split"
                label="Profit Split"
                :rules="[(v) => !!v || 'Profit is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-switch
                v-model="firm.direct_path_to_live_funded"
                label="Direct Path to Live Funded"
              ></v-switch>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="payout_frequency"
                v-model="firm.payout_frequency"
                label="Payout Frequency"
                :rules="[(v) => !!v || 'Payout Frequency is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="payout_frequency_note"
                v-model="firm.payout_frequency_note"
                label="Payout Frequency Note"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="daily_drawdown"
                v-model="firm.daily_drawdown"
                label="Daily Drawdown"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-text-field
                ref="main_benefits"
                v-model="firm.main_benefits"
                label="Main Benefits"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-text-field
                ref="main_drawbacks"
                v-model="firm.main_drawbacks"
                label="Main Drawbacks"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <v-text-field
                ref="checkout_link"
                v-model="firm.checkout_link"
                label="Checkout Link"
                :rules="[(v) => !!v || 'Checkout Link is required']"
              ></v-text-field>
            </v-col>


            <v-col cols="12" sm="6" md="4">
              <!-- show image if firm has firm.logo_url -->

              <v-img
                v-if="firm.logo_url"
                :src="firm.logo_url"
                aspect-ratio="1"
                contain
              ></v-img>

              <!-- required if firm.logo_url is null -->
              <v-file-input
                ref="logo"
                v-model="firm.logo"
                label="Firm Logo"
                accept="image/*"
              ></v-file-input>
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
    createdFirm: {
      type: Object,
      required: false,
      default: () => ({}),
    },
    firmID: {
      type: Number,
      required: false,
      default: null,
    },
    assetTypes: {
      type: Array,
      required: true,
    },
    technologies: {
      type: Array,
      required: true,
    },
    countries: {
      type: Array,
      required: true,
    },
  },

  mounted() {
    console.log("FirmInfo.vue mounted=>technologies", this.technologies);
    this.selectedFirmID = this.firmID;
  },

  data() {
    return {
      dateMenu: false,
      valid: false,
      loading: false,
      selectedFirmID: null,
      firm: {
        name: null,
        logo: null,
        url: null,
        established_date: null,
        asset_type_id: null,
        technology_id: null,
        direct_path_to_live_funded: false,
        payout_frequency: null,
        payout_frequency_note: null,
        profit_split: null,
        daily_drawdown: null,
        country_id: null,
        main_benefits: null,
        main_drawbacks: null,
        checkout_link: null,
      },
    };
  },

  methods: {
    submitFirmInfo() {
      if (!this.$refs.firmInfoForm.validate()) return;

      console.log("firm", this.firm.logo);

      if(!this.firm.logo && !this.firm.logo_url) {
        this.showStatus("Firm Logo is required", "error");
        return;
      }

      this.loading = true;

      const formData = new FormData();
      if(this.selectedFirmID) {
        formData.append("firm_id", this.selectedFirmID);
      }
      formData.append("name", this.firm.name);
      formData.append("url", this.firm.url);
      formData.append("established_date", this.firm.established_date);
      formData.append("asset_type", this.firm.asset_type_id);
      formData.append("technology", this.firm.technology_id);
      formData.append("direct_path_to_live_funded", this.firm.direct_path_to_live_funded);
      formData.append("payout_frequency", this.firm.payout_frequency);
      formData.append("payout_frequency_note", this.firm.payout_frequency_note);
      formData.append("daily_drawdown", this.firm.daily_drawdown);
      formData.append("country", this.firm.country_id);
        formData.append("profit_split", this.firm.profit_split);
        formData.append("main_benefits", this.firm.main_benefits);
        formData.append("main_drawbacks", this.firm.main_drawbacks);
        formData.append("checkout_link", this.firm.checkout_link);

      if(this.firm.logo) {
        console.log("logo", this.firm.logo);
        formData.append("logo", this.firm.logo);
      }

      console.log("formData", formData);

      axios
        .post("/admin/firms/create-firm", formData)
        .then((response) => {
          console.log("response", response);
          this.loading = false;
          this.selectedFirmID = response.data.data.firm.id;

          this.firm.id=this.selectedFirmID

          console.log("firmID", this.selectedFirmID);
          this.$emit("firmIDGenerated", this.selectedFirmID);
          this.showStatus(response.data.message, "success");
        })
        .catch((error) => {
          console.log("error", error);
          this.loading = false;
          this.showStatus(error.response.data.message, "error");
        });
    },
  },
  created() {
    this.showStatus = alert.showStatus;

    if (this.createdFirm) {
      this.firm = this.createdFirm;
      this.firm.asset_type_id = this.createdFirm.asset_type ? this.createdFirm.asset_type.id : null;
        this.firm.technology_id = this.createdFirm.technology.id ? this.createdFirm.technology.id : null;
        this.firm.country_id = this.createdFirm.country.id ? this.createdFirm.country.id : null;
        this.firm.direct_path_to_live_funded=this.createdFirm.direct_path_to_live_funded == 1 ? true : false;

    }
  },
};
</script>

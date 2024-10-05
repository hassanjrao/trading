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
            <v-col cols="12" sm="6" md="4">
              <v-text-field
                ref="linkedin_url"
                v-model="firmAbout.linkedin_url"
                label="Linkedin URL"
                :rules="[(v) => !!v || 'Linkedin URL is required']"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="3" md="2">
              <v-text-field
                ref="trust_pilot"
                v-model="firmAbout.trust_pilot"
                label="Trust Pilot"
                :rules="[(v) => !!v || 'Trust Pilot Score is required']"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="3" md="2">
              <v-text-field
                ref="trustpilot_url"
                v-model="firmAbout.trustpilot_url"
                label="Trust Pilot URL"
                :rules="[(v) => !!v || 'Trust Pilot URL is required']"
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

            <v-col cols="12" sm="6" md="6">
              <v-text-field
                ref="commission_strucuture_link"
                v-model="firmAbout.commission_strucuture_link"
                label="Commission Structure Link"
              ></v-text-field>
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

          <v-row>
            <v-col cols="12" sm="12" md="12">
              <!-- add icon -->
              <v-btn color="primary" @click="addCommissionStructure">
                <i class="mdi mdi-plus"></i>
              </v-btn>
              <v-simple-table>
                <template v-slot:default>
                  <thead>
                    <tr>
                      <th class="text-left">Comission Structure</th>
                      <th class="text-left">Note</th>
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(commission, index) in allFirmComssionStructures"
                      :key="cmStKey + index"
                    >
                      <td>
                        <v-autocomplete
                          v-model="commission.commission_structure_id"
                          label="Commission Structure"
                          :rules="[
                            (v) => !!v || 'Please select at least one payment method',
                          ]"
                          :items="commissionStructures"
                          item-text="name"
                          item-value="id"
                          chips
                        ></v-autocomplete>
                      </td>
                      <td>
                        <v-text-field
                          ref="note"
                          v-model="commission.note"
                          label="Note"
                          :rules="[(v) => !!v || 'Note is required']"
                        ></v-text-field>
                      </td>

                      <td>
                        <v-btn color="primary" @click="removeCommissionStructure(index)">
                          <i class="mdi mdi-delete"></i>
                        </v-btn>
                      </td>
                    </tr>
                  </tbody>
                </template>
              </v-simple-table>
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

    commissionStructures: {
      type: Array,
      required: true,
    },
  },

  data() {
    return {
      allFirmComssionStructures: [],
      cmStKey: "cmStKey",
      firmAbout: {
        chief_executive_officer: "",
        linkedin_url: "",
        trust_pilot: "",
        trustpilot_url: "",
        commission_strucuture_link: "",
        payment_methods: null,
        payout_methods: null,
        platforms: null,
        description: "",
        commission_structures: [],
      },
      valid: false,
      loading: false,
    };
  },

  methods: {
    addCommissionStructure() {
      //  add at first

      this.allFirmComssionStructures.unshift({
        commission_structure_id: null,
        note: "",
      });
      //   change key
      this.cmStKey = Math.random().toString(36).substring(7);
      console.log("addCommissionStructure=>", this.allFirmComssionStructures);
    },

    removeCommissionStructure(index) {
      this.allFirmComssionStructures.splice(index, 1);
    },

    submitFirmAbout() {
      if (!this.$refs.firmInfoForm.validate()) {
        return;
      }

      this.loading = true;

      axios
        .post("/admin/firms/submit-about", {
          ...this.firmAbout,
          firm_id: this.firm.id,
          commission_structures: this.allFirmComssionStructures,
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
    if (this.firm && this.firm.about) {
      this.firmAbout = this.firm.about;
      this.firmAbout.payment_methods = this.firm.payment_methods.map((item) => item.id);
      this.firmAbout.payout_methods = this.firm.payout_methods.map((item) => item.id);
      this.firmAbout.platforms = this.firm.platforms.map((item) => item.id);
      this.allFirmComssionStructures = this.firm.commission_structures.map((item) => {
        return {
          commission_structure_id: item.commission_structure_id,
          note: item.note,
        };
      });

      console.log('allFirmComssionStructures=>', this.allFirmComssionStructures);
      console.log('coms',this.commissionStructures);
    }
  },
  created() {
    this.showStatus = alert.showStatus;
  },
};
</script>

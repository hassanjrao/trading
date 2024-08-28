<template>
  <v-app app>
    <v-card-title class="d-flex justify-content-between">
      <h6 class="headline mb-0">Firm Challenges</h6>

      <div class="d-flex">
        <v-btn color="primary" :loading="loading" @click="submitChallenges">Submit</v-btn>

        <v-btn color="success" :loading="loading" @click="addChallenge()">Add More</v-btn>
      </div>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text>
      <v-form ref="firmInfoForm" v-model="valid" lazy-validation>
        <v-container>
          <v-card
            v-for="(firmChallenge, index) in firmChallenges"
            :key="index"
            class="mb-4"
          >
            <v-card-title class="d-flex justify-content-end">
              <!-- remove btn -->
              <v-btn color="error"  small elevation="2" @click="firmChallenges.splice(index, 1)">
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </v-card-title>
            <v-card-text>
              <v-row>
                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="actual_price"
                    v-model="firmChallenge.actual_price"
                    label="Actual Price"
                    :rules="[(v) => !!v || 'Actual Price is required']"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="actual_price_note"
                    v-model="firmChallenge.actual_price_note"
                    label="Actual Price Note"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="before_price"
                    v-model="firmChallenge.before_price"
                    label="Before Price"
                    :rules="[(v) => !!v || 'Before Price is required']"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-autocomplete
                    ref="account_size_id"
                    v-model="firmChallenge.account_size_id"
                    label="Account Size"
                    :rules="[(v) => !!v || 'Account Size is required']"
                    :items="accountSizes"
                    item-text="size"
                    item-value="id"
                  ></v-autocomplete>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-autocomplete
                    ref="step"
                    v-model="firmChallenge.step"
                    label="Step"
                    :rules="[(v) => !!v || 'Step is required']"
                    :items="steps"
                    item-text="name"
                    item-value="id"
                    return-object
                    @change="stepSelected(index,firmChallenge)"
                  ></v-autocomplete>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="activation_fee"
                    v-model="firmChallenge.activation_fee"
                    label="Activation Fee"
                    :rules="[(v) => !!v || 'Activation Fee is required']"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="rewards"
                    v-model="firmChallenge.rewards"
                    label="Rewards"
                    :rules="[(v) => !!v || 'Rewards is required']"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="2">
                  <v-text-field
                    ref="profit_split"
                    v-model="firmChallenge.profit_split"
                    label="Profit Split"
                    :rules="[(v) => !!v || 'Profit Split is required']"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-divider></v-divider>
              <v-row>
                <v-simple-table fixed-header height="300px">
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Profit Target</th>
                        <th class="text-left">Max Daily Loss</th>
                        <th class="text-left">Max Daily Loss Note</th>
                        <th class="text-left">Max Total Drawdown</th>
                        <th class="text-left">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr v-for="(firmDetail, index) in firmChallenge.firm_challenge_details" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>
                          <v-text-field
                            ref="profit_target"
                            v-model="firmDetail.profit_target"
                            label="Profit Target"
                            :rules="[(v) => !!v || 'Profit Target is required']"
                          ></v-text-field>
                        </td>
                        <td>
                          <v-text-field
                            ref="max_daily_loss"
                            v-model="firmDetail.max_daily_loss"
                            label="Max Daily Loss"
                            :rules="[(v) => !!v || 'Max Daily Loss is required']"
                          ></v-text-field>
                        </td>
                        <td>
                          <v-text-field
                            ref="max_daily_loss_note"
                            v-model="firmDetail.max_daily_loss_note"
                            label="Max Daily Loss Note"
                          ></v-text-field>
                        </td>
                        <td>
                          <v-text-field
                            ref="max_total_drawdown"
                            v-model="firmDetail.max_total_drawdown"
                            label="Max Total Drawdown"
                            :rules="[(v) => !!v || 'Max Total Drawdown is required']"
                          ></v-text-field>
                        </td>
                        <td>
                          <v-btn color="error"  small @click="firmChallenge.firm_challenge_details.splice(index, 1)">
                            <v-icon>mdi-delete</v-icon>
                          </v-btn>
                        </td>
                      </tr>
                    </tbody>


                  </template>
                </v-simple-table>
              </v-row>
            </v-card-text>
          </v-card>
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
    accountSizes: {
      type: Array,
      required: false,
      default: () => [],
    },
    steps: {
      type: Array,
      required: false,
      default: () => [],
    },
  },

  data() {
    return {
      loading: false,
      valid: false,

      firmChallenges: [
        {
          actual_price: null,
          actual_price_note: null,
          before_price: null,
          account_size_id: null,
          step: null,
          step_id: null,
          activation_fee: null,
          rewards: null,
          profit_split: null,
          firm_challenge_details: [
            {
              profit_target: null,
              max_daily_loss: null,
              max_daily_loss_note: null,
              max_total_drawdown: null,
            },
          ],
        },
      ],
    };
  },

  methods: {

    stepSelected(index, firmChallenge) {
      console.log("stepSelected", index, firmChallenge);
        firmChallenge.step_id = firmChallenge.step.id;

        let steps= firmChallenge.step.steps;

        // add items in firm_challenge_details according to steps
        this.$set(firmChallenge, "firm_challenge_details", []);
        for (let i = 0; i < steps; i++) {
          firmChallenge.firm_challenge_details.push({
            profit_target: null,
            max_daily_loss: null,
            max_daily_loss_note: null,
            max_total_drawdown: null,
          });
        }

    },

    submitChallenges() {

        if(!this.$refs.firmInfoForm.validate()) return;

        console.log("firmChallenges", this.firmChallenges);

        this.loading = true;

        axios
        .post("/admin/firms/submit-challenges", {
            firm_challenges: this.firmChallenges,
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
    addChallenge() {
      // add in first index
      this.firmChallenges.unshift({
        actual_price: null,
        actual_price_note: null,
        before_price: null,
        account_size_id: null,
        step: null,
        activation_fee: null,
        rewards: null,
        profit_split: null,
        firm_challenge_details: [
          {
            profit_target: null,
            max_daily_loss: null,
            max_daily_loss_note: null,
            max_total_drawdown: null,
          },
        ],
      });
    },
  },

  mounted() {
    console.log("FirmChallenge.vue mounted", this.firm);

    if(this.firm){
        this.firmChallenges = this.firm.firm_challenges;

    }

  },
  created() {
    this.showStatus = alert.showStatus;
  },
};
</script>

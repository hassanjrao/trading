<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 col-12 ml-3 mr-3">
        <form class="">
          <h2 class="page_title pt-4 pb-4 text-center text-white">
            Review / Report Firms
          </h2>
          <div class="review_tabs" v-if="step == 1">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 1 : Find the Firm</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div
                  class="search-containers"
                  style="background: #d0d0d0; padding-top: 7px; padding-bottom: 7px"
                >
                  <input
                    type="text"
                    style="background: transparent"
                    class="search-input"
                    placeholder='Try searching "My Funded FX"'
                    v-model="search"
                    @keyup="searchFirm"
                  />

                  <button
                    class="search-button"
                    type="button"
                    v-if="selectedFirm"
                    @click="nextStep"
                  >
                    <img
                      src="https://img.icons8.com/ios-glyphs/30/ffffff/arrow.png"
                      alt="Search"
                    />
                  </button>
                  <button class="search-button" v-else type="button">
                    <img
                      src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png"
                      alt="Search"
                    />
                  </button>
                </div>
                <div class="search-results" id="searchCont" v-if="firms.length > 0">
                  <div
                    class="firm-logo"
                    style="cursor: pointer"
                    v-for="firm in firms"
                    :key="firm.id"
                    @click="selectedFirm = firm"
                    v-bind="
                      selectedFirm && selectedFirm.id === firm.id
                        ? { class: 'firm-selected' }
                        : {}
                    "
                  >
                    <img :src="firm.logo_url" alt="Firm Logo" />
                    <div>
                      <a>{{ firm.name }}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br />
            <p style="font-size: 16px; color: #828282">
              Do you report a payout denial or unjustified breach ?
            </p>

            <div class="step_form_btn r_r_btn d-flex">
              <button
                type="button"
                class="btn btn-primary frmbtn"
                style="color: #7a95f8"
                @click="btnSelectedClicked('no')"
                :class="{ active: btnSelected == 'no' ? true : false }"
              >
                No
              </button>
              <button
                type="button"
                class="btn btn-primary frmbtn"
                style="color: #7a95f8"
                @click="btnSelectedClicked('payoutDenial')"
                :class="{ active: btnSelected == 'payoutDenial' ? true : false }"
              >
                Payout Denial
              </button>
              <button
                type="button"
                class="btn btn-primary frmbtn"
                style="color: #7a95f8"
                @click="btnSelectedClicked('unjustifiedBreach')"
                :class="{ active: btnSelected == 'unjustifiedBreach' ? true : false }"
              >
                Unjustified Breach
              </button>
            </div>
          </div>
          <div class="review_tabs" v-if="step == 2 && selectedFirm">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 2 : Accounts Detail</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <p
                    style="display: flex; align-items: center; justify-content: flex-end"
                  >
                    <img
                      class="img_data"
                      style="width: 50px"
                      :src="selectedFirm.logo_url"
                    />
                    <span class="p_name">
                      <b>
                        {{ selectedFirm.name }}
                      </b>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control review_form_input"
                  placeholder="Name"
                  v-model="user.name"
                  disabled
                  name="name"
                  style="
                    padding-top: 23px;
                    padding-bottom: 23px;
                    background: #d0d0d0;
                    border: 0;
                  "
                />
              </div>
              <div class="col-md-6">
                <input
                  type="email"
                  class="form-control review_form_input"
                  placeholder="Email"
                  name="email"
                  disabled
                  v-model="user.email"
                  style="
                    padding-top: 23px;
                    padding-bottom: 23px;
                    background: #d0d0d0;
                    border: 0;
                  "
                />
              </div>
            </div>
            <br class="none" />
            <div class="row">
              <div class="col-md-6">
                <select
                  class="form-control review_form_input"
                  style="height: 47px"
                  v-model="selectedAccountSize"
                  @change="accountSizeSelected"
                >
                  <!-- select first index -->
                  <option value="">Account Size</option>
                  <option
                    v-for="(accountSize, index) in accountSizes"
                    :key="accountSize.id"
                    :value="accountSize.id"
                    :selected="index === 0"
                  >
                    {{ accountSize.size }}
                  </option>
                </select>
              </div>
              <div class="col-md-6">
                <select
                  class="form-control review_form_input"
                  style="height: 47px"
                  v-model="selectedStep"
                >
                  <option value="">Step</option>
                  <option
                    v-for="(step, index) in steps"
                    :key="step.id"
                    :value="step.id"
                    :selected="index === 0"
                    :label="step.name"
                  >
                    {{ step.step }}
                  </option>
                </select>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-6 col-6 text-right">
                <button
                  type="button"
                  @click="backStep()"
                  class="btn btn-primary r_button frmbtn_back"
                >
                  Back
                </button>
              </div>
              <div class="col-md-6 col-6 text-left">
                <button
                  type="button"
                  @click="nextStep()"
                  style="color: white !important"
                  class="btn btn-primary frmbtn r_button"
                >
                  Next
                </button>
              </div>
            </div>
          </div>
          <div class="review_tabs" id="step3" v-if="step == 3">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 3 : Rating / Review</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <p
                    style="display: flex; align-items: center; justify-content: flex-end"
                  >
                    <img
                      class="img_data"
                      style="width: 50px"
                      :src="selectedFirm.logo_url"
                    />
                    <span class="p_name">
                      <b>{{ selectedFirm.name }}</b>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <br />
            <textarea
              placeholder="Review of the firm (minimum 150 characters)"
              v-model="review"
              class="form-control review_form_input p-4"
              rows="10"
            ></textarea>
            <p class="text-danger" v-if="reviewError ? true : false">
              {{ reviewError }}
            </p>
            <br />
            <div class="row justify-content-center">
              <div
                class="col-lg-6 d-flex flex-column justify-content-center align-items-center"
                v-for="rating in ratings"
              >
                <div
                  class="rating rating d-flex justify-content-center align-items-center"
                >
                  <svg
                    class="star-container"
                    :class="rating.key"
                    v-for="i in 5"
                    :data-value="i"
                    @click="starSelected(i, rating.key)"
                  >
                    <use xlink:href="#star" class="star"></use>
                  </svg>
                </div>
                <p>
                  {{ rating.label }}
                </p>
              </div>

              <div
                class="col-lg-12 d-flex flex-column justify-content-center align-items-center"
              >
                <svg width="0" height="0" class="star-outline">
                  <defs>
                    <linearGradient id="gradientBorder" gradientTransform="rotate(45)">
                      <stop offset="10%" stop-color="#7a95f8" />
                      <stop offset="90%" stop-color="#6453ca" />
                    </linearGradient>
                    <linearGradient id="gradientFill" gradientTransform="rotate(45)">
                      <stop offset="20%" stop-color="#7a95f8" />
                      <stop offset="80%" stop-color="#6453ca" />
                    </linearGradient>
                    <symbol id="star" viewBox="0 0 24 24">
                      <!-- Rounded star path -->
                      <path
                        d="M12 2.5
                                                                    L14.09 8.26
                                                                    L20.18 8.84
                                                                     L15.64 12.97
                                                                     L17.45 19.02
                                                                     L12 15.77
                                                                     L6.55 19.02
                                                                     L8.36 12.97
                                                                     L3.82 8.84
                                                                     L9.91 8.26
                                                                     Z"
                        style="stroke-linejoin: round; stroke-linecap: round"
                      />
                    </symbol>
                  </defs>
                </svg>
              </div>
            </div>

            <br />
            <div class="row">
              <div class="col-md-6 text-right col-6">
                <button
                  type="button"
                  @click="backStep()"
                  class="btn btn-primary r_button frmbtn_back"
                >
                  Back
                </button>
              </div>
              <div class="col-md-6 text-left col-6">
                <button
                  type="button"
                  @click="nextStep()"
                  style="color: white !important"
                  class="btn btn-primary frmbtn r_button"
                >
                  Next
                </button>
              </div>
            </div>
          </div>
          <div class="review_tabs" id="step4" v-if="step == 4">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 4 : Confirmation</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <p
                    style="display: flex; align-items: center; justify-content: flex-end"
                  >
                    <img
                      class="img_data"
                      style="width: 50px"
                      :src="selectedFirm.logo_url"
                    />
                    <span class="p_name">
                      <b>
                        {{ selectedFirm.name }}
                      </b>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for=""
                    >Order Confirmation (Required)</label
                  >
                <div class="Confirmation_container">
                  <input
                    type="file"
                    class="confirmation-input"
                    placeholder=""
                    ref="orderConfirmationFile"
                    @change="orderConfirmation = $refs.orderConfirmationFile.files[0]"
                  />
                  <img src="/front-assets/images/document 1.png" alt="document" />
                </div>
              </div>

              <p class="text-danger pl-3" v-if="orderConfirmationError ? true : false">
                {{ orderConfirmationError }}
              </p>
            </div>
            <br />
            <div class="row">
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input p-4"
                  rows="6"
                  placeholder="What are the main advantages of this company?"
                  v-model="mainAdvantages"
                ></textarea>
              </div>
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input p-4"
                  rows="6"
                  placeholder="What are the main drawbacks of this company?"
                  v-model="mainDrawbacks"
                ></textarea>
              </div>
            </div>
            <br />
            <div class="form-group form-check review">
              <input
                type="checkbox"
                class="form-check-input"
                id="terms"
                v-model="termsCondtions"
              />
              <label class="checkbox-label" for="terms"
                >I accept the Terms of Service & Privacy Policy</label
              >
              <p class="text-danger" v-if="termsCondtionsError ? true : false">
                {{ termsCondtionsError }}
              </p>
            </div>
            <br />

            <div class="row">
              <div class="col-md-6 text-right col-6">
                <button
                  type="button"
                  @click="backStep()"
                  class="btn btn-primary r_button frmbtn_back"
                >
                  Back
                </button>
              </div>
              <div class="col-md-6 text-left col-6">
                <button
                  type="button"
                  id="submit_form"
                  class="btn btn-primary frmbtn r_button"
                  :disabled="loading"
                  style="color: white !important"
                  @click="submitReview()"
                >
                  Submit
                </button>
              </div>
            </div>
          </div>

          <div class="review_tabs" id="step5" v-if="step == 5">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 2 : Details</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <p
                    style="display: flex; align-items: center; justify-content: flex-end"
                  >
                    <img
                      class="img_data"
                      style="width: 50px"
                      :src="selectedFirm.logo_url"
                    />
                    <span class="p_name">
                      <b>{{ selectedFirm.name }}</b>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for=""
                    >Upload Funding Certificate form the firm (Required)</label
                  >
                <div class="Confirmation_container">


                  <input
                    type="file"
                    class="confirmation-input"
                    placeholder=""
                    ref="fundingCertificateFile"
                    @change="fundingCertificate = $refs.fundingCertificateFile.files[0]"
                  />
                  <img src="/front-assets/images/document 1.png" alt="document" />
                </div>
                <p class="text-danger pl-3" v-if="fundingCertificateError ? true : false">
                  {{ fundingCertificateError }}
                </p>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input pt-4"
                  rows="6"
                  placeholder="What is the firm’s reason for refusing payout?"
                  v-model="refusingPayoutReason"
                ></textarea>
                <p
                  class="text-danger pl-3"
                  v-if="refusingPayoutReasonError ? true : false"
                >
                  {{ refusingPayoutReasonError }}
                </p>
              </div>
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input pt-4"
                  rows="6"
                  placeholder="Add more details (Falculative)"
                  v-model="payoutMoreDetails"
                ></textarea>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-12">
                <label for=""
                    >Upload correspondence with the company (Falculative)</label
                  >
                <div class="Confirmation_container">
                  <input
                    type="file"
                    class="confirmation-input"
                    placeholder=""
                    ref="correspondenceFile"
                    @change="correspondence = $refs.correspondenceFile.files[0]"
                  />
                  <img src="/front-assets/images/document 1.png" alt="document" />
                </div>
              </div>
            </div>
            <br />
            <div class="form-group form-check review">
              <input
                type="checkbox"
                class="form-check-input"
                id="terms"
                v-model="termsCondtions"
              />
              <label class="checkbox-label" for="terms"
                >I accept the Terms of Service & Privacy Policy</label
              >
              <p class="text-danger" v-if="termsCondtionsError ? true : false">
                {{ termsCondtionsError }}
              </p>
            </div>
            <br />

            <div class="row">
              <div class="col-md-6 text-right col-6">
                <button
                  type="button"
                  @click="backStep()"
                  class="btn btn-primary r_button frmbtn_back"
                >
                  Back
                </button>
              </div>
              <div class="col-md-6 text-left col-6">
                <button
                  type="button"
                  id="submit_form"
                  class="btn btn-primary frmbtn r_button"
                  @click="submitPayoutDenial()"
                  style="color: white !important"
                >
                  Submit
                </button>
              </div>
            </div>
          </div>

          <div class="review_tabs" id="step5" v-if="step == 'unjustifiedBreach'">
            <div class="row">
              <div class="col-md-4">
                <div class="p_data">
                  <div class="data_r">
                    <p class="revie_title">Step 2 : Details</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <p
                    style="display: flex; align-items: center; justify-content: flex-end"
                  >
                    <img
                      class="img_data"
                      style="width: 50px"
                      :src="selectedFirm.logo_url"
                    />
                    <span class="p_name">
                      <b>{{ selectedFirm.name }}</b>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input pt-4"
                  rows="6"
                  placeholder="What is the firm’s reason for breaching your account?"
                  v-model="breachingReason"
                ></textarea>
                <p class="text-danger pl-3" v-if="breachingReasonError ? true : false">
                  {{ breachingReasonError }}
                </p>
              </div>
              <div class="col-md-6">
                <textarea
                  class="form-control review_form_input pt-4"
                  rows="6"
                  placeholder="Add more details (Falculative)"
                  v-model="breachingMoreDetails"
                ></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="">Upload breach email from Firm (Required)</label>

                <div class="Confirmation_container">
                  <input
                    type="file"
                    class="confirmation-input"
                    placeholder="Upload Funding Certificate form the firm (Required)"
                    ref="breachEmailFile"
                    @change="breachEmail = $refs.breachEmailFile.files[0]"
                  />
                  <img src="/front-assets/images/document 1.png" alt="document" />
                </div>
                <p class="text-danger pl-3" v-if="breachEmailError ? true : false">
                  {{ breachEmailError }}
                </p>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-12">
                <label for="">Upload correspondence with the company (Falculative)</label>

                <div class="Confirmation_container">
                  <input
                    type="file"
                    class="confirmation-input"
                    placeholder=""
                    ref="correspondenceFile"
                    @change="correspondence = $refs.correspondenceFile.files[0]"
                  />
                  <img src="/front-assets/images/document 1.png" alt="document" />
                </div>
              </div>
            </div>
            <br />
            <div class="form-group form-check review">
              <input
                type="checkbox"
                class="form-check-input"
                id="terms"
                v-model="termsCondtions"
              />
              <label class="checkbox-label" for="terms"
                >I accept the Terms of Service & Privacy Policy</label
              >
              <p class="text-danger" v-if="termsCondtionsError ? true : false">
                {{ termsCondtionsError }}
              </p>
            </div>
            <br />

            <div class="row">
              <div class="col-md-6 text-right col-6">
                <button
                  type="button"
                  @click="backStep()"
                  class="btn btn-primary r_button frmbtn_back"
                >
                  Back
                </button>
              </div>
              <div class="col-md-6 text-left col-6">
                <button
                  type="button"
                  id="submit_form"
                  class="btn btn-primary frmbtn r_button"
                  @click="submitBreach()"
                  style="color: white !important"
                >
                  Submit
                </button>
              </div>
            </div>
          </div>
        </form>
        <div class="" id="" v-if="step == 7">
          <h2 class="page_title pt-4 text-center text-white">Submission Confirmed</h2>
          <div
            class="data mt-4 text-center"
            style="background-color: #fbf5f3; border-radius: 20px; padding: 20px"
          >
            <p style="display: flex; align-items: center; justify-content: center">
              <img class="img_data" :src="selectedFirm.logo_url" />
              <span class="p_name">
                <b>
                  {{ selectedFirm.name }}
                </b>
              </span>
            </p>
            <br />
            <p class="text-center" style="font-size: 16px; color: #828282">
              {{ confirmMsg }}
            </p>

            <a href="/" style="color: white !important" class="btn btn-primary frmbtn"
              >Back to website</a
            >
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
    <br />
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    accountSizes: {
      type: Array,
      required: true,
    },

    // steps: {
    //   type: Array,
    //   required: true,
    // },

    user: {
      type: Object,
      required: true,
    },
  },

  mounted() {
    console.log("Component mounted.");
  },

  data() {
    return {
      search: "",
      loading: false,
      firms: [],
      steps: [],
      selectedFirm: null,
      btnSelected: "no",
      step: 1,
      reviewError: false,
      review: null,
      refusingPayoutReason: null,
      refusingPayoutReasonError: false,
      payoutMoreDetails: null,
      orderConfirmationError: false,
      orderConfirmation: null,
      correspondence: null,
      correspondenceError: false,
      fundingCertificate: null,
      fundingCertificateError: false,
      termsCondtionsError: false,
      breachEmail: null,
      breachEmailError: false,
      breachingReason: null,
      breachingReasonError: false,
      breachingMoreDetails: null,
      mainAdvantages: null,
      mainDrawbacks: null,
      termsCondtions: null,
      selectedAccountSize: "",
      selectedStep: "",
      confirmMsg: "",
      ratings: [
        {
          key: "dashboard",
          label: "Dashboard",
          ratings: 0,
        },
        {
          key: "support_team",
          label: "Support Team",
          ratings: 0,
        },
        {
          key: "payout_process",
          label: "Payout Process",
          ratings: 0,
        },
        {
          key: "rules",
          label: "Rules",
          ratings: 0,
        },
        {
          key: "general_rating",
          label: "General Rating",
          ratings: 0,
        },
      ],
      userRatings: {},
    };
  },

  methods: {
    btnSelectedClicked(selected) {
      this.btnSelected = selected;

      console.log("btnSelected", this.btnSelected);
    },

    submitReview() {
      if (!this.orderConfirmation) {
        this.orderConfirmationError = "Order Confirmation is required";
        return;
      } else {
        this.orderConfirmationError = false;
      }

      if (!this.termsCondtions) {
        this.termsCondtionsError = "Please accept the terms and conditions";
        return;
      } else {
        this.termsCondtionsError = false;
      }

      const formData = new FormData();
      formData.append("firm_id", this.selectedFirm.id);
      formData.append("review", this.review);
      formData.append("order_confirmation", this.orderConfirmation);
      formData.append("main_advantages", this.mainAdvantages);
      formData.append("main_drawbacks", this.mainDrawbacks);
      formData.append("ratings", JSON.stringify(this.userRatings));
      formData.append("account_size_id", this.selectedAccountSize);
      formData.append("step_id", this.selectedStep);

      console.log("formData", formData);

      this.loading = true;

      axios
        .post("/review-report/store", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          console.log(response.data);
          this.step = 7;
          this.confirmMsg = response.data.message;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },

    submitPayoutDenial() {
      if (!this.fundingCertificate) {
        this.fundingCertificateError = "Funding Certificate is required";
        return;
      } else {
        this.fundingCertificateError = false;
      }

      if (!this.refusingPayoutReason) {
        this.refusingPayoutReasonError = "Refusing Payout Reason is required";
        return;
      } else {
        this.refusingPayoutReasonError = false;
      }

      if (!this.termsCondtions) {
        this.termsCondtionsError = "Please accept the terms and conditions";
        return;
      } else {
        this.termsCondtionsError = false;
      }

      const formData = new FormData();
      formData.append("firm_id", this.selectedFirm.id);
      formData.append("funding_certificate", this.fundingCertificate);
      formData.append("correspondence", this.correspondence);
      formData.append("refusing_payout_reason", this.refusingPayoutReason);
      formData.append("payout_more_details", this.payoutMoreDetails);

      console.log("formData", formData);

      this.loading = true;

      axios
        .post("/review-report/payout-denial", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          console.log(response.data);
          this.step = 7;
          this.confirmMsg = response.data.message;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },

    submitBreach() {
      if (!this.breachingReason) {
        this.breachingReasonError = "Breaching Reason is required";
        return;
      } else {
        this.breachingReasonError = false;
      }

      if (!this.breachEmail) {
        this.breachEmailError = "Breach Email is required";
        return;
      } else {
        this.breachEmailError = false;
      }

      if (!this.termsCondtions) {
        this.termsCondtionsError = "Please accept the terms and conditions";
        return;
      } else {
        this.termsCondtionsError = false;
      }

      const formData = new FormData();
      formData.append("firm_id", this.selectedFirm.id);
      formData.append("correspondence", this.correspondence);
      formData.append("breach_email", this.breachEmail);
      formData.append("breaching_reason", this.breachingReason);
      formData.append("breaching_more_details", this.breachingMoreDetails);

      console.log("formData", formData);

      this.loading = true;

      axios
        .post("/review-report/store-breaches", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          console.log(response.data);
          this.step = 7;
          this.confirmMsg = response.data.message;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },

    accountSizeSelected() {
      if (!this.selectedAccountSize) {
        return;
      }

      this.steps = [];

      axios
        .get("/review-report/get-steps", {
          params: {
            account_size_id: this.selectedAccountSize,
            firm_id: this.selectedFirm.id,
          },
        })
        .then((response) => {
          this.steps = response.data.steps;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    starSelected(stars, container) {
      //   add class to the selected star
      const starContainers = document.querySelectorAll(`.${container}`);
      console.log(starContainers);
      starContainers.forEach((starContainer) => {
        const star = starContainer.querySelector("use");
        const starValue = starContainer.getAttribute("data-value");

        if (starValue <= stars) {
          star.classList.add("selected");
        } else {
          star.classList.remove("selected");
        }
      });

      this.userRatings[container] = stars;

      console.log("userRatings", this.userRatings);
    },

    nextStep() {
      if (this.step == 3) {
        console.log("review", this.review);

        if (!this.review) {
          this.reviewError = "Please write a review of at least 150 characters";
          return;
        }

        if (this.review.length < 150) {
          this.reviewError = "Review must be at least 150 characters";
          return;
        }
      }

      console.log("btnSelected", this.btnSelected);

      if (this.btnSelected == "payoutDenial") {
        this.step = 5;
        return;
      }

      if (this.btnSelected == "unjustifiedBreach") {
        this.step = "unjustifiedBreach";
        return;
      }

      this.step++;
    },

    backStep() {
      if (this.btnSelected == "payoutDenial") {
        this.step = 1;
        return;
      }

      if (this.btnSelected == "unjustifiedBreach") {
        this.step = 1;
        return;
      }

      this.step--;
    },

    searchFirm() {
      if (!this.search) {
        this.firms = [];
        return;
      }

      axios
        .get("/firms/search", {
          params: {
            search: this.search,
          },
        })
        .then((response) => {
          this.firms = response.data.data.firms;

          console.log(this.firms);
        })
        .catch((error) => {
          console.log(error);
          this.firms = [];
        })
        .finally(() => {
          console.log("Request completed.");
        });
    },
  },
};
</script>

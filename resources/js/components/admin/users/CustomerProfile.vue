<template>
  <div class="content">
    <div
      class="breadcrumb-wrapper d-flex align-items-center justify-content-between"
    >
      <div>
        <p class="breadcrumbs">
          <span><a href="/admin/dashboard">Dashboard</a></span>
          <span><i class="mdi mdi-chevron-right"></i></span>
          <router-link to="/admin/customer" class="">Customer </router-link>
          <span><i class="mdi mdi-chevron-right"></i></span>Profile
        </p>
      </div>
      <div>
        <router-link to="/admin/customer" class="btn btn-primary"
          >View All
        </router-link>
      </div>
    </div>

    <div class="card bg-white profile-content vendor-profile">
      <div class="row">
        <div class="col-lg-4 col-xl-3">
          <div class="profile-content-left profile-left-spacing">
            <div class="disp">
              <div class="text-center widget-profile px-0 border-0">
                <div class="card-img mx-auto rounded-circle">
                  <img src="/assets/img/user/user1.png" alt="user image" />
                </div>
                <div class="card-body">
                  <!-- {{ this_customer }} -->
                  <h4 class="py-2 text-dark">
                    {{ this.customer.first_name }}
                  </h4>
                  <!-- <p>{{ this_customer.email }}</p> -->
                </div>
              </div>
            </div>
            <hr class="w-100" />
            <div class="contact-info">
              <h5 class="text-dark">Contact Information</h5>
              <p class="text-dark font-weight-medium pt-24px mb-2">
                Email address
              </p>
              <p>{{ this.customer.email }}</p>
              <p class="text-dark font-weight-medium pt-24px mb-2">
                Phone Number
              </p>
              <p>{{ this.customer.phone }}</p>
              <!-- <p class="text-dark font-weight-medium pt-24px mb-2">Birthday</p>
                            <p>Dec 10, 1991</p> -->
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-xl-9">
          <div class="profile-content-right profile-right-spacing py-5">
            <ul
              class="nav nav-tabs px-3 px-xl-5 nav-style-border"
              id="myProfileTab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="true"
                >
                  Orders
                </button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="notifications-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#notifications"
                  type="button"
                  role="tab"
                  aria-controls="notifications"
                  aria-selected="false"
                >
                  Notifications
                </button>
              </li> -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="settings-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#settings"
                  type="button"
                  role="tab"
                  aria-controls="settings"
                  aria-selected="false"
                >
                  Settings
                </button>
              </li>
            </ul>
            <div class="tab-content px-1 px-xl-1" id="myTabContent">
              <!-- Order Table -->
              <div
                class="tab-pane fade show active"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <div class="tab-widget mt-2">
                  <div class="row">
                    <div class="col-12">
                      <div
                        class="card card-default card-table-border-none tbl"
                        id="recent-orders"
                      >
                        <div class="card-header justify-content-between">
                          <h2>Recent Orders</h2>
                          <div>
                            <button class="text-black-50 mr-2 font-size-20">
                              <i class="mdi mdi-cached"></i>
                            </button>
                          </div>
                        </div>

                        <div class="card-body pt-0 pb-0 table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>SN</th>
                                <th>ID</th>
                                <th>Name/Phone/Email</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Method</th>
                                <th>Shipping Method</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr v-for="(order, index) in orders" :key="index">
                                <td>
                                  {{ index + 1 }}
                                </td>
                                <td>
                                  {{ order.order_id }}
                                </td>
                                <td class="w-25">
                                  <div v-if="order.customer">
                                    <span
                                      >{{ order.customer.first_name }}
                                    </span>
                                    <br />
                                    <hr class="m-0" />
                                    <span
                                      ><i class="fa fa-phone text-primary"></i>
                                      {{ order.customer.phone }}
                                    </span>
                                    <br />
                                    <hr class="m-0" />
                                    <span>{{ order.customer.email }} </span>
                                  </div>
                                </td>
                                <td>${{ order.order_price }}</td>
                                <td>
                                  {{ order.order_date }}
                                </td>

                                <td>
                                  <span class="badge badge-light">{{
                                    order.payment_method
                                  }}</span
                                  ><br />
                                  <span class="badge badge-light">{{
                                    order.order_from
                                  }}</span>
                                </td>
                                <td>
                                  <span
                                    class="badge badge-warning"
                                    v-if="order.order_from == 'pos'"
                                    >{{ order.order_from }}</span
                                  >

                                  <span class="badge badge-warning">{{
                                    order.shipping_method
                                  }}</span>
                                  <br />

                                  <span class="" v-if="order.delivery_agent">
                                    <router-link
                                      :to="{
                                        path:
                                          '/admin/edit-delivery-agents/' +
                                          order.delivery_agent.id,
                                      }"
                                      target="_blank"
                                    >
                                      {{ order.delivery_agent.first_name }}
                                      {{ order.delivery_agent.last_name }}
                                    </router-link>
                                  </span>
                                </td>
                                <!-- 'Pending','Confirmed','Inprocess','Dispatched','Picked-Up','Arrived','Complete','Return','Cancel','Shipped' -->
                                <td>
                                  <span
                                    v-if="order.order_status == 'Pending'"
                                    class="badge badge-warning"
                                    >Pending</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Confirmed'"
                                    class="badge badge-primary"
                                    >Confirmed</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Inprocess'"
                                    class="badge badge-warning"
                                    >Inprocess</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Dispatched'"
                                    class="badge badge-info"
                                    >Dispatched</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Picked-Up'"
                                    class="badge badge-success"
                                    >Picked-Up</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Arrived'"
                                    class="badge badge-success"
                                    >Arrived</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Complete'"
                                    class="badge badge-success"
                                    >Completed</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Return'"
                                    class="badge badge-danger"
                                    >Return</span
                                  >
                                  <span
                                    v-if="order.order_status == 'Cancel'"
                                    class="badge badge-danger"
                                    >Cancel</span
                                  >
                                </td>
                                <td>
                                  <router-link
                                    :to="'/admin/edit-orders/' + order.order_id"
                                    class="btn btn-sm btn-info btn-block mr-1"
                                  >
                                    <i class="fa fa-edit"></i>
                                    Edit
                                  </router-link>

                                  <a
                                    v-if="order.id > 0"
                                    class="btn btn-sm btn-block btn-danger"
                                    href="#"
                                    @click="deleteorder(order.id)"
                                  >
                                    <i class="fa fa-trash"></i>
                                    Delete
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Notification Table -->
              <div
                class="tab-pane fade"
                id="notifications"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <div class="tab-widget mt-2">
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="card card-default mb-24px">
                        <div class="card-header justify-content-between mb-1">
                          <h2>Latest Notifications</h2>
                          <div>
                            <button class="text-black-50 mr-2 font-size-20">
                              <i class="mdi mdi-cached"></i>
                            </button>
                          </div>
                        </div>
                        <div
                          class="card-body compact-notifications"
                          data-simplebar
                          style="height: 434px"
                        >
                          <div
                            class="media pb-3 align-items-center justify-content-between"
                          >
                            <div
                              class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white"
                            >
                              <i class="mdi mdi-cart-outline font-size-20"></i>
                            </div>
                            <div class="media-body pr-3">
                              <a
                                class="mt-0 mb-1 font-size-15 text-dark"
                                href="#"
                                >New Order</a
                              >
                              <p>Selena has placed an new order</p>
                            </div>
                            <span class="font-size-12 d-inline-block"
                              ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                            >
                          </div>

                          <div
                            class="media py-3 align-items-center justify-content-between"
                          >
                            <div
                              class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white"
                            >
                              <i class="mdi mdi-email-outline font-size-20"></i>
                            </div>
                            <div class="media-body pr-3">
                              <a
                                class="mt-0 mb-1 font-size-15 text-dark"
                                href="#"
                                >New Enquiry</a
                              >
                              <p>Phileine has placed an new order</p>
                            </div>
                            <span class="font-size-12 d-inline-block"
                              ><i class="mdi mdi-clock-outline"></i> 9 AM</span
                            >
                          </div>
                        </div>
                        <div class="mt-3"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- settings Table -->
              <div
                class="tab-pane fade"
                id="settings"
                role="tabpanel"
                aria-labelledby="settings-tab"
              >
                <div class="card card-default px-5 mt-2">
                  <div class="tab-pane-content mt-5">
                    <form>
                      <div class="form-group row mb-1">
                        <label
                          for="coverImage"
                          class="col-sm-4 col-lg-2 col-form-label"
                          >User Image</label
                        >
                        <div class="col-sm-8 col-lg-10">
                          <div class="custom-file mb-1">
                            <input
                              type="file"
                              class="custom-file-input"
                              id="coverImage"
                              required
                            />
                            <label class="custom-file-label" for="coverImage"
                              >Choose file...</label
                            >
                            <div class="invalid-feedback">
                              Example invalid custom file feedback
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-1">
                        <div class="col-lg-6">
                          <div class="form-group mb-1">
                            <label for="firstName">First name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="firstName"
                              v-model="this.customer.first_name"
                            />
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group mb-1">
                            <label for="lastName">Last name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="firstName"
                              v-model="this.customer.last_name"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="form-group mb-1">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          v-model="this.customer.email"
                        />
                      </div>

                      <div class="form-group mb-1">
                        <label for="Address">Address</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Address"
                          v-model="this.customer.address"
                        />
                      </div>

                      <!-- <div class="form-group mb-1">
                                                <label for="newPassword">New password</label>
                                                <input type="password" class="form-control" id="newPassword">
                                            </div>

                                            <div class="form-group mb-1">
                                                <label for="conPassword">Confirm password</label>
                                                <input type="password" class="form-control" id="conPassword">
                                            </div> -->

                      <div class="d-flex justify-content-end mt-1">
                        <button
                          type="submit"
                          class="btn btn-primary mb-2 btn-pill"
                        >
                          Update Profile
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Content -->
</template>
<script>
import ErrorHandling from "../../../plugins/ErrorHandling";
import Multiselect from "vue-multiselect";

export default {
  components: {
    Multiselect,
  },
  data() {
    return {
      orders: [],
      display_form: false,
      customer: {
        id: "",
        first_name: "",
        last_name: "",
        phone: "",
        email: "",
        status: "",
        password: "",

        // address: "",
        // phone: "",
        // mobile: "",
        // country_id: "",
        // state_id: "",
        // city: "",
      },

      // this_customer: [],

      searchParameter: "",
      sortBy: "id",
      sortType: "DESC",
      limit: 10,
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      customers: [],
      token: [],
      displayModal: false,
      modal_title: "",
      errors: new ErrorHandling(),
    };
  },

  methods: {
    showModal() {
      $(this.$refs.showModal).modal("show");
    },
    hideModal() {
      $(this.$refs.showModal).modal("hide");
    },

    createCustomer() {
      this.errors.record("");
      this.clearForm();
      this.showModal();
    },

    thisCustomer() {
      var page_url = "/api/admin/customer/" + this.$route.params.id;
      axios
        .get(page_url, this.token)
        .then((res) => {
          var data = res.data.data;
          this.customer.first_name = data.first_name;
          this.customer.last_name = data.last_name;
          this.customer.email = data.email;
          this.customer.address = data.address[0].street_address;
          // console.log(res.data.data);
          this.makePagination(res.data.meta, res.data.links);
        })
        .finally(() => this.$hideLoader());
    },

    fetchOrders(page_url = null, status = null) {
      // url: `/api/customer-order?orderDetail=1&productDetail=1&customer_id=${customerID}`,
      // $_GET['customer_id']
      // Default URL if none is provided
      page_url = page_url || "/api/admin/order?customer=1&customer_id=" + 20;

      // Split the URL to handle existing query parameters
      const hasQuery = page_url.includes("?");
      page_url += hasQuery ? "&" : "?";
      page_url += `limit=${this.limit}`;

      // Add search parameter if it exists
      if (this.searchParameter) {
        page_url += `&searchParameter=${this.searchParameter}`;
      }

      // Add sorting parameters
      page_url += `&sortBy=${this.sortBy}&sortType=${this.sortType}`;

      console.log(status);

      // Add status parameter if provided
      if (status) {
        if (status == "pending") {
          page_url += `&pending_orders=1`;
        } else if (status == "confirmed") {
          page_url += `&confirmed_orders=1`;
        } else if (status == "complete") {
          page_url += `&complete_orders=1`;
        } else if (status == "cancel") {
          page_url += `&cancel_orders=1`;
        }
      }

      // Axios GET request
      axios
        .get(page_url, this.token)
        .then((res) => {
          console.log(res.data.data); // Log the response
          this.orders = res.data.data; // Update orders
          this.makePagination(res.data.meta, res.data.links); // Handle pagination
        })
        .finally(() => this.$hideLoader()); // Hide loader
    },

    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };
      this.pagination = pagination;
    },

    deleteCustomer(id) {
      if (confirm("Are You Sure?")) {
        this.$showLoader();
        axios
          .delete(`/api/admin/customer/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toast("Deleted Successfully", "success");
              this.fetchCustomer();
            }
          })
          .catch((err) => console.log(err))
          .finally(() => this.$hideLoader());
      }
    },

    addUpdateCustomer() {
      this.$showLoader();
      if (this.edit === false) {
        axios
          .post("/api/admin/customer", this.customer, this.token)
          .then((response) => {
            this.fetchCustomer();
            this.clearForm();
            this.hideModal();
            this.$toast(response.data.message, "success");
          })
          .catch((error) => {
            this.error_message = "";
            this.errors = new ErrorHandling();
            if ((error.response.status = 422)) {
              if (error.response.data.status == "Error") {
                this.error_message = error.response.data.message;
              } else {
                this.errors.record(error.response.data.errors);
              }
            }
          })
          .finally(() => this.$hideLoader());
      } else {
        axios
          .put(
            "/api/admin/customer/" + this.customer.id,
            this.customer,
            this.token
          )
          .then((response) => {
            this.fetchCustomer();
            this.clearForm();
            this.hideModal();
            this.$toast(response.data.message, "success");
          })
          .catch((error) => {
            this.error_message = "";
            this.errors = new ErrorHandling();
            if ((error.response.status = 422)) {
              if (error.response.data.status == "Error") {
                this.error_message = error.response.data.message;
              } else {
                this.errors.record(error.response.data.errors);
              }
            }
          })
          .finally(() => this.$hideLoader());
      }
    },

    editCustomer(customer) {
      // this.edit = true;
      // this.errors.record('');
      // this.showModal();
      // this.customer.id = customer.id;
      // this.customer.first_name = customer.first_name;
      // this.customer.last_name = customer.last_name;
      // this.customer.phone = customer.phone;
      // this.customer.email = customer.email;
      // this.customer.status = customer.status;
      // this.customer.password = customer.password;
    },

    clearForm() {
      // this.edit = false;
      // this.customer.id = null;
      // this.customer.first_name = '';
      // this.customer.last_name = '';
      // this.customer.phone = '';
      // this.customer.email = '';
      // this.customer.status = 0;
      // this.customer.password = '';
    },
    sorting(sortBy) {
      this.sortBy = sortBy;
      this.sortType =
        this.sortType == "asc" || this.sortType == "ASC"
          ? (this.sortType = "desc")
          : (this.sortType = "asc");
      this.fetchCustomer();
    },

    setSelectedLanguage(selectedLanguage) {
      this.selectedLanguage = selectedLanguage;
    },

    clearSearch() {
      (this.searchParameter = ""), this.fetchCustomer();
    },
  },

  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.thisCustomer();
    this.fetchOrders();
    // this.fetchCustomer();
  },
};
</script>

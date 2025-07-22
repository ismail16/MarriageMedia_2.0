<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Customer List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Customer
                </p>
            </div>
            <div>
                <button class="btn btn-primary  kt_notes_panel_toggle" data-toggle="tooltip" title=""
                    data-placement="right" data-original-title="Check out more demos" @click="createCustomer">
                    <span class="rounded-circle shadow-sm ">
                        Create Customer
                    </span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <div class="dataTables_length float-start" id="productpagesTable_length"><label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchCustomer()">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select> entries</label>
                            </div>
                            <div id="productpagesTable_filter" class="dataTables_filter float-end">
                                <div class="d-flex">
                                    <input type="search" class="form-control form-control-sm" placeholder=""
                                        v-model="searchParameter" @keyup="fetchCustomer()">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Satatus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="customer in customers" v-bind:key="customer.id">
                                        <td> {{ customer.id }}</td>
                                        <td> {{ customer.first_name }}</td>
                                        <td> {{ customer.last_name }}</td>
                                        <td> {{ customer.phone }}</td>
                                        <td> {{ customer.email }}</td>
                                        <td>
                                            <span v-if="customer.status == '1'"
                                                class="badge badge-success">Active</span>
                                            <span v-if="customer.status == '0'"
                                                class="badge badge-danger">InActive</span>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info mr-1 click-edit"
                                                id="click-edit1" data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="editCustomer(customer)">

                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <router-link :to="'/admin/read-customers/' + customer.id"
                                                class="btn btn-sm btn-primary   mr-1">
                                                <i class="fa fa-eye"></i>
                                            </router-link>

                                            <a v-if="customer.id > 0" class="btn btn-sm btn-danger" href="#"
                                                @click="deleteCustomer(customer.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div v-if="customers.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="customers.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]">
                                    <a class="page-link" href="#"
                                        @click="fetchCustomer(pagination.prev_page_url)">Previous</a>
                                </li>
                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>
                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                                    <a class="page-link" href="#"
                                        @click="fetchCustomer(pagination.next_page_url)">Next</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Customer Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="showModal">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <!-- <form id="myform"> -->
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="" v-if="edit == false">Create Customer</h5>
                        <h5 class="modal-title" id="" v-if="edit == true">Edit Customer</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body px-4">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="text" v-model="customer.first_name" class="form-control" />
                                    <small class="form-text text-danger" v-if="errors.has('first_name')"
                                        v-text="errors.get('first_name')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="text" v-model="customer.last_name" class="form-control" />
                                    <small class="form-text text-danger" v-if="errors.has('last_name')"
                                        v-text="errors.get('last_name')"></small>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-3">
                                    <label class="form-label ">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="text" v-model="customer.email" class="form-control" />
                                    <small class="form-text text-danger" v-if="errors.has('email')"
                                        v-text="errors.get('email')"></small>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-3">
                                    <label class="form-label ">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="number" v-model="customer.phone" class="form-control" />
                                    <small class="form-text text-danger" v-if="errors.has('phone')"
                                        v-text="errors.get('phone')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Password <span class="text-danger">*</span></label>
                                    <input type="text" name="text" v-model="customer.password" class="form-control" />
                                    <small class="form-text text-danger" v-if="errors.has('password')"
                                        v-text="errors.get('password')"></small>
                                </div>


                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control form-select"
                                        v-model="customer.status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('status')"></small>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-pill mr-center" @click="addUpdateCustomer()">
                            <span v-if="edit == true">
                                <i class="fa fa-sync"></i>
                                Update
                            </span>
                            <span v-if="edit == false">
                                <i class="fa fa-plus"></i>
                                Save
                            </span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import ErrorHandling from "../../../plugins/ErrorHandling";
import Multiselect from 'vue-multiselect';

export default {
    components: {
        Multiselect
    },
    data() {
        return {
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

            searchParameter: '',
            sortBy: 'id',
            sortType: 'DESC',
            limit: 10,
            error_message: '',
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
            this.errors.record('');
            this.clearForm();
            this.showModal();
        },

        fetchCustomer(page_url) {
            this.$showLoader();
            let vm = this;
            page_url = page_url || "/api/admin/customer";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            }
            else {
                page_url += '?limit=' + this.limit;
            }
            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }
            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType + '&getCountry=1&getState=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.customers = res.data.data;
                console.log(res.data.data);
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
        },


        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        },

        deleteCustomer(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/customer/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success');
                            this.fetchCustomer();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        addUpdateCustomer() {
            this.$showLoader();
            if (this.edit === false) {
                axios.post("/api/admin/customer", this.customer, this.token)
                    .then((response) => {
                        this.fetchCustomer();
                        this.clearForm();
                        this.hideModal()
                        this.$toast(response.data.message, 'success');
                    }).catch((error) => {
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
                        this.hideModal()
                        this.$toast(response.data.message, 'success');
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
            this.edit = true;
            this.errors.record('');
            this.showModal();
            this.customer.id = customer.id;
            this.customer.first_name = customer.first_name;
            this.customer.last_name = customer.last_name;
            this.customer.phone = customer.phone;
            this.customer.email = customer.email;
            this.customer.status = customer.status;
            this.customer.password = customer.password;
        },

        clearForm() {
            this.edit = false;
            this.customer.id = null;
            this.customer.first_name = '';
            this.customer.last_name = '';
            this.customer.phone = '';
            this.customer.email = '';
            this.customer.status = 0;
            this.customer.password = '';

        },
        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchCustomer();
        },

        setSelectedLanguage(selectedLanguage) {
            this.selectedLanguage = selectedLanguage;
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchCustomer();
        },

    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchCustomer();
    }
};
</script>

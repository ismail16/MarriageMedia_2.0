<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Messages List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Messages
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <div class="dataTables_length float-start" id="productpagesTable_length"><label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchMessages()">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select> entries</label></div>
                            <div id="productpagesTable_filter" class="dataTables_filter float-end">
                                <div class="d-flex">
                                    <input type="search" class="form-control form-control-sm" placeholder=""
                                        v-model="searchParameter" @keyup="fetchMessages()">
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
                                    <tr v-for="(message, index) in messages" v-bind:key="index">
                                        <td> {{ index+1 }}</td>
                                        <td> {{ message.first_name }}</td>
                                        <td> {{ message.last_name }}</td>
                                        <td> {{ message.phone }}</td>
                                        <td> {{ message.email }}</td>
                                        <td>
                                            <span v-if="message.status == '1'"
                                                class="badge badge-success">Active</span>
                                            <span v-if="message.status == '0'"
                                                class="badge badge-danger">InActive</span>
                                        </td>

                                        <td>
                                            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info mr-1 click-edit"
                                                id="click-edit1" data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="viewMessage(message)">
                                                <i class="fa fa-eye"></i>
                                            </a> -->
                                            <router-link :to="'/admin/read-messages/'+message.id" class="btn btn-sm btn-info mr-1">
                                                <i class="fa fa-eye"></i>
                                            </router-link>

                                            <a v-if="message.id > 0" class="btn btn-sm btn-danger" href="#"
                                                @click="deleteMessage(message.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div v-if="messages.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="messages.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]">
                                    <a class="page-link" href="#"
                                        @click="fetchMessages(pagination.prev_page_url)">Previous</a>
                                </li>
                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>
                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                                    <a class="page-link" href="#"
                                        @click="fetchMessages(pagination.next_page_url)">Next</a>
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
                        <h5 class="modal-title">Show Message</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body px-4">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12"> Name </label>
                                    <span class="fw-bold">{{ message.first_name }} {{ message.last_name }}</span>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12 "> Email </label>
                                    <span class="fw-bold">{{ message.email }}</span>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12 "> phone </label>
                                    <span class="fw-bold">{{ message.phone }}</span>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="form-label col-12 "> Message </label>
                                    <span class="fw-bold">{{ message.message }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>

export default {
    data() {
        return {
            display_form: false,
            message: {
                id: "",
                first_name: "",
                last_name: "",
                phone: "",
                email: "",
                message: "",
                status: "",
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
            messages: [],
            token: [],
            displayModal: false,
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

        fetchMessages(page_url) {

            let vm = this;
            page_url = page_url || "/api/admin/contact_us";
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
            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType;

            axios.get(page_url, this.token).then(res => {
                
                this.messages = res.data.data;
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

        deleteMessage(id) {

            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/contact_us/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success');
                            this.fetchMessages();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        viewMessage(message) {
            this.edit = true;
            this.showModal();
            this.message.id = message.id;
            this.message.first_name = message.first_name;
            this.message.last_name = message.last_name;
            this.message.phone = message.phone;
            this.message.email = message.email;
            this.message.message = message.message;            
            this.message.status = message.status;
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
        this.fetchMessages();
    }
};
</script>

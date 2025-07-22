<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Complain List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Complain 
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
                                        v-on:change="fetchComplain ()">
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
                                        v-model="searchParameter" @keyup="fetchComplain ()">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Satatus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="complain in complains" v-bind:key="complain.id">
                                        <td> {{ complain.id }}</td>
                                        <td> {{ complain.name }}</td>
                                        <td> {{ complain.phone }}</td>
                                        <td> {{ complain.email }}</td>
                                        <td>
                                            <span v-if="complain.status == '1'"
                                                class="badge badge-success">Active</span>
                                            <span v-if="complain.status == '0'"
                                                class="badge badge-danger">InActive</span>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info mr-1 click-edit"
                                                id="click-edit1" data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="viewComplain (complain)">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a v-if="complain.id > 0" class="btn btn-sm btn-danger" href="#"
                                                @click="deleteComplain (complain.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div v-if="complains.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="complains.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]">
                                    <a class="page-link" href="#"
                                        @click="fetchComplain (pagination.prev_page_url)">Previous</a>
                                </li>
                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>
                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                                    <a class="page-link" href="#"
                                        @click="fetchComplain (pagination.next_page_url)">Next</a>
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
                        <h5 class="modal-title">Show Complain </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body px-4">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12"> Name </label>
                                    <span class="fw-bold">{{ complain.name }}</span>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12 "> Email </label>
                                    <span class="fw-bold">{{ complain.email }}</span>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label col-12 "> phone </label>
                                    <span class="fw-bold">{{ complain.phone }}</span>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="form-label col-12 "> Complain  </label>
                                    <span class="fw-bold">{{ complain.complain }}</span>
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
            complain: {
                id: "",
                name: "",
                phone: "",
                email: "",
                complain: "",
                status: "",
            },

            searchParameter: '',
            sortBy: 'id',
            sortType: 'DESC',
            limit: 10,
            error_complain: '',
            edit: false,
            actions: false,
            pagination: {},
            request_method: "",
            complains: [],
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

        fetchComplain (page_url) {

            let vm = this;
            page_url = page_url || "/api/admin/complain";
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
                
                this.complains = res.data.data;
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

        deleteComplain (id) {

            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/complain/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success');
                            this.fetchComplain ();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        viewComplain (complain) {
            this.edit = true;
            this.showModal();
            this.complain.id = complain.id;
            this.complain.name = complain.name;
            this.complain.phone = complain.phone;
            this.complain.email = complain.email;
            this.complain.complain = complain.complain;            
            this.complain.status = complain.status;
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
        this.fetchComplain ();
    }
};
</script>

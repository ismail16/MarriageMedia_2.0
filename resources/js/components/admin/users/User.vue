<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>User List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>User
                </p>
            </div>
            <div>
                <button v-if="$allPermissions.includes('create-admin-user')"
                    class="btn btn-primary  kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right"
                    data-original-title="Check out more demos" @click="createUser">
                    <span class="rounded-circle shadow-sm ">
                        Create User
                    </span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_length float-start" id="productpagesTable_length"><label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchUser()">
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
                                    <input type="text" class="form-control form-control-sm" placeholder="Search"
                                        v-model="searchParameter" @keyup="fetchUser" autocomplete="off"
                                        name="search-field" id="search-email" readonly @focus="enableInput" />

                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="user in users" v-bind:key="user.id">
                                        <td> {{ user.id }}</td>
                                        <td> {{ user.name }}</td>
                                        <td> {{ user.email }}</td>
                                        <td>{{ user.role.name }}</td>
                                        <td>{{ user.status }}</td>
                                        <td>
                                            <a v-if="$allPermissions.includes('edit-admin-user')"
                                                href="javascript:void(0)" class="btn btn-sm btn-info mr-1 click-edit"
                                                id="click-edit1" data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos" @click="editUser(user)">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a v-if="user.id > 0 && $allPermissions.includes('delete-admin-user')"
                                                class="btn btn-sm btn-danger" href="#" @click="deleteUser(user.id)">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="users.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="users.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link"
                                        href="#" @click="fetchUser(pagination.prev_page_url)">Previous</a></li>

                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a
                                        class="page-link" href="#" @click="fetchUser(pagination.next_page_url)">Next</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add User Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="showModal">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="" v-if="edit == false">Create User</h5>
                        <h5 class="modal-title" id="" v-if="edit == true">Edit User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body px-4">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label ">Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" v-model="user.name" type="text"
                                        placeholder="EnterName">
                                    <small class="form-text text-danger" v-if="errors.has('name')"
                                        v-text="errors.get('name')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" v-model="user.email" type="email"
                                        placeholder="Enter Email">
                                    <small class="form-text text-danger" v-if="errors.has('email')"
                                        v-text="errors.get('email')"></small>
                                </div>



                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Role <span class="text-danger">*</span></label>
                                    <select name="role_id" id="" class="form-control form-select"
                                        v-model="user.role_id">
                                        <option value="">Select</option>
                                        <option v-for="role in roles" :value="role.id">{{ role.name }}</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('role_id')"
                                        v-text="errors.get('role_id')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control form-select" v-model="user.status">
                                        <option value="">Select</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="active">Active</option>

                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('status')"></small>
                                </div>


                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label "> Password <span class="text-danger">*</span></label>
                                    <input class="form-control" name="password" v-model="user.password" type="password"
                                        placeholder="Enter Password">
                                    <small class="form-text text-danger" v-if="errors.has('password')"
                                        v-text="errors.get('password')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label
                                        "> Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control" name="confirm_password" v-model="user.confirm_password"
                                        type="password" placeholder="Enter Confirm Password">
                                    <small class="form-text text-danger" v-if="errors.has('confirm_password')"
                                        v-text="errors.get('confirm_password')"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-pill mr-center" @click="addUpdateUser()"> <span
                                v-if="edit == true">
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
    </div> <!-- End Content -->

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
            user: {
                id: "",
                name: "",
                email: "",
                role_id: "",
                status: "",
                password: "",
                confirm_password: "",
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
            countrySelected: "",
            stateSelected: "",
            users: [],
            roles: [],
            token: [],
            displayModal: false,
            errors: new ErrorHandling(),
        };
    },

    methods: {

        enableInput(event) {
            event.target.removeAttribute('readonly');
        },

        showModal() {
            $(this.$refs.showModal).modal("show");
        },

        createUser() {
            this.errors.record('');
            this.clearForm();
            this.fetchRoles();
            this.showModal();
        },

        fetchUser(page_url) {
            this.$showLoader();

            console.log("Searching for:", this.searchParameter);

            let vm = this;
            page_url = page_url || "/api/admin/user";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }

            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }

            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType;
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.users = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
        },

        fetchRoles() {
            axios.get("/api/admin/role", this.token).then((response) => {
                this.roles = response.data.data;
            });
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

        deleteUser(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/user/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'info', 3000);
                            this.fetchUser();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        addUpdateUser() {
            this.$showLoader();
            if (this.edit === false) {
                //console.log(this.user);
                axios.post("/api/admin/user", this.user, this.token)
                    .then((response) => {
                        //console.log(response.data);
                        this.fetchUser();
                        this.clearForm();
                        $(this.$refs.showModal).modal("hide");
                        this.$toast(response.data.message, 'success', 3000);
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
                        "/api/admin/user/" + this.user.id,
                        this.user,
                        this.token
                    )
                    .then((response) => {
                        //console.log(response.data);
                        this.fetchUser();
                        this.clearForm();
                        $(this.$refs.showModal).modal("hide");
                        this.$toast(response.data.message, 'success', 3000);
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

        editUser(user) {
            this.edit = true;
            this.errors.record('');
            this.fetchRoles();
            this.showModal();
            this.user.id = user.id;
            this.user.name = user.name;
            this.user.email = user.email;
            this.user.password = '';
            this.user.confirm_password = '';
            this.user.role_id = user.role.id;
            this.user.status = user.status;
        },

        clearForm() {
            this.edit = false;
            this.user.id = null;
            this.user.name = "";
            this.user.email = "";
            this.user.password = "";
            this.user.confirm_password = "";
            this.user.role_id = "";
            this.user.status = 'active';

        },
        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchUser();
        },

        setSelectedLanguage(selectedLanguage) {
            this.selectedLanguage = selectedLanguage;
            // console.log("i am clicked", selectedLanguage)
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchUser();
        },

    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.$nextTick(() => {
            setTimeout(() => {
                this.searchParameter = '';
                const el = document.getElementById('search-email');
                if (el) el.value = '';
            }, 100); // wait for autofill to apply, then clear
        });
        this.fetchUser();
    }
};
</script>

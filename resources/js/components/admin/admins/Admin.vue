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
                                        v-on:change="fetchAdmins()">
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
                                        v-model="searchParameter" @keyup="fetchAdmins" autocomplete="off"
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
                                    <tr v-for="adminUser in adminUsers" v-bind:key="adminUser.id">
                                        <td> {{ adminUser.id }}</td>
                                        <td> {{ adminUser.first_name }} {{ adminUser.last_name }}</td>
                                        <td> {{ adminUser.email }}</td>
                                        <td>{{ adminUser.role.name }}</td>
                                        <td>
                                            <span v-if="adminUser.status == '1'"
                                                class="badge badge-success">Active</span>
                                            <span v-if="adminUser.status == '0'"
                                                class="badge badge-danger">InActive</span>
                                        </td>
                                        <td>
                                            <a v-if="$allPermissions.includes('edit-admin-user')"
                                                href="javascript:void(0)" class="btn btn-sm btn-info mr-1 click-edit"
                                                id="click-edit1" data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos" @click="editAdminUser(adminUser)">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a v-if="adminUser.id > 0 && $allPermissions.includes('delete-admin-user')"
                                                class="btn btn-sm btn-danger" href="#" @click="deleteAdminUser(adminUser.id)">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="adminUsers.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="adminUsers.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link"
                                        href="#" @click="fetchAdmins(pagination.prev_page_url)">Previous</a></li>

                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a
                                        class="page-link" href="#" @click="fetchAdmins(pagination.next_page_url)">Next</a>
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
                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class="">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="name" v-model="adminUser.first_name" type="text"
                                        placeholder="Enter First Name">
                                    <small class="form-text text-danger" v-if="errors.has('name')"
                                        v-text="errors.get('name')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class="">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="name" v-model="adminUser.last_name" type="text"
                                        placeholder="Enter Last Name">
                                    <small class="form-text text-danger" v-if="errors.has('last_name')"
                                        v-text="errors.get('last_name')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class=""> Email <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="email" v-model="adminUser.email" type="email"
                                        placeholder="Enter Email">
                                    <small class="form-text text-danger" v-if="errors.has('email')"
                                        v-text="errors.get('email')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class="">Mobile <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="name" v-model="adminUser.mobile" type="text"
                                        placeholder="Enter Mobile">
                                    <small class="form-text text-danger" v-if="errors.has('mobile')"
                                        v-text="errors.get('mobile')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class="">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="" class="form-control-sm w-100" v-model="adminUser.gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('gender')"></small>
                                </div>


                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> Marital Status <span class="text-danger">*</span></label>
                                    <select name="marital_status" id="" class="form-control-sm w-100" v-model="adminUser.marital_status">
                                        <option value="Never_Married">Never Married</option>
                                        <option value="Legally_Separated">Legally Separated</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Anulled">Anulled</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('marital_status')"
                                        v-text="errors.get('marital_status')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class="">Profession <span class="text-danger">*</span></label>
                                   <select name="profession" class="form-control-sm w-100" v-model="adminUser.profession">
                                        <option value="">Select Profession</option>
                                        <option v-for="profession in professions" :key="profession.id" :value="profession.id">
                                            {{ profession.name }}
                                        </option>
                                    </select>

                                    <small class="form-text text-danger" v-if="errors.has('profession')"
                                        v-text="errors.get('profession')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class="">Country <span class="text-danger">*</span></label>
                                    <select name="country" id="" class="form-control-sm w-100" v-model="adminUser.country">
                                        <option value="1">Bangladesh</option>
                                        <option value="200">Others</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('country')"
                                        v-text="errors.get('country')"></small>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> District <span class="text-danger">*</span></label>
                                    <select name="district" id="" class="form-control-sm w-100" v-model="adminUser.district">
                                        <option value="">Select Profession</option>
                                        <option v-for="district in districts" :key="district.id" :value="district.id">
                                            {{ district.name }}
                                        </option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('district')"
                                        v-text="errors.get('district')"></small>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class="">Birthday <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="birthday" v-model="adminUser.birthday" type="date"
                                        placeholder="Enter birthday">
                                    <small class="form-text text-danger" v-if="errors.has('birthday')"
                                        v-text="errors.get('birthday')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> Religion <span class="text-danger">*</span></label>
                                    <select name="religion" id="" class="form-control-sm w-100" v-model="adminUser.religion">
                                        <option value="">Religion/Community *</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Buddhist">Buddhist</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Parsi">Parsi</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Jewish">Jewish</option>
                                        <option value="Spiritual">Spiritual</option>
                                        <option value="No_Religion">No Religion</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('status')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> Social Order <span class="text-danger">*</span></label>
                                    <select name="social_order" class="form-control-sm w-100" v-model="adminUser.social_order">
                                        <option value="">Social Order/Caste</option>
                                        <option value="Just_Muslim">Just Muslim</option>
                                        <option value="Salafi">Salafi</option>
                                        <option value="Sunni">Sunni</option>
                                        <option value="Sunni_Hanafi">Sunni Hanafi</option>
                                        <option value="Sunni_Shafi">Sunni Shafi</option>
                                        <option value="Sunni_Maliki">Sunni Maliki</option>
                                        <option value="Sufi">Sufi</option>
                                        <option value="Shia">Shia</option>
                                        <option value="Shia_Bohra">Shia Bohra</option>
                                        <option value="Shia_Zaidi">Shia Zaidi</option>
                                        <option value="Brahmin">Brahmin</option>
                                        <option value="Kshatriyas">Kshatriyas</option>
                                        <option value="Vaisyas">Vaisyas</option>
                                        <option value="Shudras">Shudras</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('status')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class=""> Address <span class="text-danger">*</span></label>
                                     <input class="form-control-sm w-100" name="address" v-model="adminUser.address" type="text"
                                        placeholder="Enter Address">
                                    <small class="form-text text-danger" v-if="errors.has('address')"
                                        v-text="errors.get('address')"></small>
                                </div>


                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> Role <span class="text-danger">*</span></label>
                                    <select name="role_id" id="" class="form-control-sm w-100"
                                        v-model="adminUser.role_id">
                                        <option value="">Select</option>
                                        <option v-for="role in roles" :key="role.id" :value="role.id">
                                            {{ role.name }}
                                        </option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('role_id')"
                                        v-text="errors.get('role_id')"></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-1">
                                    <label class=""> Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control-sm w-100" v-model="adminUser.status">
                                        <option value="">Select</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    <small class="form-text text-danger" v-if="errors.has('status')"
                                        v-text="errors.get('status')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class=""> Password <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="password" v-model="adminUser.password" type="password"
                                        placeholder="Enter Password">
                                    <small class="form-text text-danger" v-if="errors.has('password')"
                                        v-text="errors.get('password')"></small>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-1">
                                    <label class=""> Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control-sm w-100" name="confirm_password" v-model="adminUser.confirm_password"
                                        type="password" placeholder="Enter Confirm Password">
                                    <small class="form-text text-danger" v-if="errors.has('confirm_password')"
                                        v-text="errors.get('confirm_password')"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-pill mr-center" @click="addUpdateAdminUser()"> <span
                                v-if="edit == true">
                                <i class="fa fa-sync"></i>
                                Update
                            </span>
                            <span v-if="edit == false">
                                <i class="fa fa-plus"></i>
                                Save
                            </span>
                        </button>
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

            adminUser: {
                id: "",
                first_name: "",
                last_name: "",
                email: "",
                mobile: "",
                gender: "",
                marital_status: "",
                profession: "",
                country: 1,
                district: "",
                birthday: "",
                religion: "",
                social_order: "",
                address: "",
                role_id: "",
                status: "",
                password: "",
                confirm_password: "",
                agreement: 1
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

            adminUsers: [],

            countries: [],
            districts: [],
            thanas: [],

            roles: [],
            professions: [],
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

        fetchAdmins(page_url) {
            this.$showLoader();

            console.log("Searching for:", this.searchParameter);

            let vm = this;
            page_url = page_url || "/api/admin/admin-user";
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
                this.adminUsers = res.data.data;

                console.log(res.data.data)

                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
        },

        fetchRoles() {
            axios.get("/api/admin/role", this.token).then((response) => {
                this.roles = response.data.data;
            });
        },

        fetchProfession() {
            axios.get("/api/profession", this.token).then((response) => {
                this.professions = response.data.data;
            });
        },

        fetchDistricts() {
            axios.get("/api/district", this.token).then((response) => {
                console.log(response.data.data)
                this.districts = response.data.data;
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

        deleteAdminUser(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/admin-user/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success', 3000);
                            this.fetchAdmins();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        addUpdateAdminUser() {

            this.$showLoader();


            if (this.edit === false) {
                axios.post("/api/admin/admin-user", this.adminUser, this.token)
                    .then((response) => {

                        this.fetchAdmins();
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
                    .put("/api/admin/admin-user/" + this.adminUser.id, this.adminUser, this.token)
                    .then((response) => {
                        this.fetchAdmins();
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

        editAdminUser(adminUser) {

            console.log(adminUser)

            this.edit = true;
            this.errors.record('');
            this.fetchRoles();
            this.showModal();
            
            this.adminUser.id = adminUser.id;
            this.adminUser.first_name = adminUser.first_name;
            this.adminUser.last_name = adminUser.last_name;
            this.adminUser.email = adminUser.email;
            this.adminUser.mobile = adminUser.mobile;
            this.adminUser.gender = adminUser.gender;
            this.adminUser.marital_status = adminUser.marital_status;
            this.adminUser.profession = adminUser.profession;
            this.adminUser.country = adminUser.country;
            this.adminUser.district = adminUser.district;
            this.adminUser.birthday = adminUser.birthday;
            this.adminUser.religion = adminUser.religion;
            this.adminUser.social_order = adminUser.social_order;
            this.adminUser.address = adminUser.address;
            this.adminUser.role_id = adminUser.role.id;
            if (adminUser.birthday) {
                const date = new Date(adminUser.birthday);
                const yyyy = date.getFullYear();
                const mm = String(date.getMonth() + 1).padStart(2, '0');
                const dd = String(date.getDate()).padStart(2, '0');
                this.adminUser.birthday = `${yyyy}-${mm}-${dd}`;
            } else {
                this.adminUser.birthday = '';
            }
            this.adminUser.password = '';
            this.adminUser.confirm_password = '';
            this.adminUser.status = adminUser.status;
        },

        clearForm() {
            this.edit = false;
            this.adminUser.id = '';
            this.adminUser.first_name = '';
            this.adminUser.last_name = '';
            this.adminUser.email = '';
            this.adminUser.mobile = '';
            this.adminUser.gender = '';
            this.adminUser.marital_status = '';
            this.adminUser.profession = '';
            this.adminUser.country = '';
            this.adminUser.district = '';
            this.adminUser.birthday = '';
            this.adminUser.religion = '';
            this.adminUser.social_order = '';
            this.adminUser.address = '';
            this.adminUser.role_id = '';
            this.adminUser.birthday = '';
            this.adminUser.password = '';
            this.adminUser.confirm_password = '';
            this.adminUser.role_id = '';
            this.adminUser.status = 1;
        },

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchAdmins();
        },

        setSelectedLanguage(selectedLanguage) {
            this.selectedLanguage = selectedLanguage;
            // console.log("i am clicked", selectedLanguage)
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchAdmins();
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
        this.fetchAdmins();
        this.fetchProfession();
        this.fetchDistricts();        
    }
};
</script>

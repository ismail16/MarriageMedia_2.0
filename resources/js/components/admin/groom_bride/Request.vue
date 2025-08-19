<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Brides/Grooms Active</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Brides/Grooms Request
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_length float-start" id="productpagesTable_length">
                                <label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchUser()">
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
                                        <th>Image</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Activation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="user in users" v-bind:key="user.id">
                                        <td> {{ user.id }}</td>
                                        <td> {{ user.first_name + ' ' + user.last_name }}</td>
                                        <td>
                                            <img v-if="user.profile_images.length" :src="user.profile_images[0]"
                                                alt="Profile Image" height="60" />
                                            <span v-else>No image</span>
                                        </td>
                                        <td> {{ user.mobile }}</td>
                                        <td> {{ user.email }}</td>
                                        <td>{{ user.mobile }}</td>
                                        <td>
                                            <button v-if="user.activation == 0"
                                                class="btn btn-xs text-white bg-danger"><i
                                                    class="fa fa-times-circle"></i> Not Activated</button>
                                            <button v-else class="btn btn-xs text-white bg-success"><i
                                                    class="fa fa-check-circle"></i> Activated</button>
                                        </td>
                                        <td>
                                            <button v-if="user.status == 0" class="btn btn-xs text-white bg-danger"><i
                                                    class="fa fa-times-circle"></i> Not Verify</button>
                                            <button v-else class="btn btn-xs text-white bg-success"><i
                                                    class="fa fa-check-circle"></i> Verified</button>
                                        </td>
                                        <td>

                                            <router-link
                                                :to="{ name: 'read-activebridegroom', params: { id: user.id } }"
                                                class="btn btn-xs btn-success mr-1">
                                                <i class="fa fa-eye"></i>
                                            </router-link>

                                            <a href="javascript:void(0)" class="btn btn-xs btn-info mr-1 click-edit"
                                                data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="UserProfileCard(user)">
                                                <i class="fa fa-book"></i>
                                            </a>

                                            <a v-if="user.id > 0 && $allPermissions.includes('delete-admin-user')"
                                                class="btn btn-xs btn-danger" href="#" @click="deleteUser(user.id)">
                                                <i class="fa fa-trash"></i>
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

        <!-- User Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="UserProfileCard">

            <div class="modal-dialog modal-lg">
                <div class="modal-content px-5 " style="height:auto;">
                    <div class="modal-header">
                        <!-- <h2 class="modal-title" id="exampleModalCenterTitle"></h2> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body card gradient m-3">
                        <h4 class="text-center bg-info rounded">Profile ID - {{ this.user.uid }}</h4>
                        <div class="row mt-3">
                            <div class="col-md-5 pb-3 d-flex justify-content-center align-items-center">
                                <img v-if="user.image" :src="user.image" class="img-fluid w-75" />
                                <img v-else-if="this.user.gender == 'female'"
                                    src="/images/icons/flaticon/arab-woman.png" alt="Bride Image"
                                    class="img-fluid w-75" />
                                <img v-else src="/images/icons/flaticon/businessman.png" alt="Groom Image"
                                    class="img-fluid w-75" />
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="far fa-calendar-alt text-success"></i>
                                                Age</p>
                                            <strong>: {{ calculateAge(this.user.age) }} Years</strong>
                                        </div>
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-female text-primary"></i> Gender
                                            </p>
                                            <strong>: {{ this.user.gender }}</strong>
                                        </div>
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-briefcase text-success"></i>
                                                Profession</p>
                                            <strong>: {{ this.user.profession }}</strong>
                                        </div>

                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-graduation-cap text-info"></i>
                                                Qualification</p>
                                            <strong>: {{ this.user.qualification }}</strong>
                                        </div>
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="text-danger fas fa-heart"></i> Marital
                                                status</p>
                                            <strong>: {{ this.user.maritalStatus }}</strong>
                                        </div>

                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-restroom text-success"></i>
                                                Height </p>
                                            <strong>: {{ this.user.height }}</strong>
                                        </div>
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-weight text-info"></i> Weight
                                            </p>
                                            <strong>: {{ this.user.weight }} KG</strong>
                                        </div>

                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas fa-synagogue text-success"></i>
                                                Religion</p>
                                            <strong>: {{ this.user.religion }}</strong>
                                        </div>

                                        <div class="icon-label">
                                            <p class="icon-label-text"><i class="fas text-danger fa-tint"></i> Blood</p>
                                            <strong>: {{ this.user.blood }}</strong>
                                        </div>
                                        <div class="icon-label">
                                            <p class="icon-label-text"><i
                                                    class="fa fa-map-marker text-warning"></i>Location</p>
                                            <strong>: {{ this.user.location }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center bg-light rounded mt-3">www.bdmarriagemedia.com</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" @click="closeModal">
                            <i class="fas fa-times"></i> Close
                        </button>
                        <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample"> <i
                                class="fas fa-share pr-2"></i>
                            Share</button> -->
                    </div>

                    <!-- <div class="collapse show" id="collapseExample" style="">
                        <div class="">
                            <ul class="d-flex list-unstyled justify-content-end mb-2">

                                <li class="ml-3 p-3"><a href="#" class="social-share-link" data-platform="facebook"><i
                                            class="fab fa-facebook text-primary fa-2x"></i></a></li>
                                <li class="ml-3 p-3"><a href="#" class="social-share-link" data-platform="twitter"><i
                                            class="fab fa-twitter text-primary fa-2x"></i></a></li>
                                <li class="ml-3 p-3"><a href="#" class="social-share-link" data-platform="whatsapp"><i
                                            class="fab fa-whatsapp text-success fa-2x"></i></a></li>
                                <li class="ml-3 p-3"><a href="#" class="social-share-link" data-platform="linkedin"><i
                                            class="fab fa-linkedin text-info fa-2x"></i></a></li>
                                <li class="ml-3 p-3"> <a href=""><i class="fas fa-link fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>

    </div> <!-- End Content -->
</template>
<script>
import ErrorHandling from "../../../plugins/ErrorHandling";

export default {

    data() {
        return {
            display_form: false,
            user: {
                id: "",
                uid: "",
                image: "",
                name: "",
                age: "",
                gender: "",
                profession: "",
                qualification: "",
                maritalStatus: "",
                height: "",
                weight: "",
                religion: "",
                blood: "",
                location: "",
            },

            searchParameter: '',
            sortBy: 'id',
            sortType: 'DESC',
            limit: 10,
            error_message: '',
            pagination: {},
            users: [],
            token: [],
            errors: new ErrorHandling(),
        };
    },

    methods: {

        closeModal() {
            $(this.$refs.UserProfileCard).modal("hide");
        },

        enableInput(event) {
            event.target.removeAttribute('readonly');
        },

        showModal() {
            $(this.$refs.showModal).modal("show");
        },

        showUserProfileCardModal() {
            $(this.$refs.UserProfileCard).modal("show");
        },

        fetchUser(page_url) {
            this.$showLoader();

            console.log("Searching for:", this.searchParameter);

            let vm = this;
            page_url = page_url || "/api/admin/groom-bride";
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
            page_url += '&activation=0';

            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.users = res.data.data;

                console.log('res.data.data')
                console.log(res.data.data)

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

        deleteUser(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/groom-bride/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success', 3000);
                            this.fetchUser();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        UserProfileCard(user) {
            this.showUserProfileCardModal();
            this.user.id = user.id;
            this.user.uid = user.uid;
            this.user.name = user.first_name + ' ' + user.last_name;
            this.user.age = user.birthday;
            this.user.image = user.profile_images[0];
            this.user.gender = user.gender;
            this.user.profession = user.profession;
            this.user.qualification = user.user_info.education_level;
            this.user.maritalStatus = user.marital_status;
            this.user.height = user.user_info.height;
            this.user.weight = user.user_info.weight;
            this.user.religion = user.religion;
            this.user.blood = user.user_info.blood_group;
            this.user.location = user.address;
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

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchUser();
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchUser();
        },

        calculateAge(birthday) {
            if (!birthday) return null;
            const birthDate = new Date(birthday);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

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
<style>
.icon-label {
    display: flex;
    align-items: center;
}

.icon-label i {
    width: 1.25em;
    text-align: center;
}

.icon-label strong {
    margin-left: 5px;
}

.icon-label-text {
    width: 120px;
}
</style>
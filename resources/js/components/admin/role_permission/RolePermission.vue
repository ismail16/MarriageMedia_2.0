<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Role-Permission List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Role Permissions
                </p>
            </div>
            <div>
                <router-link  v-if="this.$allPermissions.includes('role-manage')" class="btn btn-primary  kt_notes_panel_toggle" data-toggle="tooltip" title=""
                    data-placement="right" data-original-title="Check out more demos" to="/admin/role-permission/add">
                    <span class="rounded-circle shadow-sm ">
                        Create Role & Permission
                    </span>
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table text-center">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No</th>
                                        <th class="purchase">Name</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="(role, index) in roles" :key="role.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ role.name }}</td>
                                        <td>
                                            <router-link class="btn btn-sm btn-primary mr-1" :to="'role-permission/edit/' +
                                                role.id +
                                                '/' +
                                                role.name
                                                "><span><i class="fa fa-edit"></i>
                                                </span>
                                                <span class="">
                                                    Edit</span></router-link>
                                            <button class="btn btn-sm btn-danger" @click="deleteRole(role.id)">
                                                <span><i class="fa fa-trash"></i>
                                                </span>
                                                <span class=""> Delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Modal -->
        <div class="modal fade" ref="addEditModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ modal_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit="addEditRole" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Role Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Role Name"
                                            required v-model="role.name" />
                                        <div class="invalid-feedback">
                                            Please enter role name.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"
                                @click="closeModal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</template>

<script>
export default {
    name: "Role",
    data() {
        return {
            roles: [],
            token: [],
            role: {
                id: "",
                name: "",
            },
            modal_title: "",
        };
    },
    methods: {
        showAddEditModal() {
            $(this.$refs.addEditModal).modal("show");
        },
        fetchRoles() {
            axios.get("/api/admin/role", this.token).then((response) => {
                this.roles = response.data.data;
                //console.log(this.roles);
            });
        },

        addRole() {
            this.clearForm();
            this.showAddEditModal();
            this.modal_title = "Add Role";
        },

        addEditRole(e) {
            //console.log(this.role);
            if (this.modal_title == "Add Role") {
                axios
                    .post("/api/admin/role", this.role, this.token)
                    .then((response) => {
                        // console.log(response);
                        this.fetchRoles();
                        this.clearForm();
                        $(this.$refs.addEditModal).modal("hide");
                    });
            } else {
                axios
                    .put(
                        "/api/admin/role/" + this.role.id,
                        this.role,
                        this.token
                    )
                    .then((response) => {
                        // console.log(response);
                        this.fetchRoles();
                        this.clearForm();
                        $(this.$refs.addEditModal).modal("hide");
                    });
            }

            e.preventDefault();
        },

        deleteRole(id) {
            if (confirm("Are you sure you want to delete this role?")) {
                axios
                    .delete(`/api/admin/role/${id}`, this.token)
                    .then((response) => {
                        this.fetchRoles();
                    });
            }
        },

        clearForm() {
            this.role = {
                id: "",
                name: "",
            };
        },

        closeModal() {
            $(this.$refs.addEditModal).modal("hide");
        },
    },

    mounted() {
        var token = localStorage.getItem("token");
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        };
        this.fetchRoles();
    },
};
</script>

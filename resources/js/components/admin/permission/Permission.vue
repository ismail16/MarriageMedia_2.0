<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Permission List</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Permissions
                </p>
            </div>
            <div>
                <router-link  class="btn btn-primary  kt_notes_panel_toggle" data-toggle="tooltip" title=""
                    data-placement="right" data-original-title="Check out more demos" to="/admin/create-permission">
                    <span class="rounded-circle shadow-sm ">
                        Create Permission
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
                                    <tr v-for="(permission, index) in permissions.filter(p => p.parent_id == 0)" :key="permission.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ permission.name }}</td>
                                        <td>
                                            <router-link class="btn btn-sm btn-primary mr-1" 
                                                :to="'edit-permission/' + permission.id +'/' + permission.name">
                                                <span><i class="fa fa-edit"></i></span>
                                                <span class="">Edit</span>
                                            </router-link>
                                            <button class="btn btn-sm btn-danger" @click="deletePermission(permission.id)">
                                                <span><i class="fa fa-trash"></i> </span>
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
    </div> 
</template>

<script>
export default {
    name: "Role",
    data() {
        return {
            permissions: [],
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
        fetchPermissions() {
            axios.get("/api/admin/permission", this.token).then((response) => {
                this.permissions = response.data.data;
                console.log('this.permissions');
                console.log(this.permissions);

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

        deletePermission(id) {
            if (confirm("Are you sure you want to delete this role?")) {
                axios
                    .delete(`/api/admin/permission/${id}`, this.token)
                    .then((response) => {
                        this.fetchPermissions();
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
        this.fetchPermissions();
    },
};
</script>

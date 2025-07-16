<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1 class="modal-title" id="" v-if="edit == false">Create Role Permission</h1>
                        <h1 class="modal-title" id="" v-if="edit == true">Edit Role Permission</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Roles & Permission
                </p>
            </div>
            <!-- <div>
                <button class="btn btn-primary  kt_notes_panel_toggle" data-toggle="tooltip" title=""
                    data-placement="right" data-original-title="Check out more demos" @click="addRole">
                    <span class="rounded-circle shadow-sm ">
                        Create Role
                    </span>
                </button>
            </div> -->
        </div>

        <div class="table-content table-basic">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="modal-body">
                            <div class="row mb-1">
                                <div class="col-md-12 p-0">
                                    <div class="">
                                        <label for="">Role Name</label>
                                        <input type="text" class="form-control" id="" v-model="role_name"
                                            placeholder="Enter Role Name" required />
                                            <small class="form-text text-danger" v-if="errors.has('role_name')" v-text="errors.get('role_name')"> </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row border">
                                <div class="col-md-2 bg-light">
                                    <span class="d-flex">
                                        <h3>Module</h3>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="text-center">Permission</h3>
                                </div>
                            </div>
                            <div v-for="permission in permissions" :key="permission.id">
                                <div v-if="permission.parent_id == '0'" class="row border">
                                    <div class="col-md-2 bg-light pt-3 pb-3 d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input mr-2" type="checkbox" :value="permission.id"
                                                @change="parentCheck($event, permission.id)"
                                                :checked="selectedPermission.includes(permission.id)" />
                                            <span>{{ permission.name }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-10 pt-3 pb-3 ">
                                        <div class="row ">
                                            <div v-for="childPermission in permissions" :key="childPermission.id"
                                                class="col-md-3 p-2">
                                                <span class="text-center" v-if="permission.id == childPermission.parent_id">
                                                    <div class="form-check form-check-inline " v-if="
                                                        selectedPermission.includes(
                                                            permission.id
                                                        )
                                                    ">
                                                        {{ childPermission.name }}
                                                        <input class="form-check-input" type="checkbox"
                                                            :value="childPermission.id"
                                                            @change="check($event, permission.id)"
                                                            :checked="selectedPermission.includes(childPermission.id)" />
                                                    </div>

                                                    <div class="form-check form-check-inline" v-else>
                                                        {{ childPermission.name }}

                                                        <input class="form-check-input" type="checkbox"
                                                            :value="childPermission.id"
                                                            @change="check($event, permission.id)" />
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-pill mr-center"
                                    @click="addEditRolePermission()"> <span v-if="edit == true">
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
            </div>
        </div>
    </div>
</template>

<script>
import ErrorHandling from "../../../plugins/ErrorHandling";
export default {
    name: "AddEditRolePermission",
    data() {
        return {
            role_name: "",
            role: {
                id: "",
                name: "",
            },
            error_message: "",
            token: [],
            permissions: [],
            selectedPermission: [],
            edit: false,
            errors: new ErrorHandling(),
        };
    },
    methods: {
        addEditRolePermission() {
            if (this.selectedPermission.length == 0) {
                this.$toast("Please select AL least 1 permission", "error", 3000);
                return;
            }

            this.$showLoader();
            var url = "/api/admin/role-permission";
            this.request_method = "post";
            axios[this.request_method](
                url,
                {
                    role_id: this.$route.params.id,
                    permissions: this.selectedPermission,
                    role_name: this.role_name,
                },
                this.token
            )
                .then((response) => {
                    if (response.data.status == "Success") {
                           this.$toast(response.data.msg, "success", 3000);
                        this.$router.push("/admin/role-permission");
                    } else {
                        this.$toast(response.data.msg, "error", 3000);
                    }
                })
                .catch((error) => {
                    this.$toast(error.response.data.message, "error", 3000);
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
        },

        fetchPermissions() {
            axios
                .get("/api/admin/permission", this.token)
                .then((response) => {
                    this.permissions = response.data.data;
                    console.log(this.permissions);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        fetchRolePermission() {
          this.$showLoader();
          if(this.$route.params.id){
            this.edit = true;
          }
            var page_url = "/api/admin/role-permission";
            page_url = page_url + "?role_id=" + this.$route.params.id;

            axios
                .get(page_url, this.token)
                .then((response) => {
                    var rolePermission = response.data.data;
                    rolePermission.filter((response) => {
                        this.selectedPermission.push(
                            parseInt(response.permission.id)
                        );
                    });
                    console.log(response.data.data);
                })
                .finally(() => this.$hideLoader());
        },

        check(e, parent_id) {
            if (e.target.checked) {
                console.log(parent_id);
                this.selectedPermission.push(parseInt(e.target.value));
                //check parent_id is in selectedPermission array or not
                if (!this.selectedPermission.includes(parent_id)) {
                    this.selectedPermission.push(parent_id);
                }
            } else {
                this.selectedPermission.splice(
                    this.selectedPermission.indexOf(parseInt(e.target.value)),
                    1
                );
            }
        },

        parentCheck(e, parent_id) {
            if (e.target.checked) {
                this.selectedPermission.push(parseInt(e.target.value));
                this.permissions.filter((permission) => {
                    if (permission.parent_id == parent_id) {
                        if (!this.selectedPermission.includes(permission.id)) {
                            this.selectedPermission.push(permission.id);
                        }
                    }
                });
            } else {
                this.selectedPermission.splice(
                    this.selectedPermission.indexOf(parseInt(e.target.value)),
                    1
                );
                this.permissions.filter((permission) => {
                    if (permission.parent_id == parent_id) {
                        if (this.selectedPermission.includes(permission.id)) {
                            this.selectedPermission.splice(
                                this.selectedPermission.indexOf(permission.id),
                                1
                            );
                        }

                    }
                });
            }
        },
    },



    created() {
        if (this.$route.params.name) {
            this.role_name = this.$route.params.name;
        }
    },

    mounted() {
        var token = localStorage.getItem("token");
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        };
        this.fetchPermissions();
        this.fetchRolePermission();
    },
};
</script>

<style>
div:empty {
    display: none;
}
</style>

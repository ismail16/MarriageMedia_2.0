<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1 class="modal-title" id="" v-if="edit == false">Create Permission</h1>
                <h1 class="modal-title" id="" v-if="edit == true">Edit Permission</h1>
                <p class="breadcrumbs">
                    <span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i><a href="/admin/permission">Permissions</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>{{role_name}}
                </p>
            </div>
        </div>

        <div class="table-content table-basic">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="modal-body">
                            <div class="row mb-1">
                                <!-- <div class="col-md-12 p-0">
                                    <div class="">
                                        <label for="">Permission Name</label>
                                        <input type="text" class="form-control" id="" v-model="role_name"
                                            placeholder="Enter Role Name" required />
                                            <small class="form-text text-danger" v-if="errors.has('role_name')" v-text="errors.get('role_name')"> </small>
                                    </div>
                                </div> -->

                                <div class="col-md-5 p-0">
                                    <div class="">
                                        <label for="">Permission Name</label>
                                        <input type="text" class="form-control" id="" v-model="parent_permission_name"
                                            placeholder="Enter parent permission Name" required />
                                            <small class="form-text text-danger" v-if="errors.has('parent_permission')" v-text="errors.get('parent_permission')"> </small>
                                    </div>
                                </div>
                                <div class="col-md-5 p-0">
                                    <div class="">
                                        <label for="">Permission Value</label>
                                        <input type="text" class="form-control" id="" v-model="parent_permission_value"
                                            placeholder="Enter parent permission value" required />
                                            <small class="form-text text-danger" v-if="errors.has('parent_permission_value')" v-text="errors.get('parent_permission')"> </small>
                                    </div>
                                </div>
                                 <div class="col-md-2 p-0">
                                     <label for="">Add New Row</label>
                                    <div class="">
                                       <button class="btn btn-primary" @click="addNewRow()"><i class="fa fa-plus"></i> Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row border">
                                <div class="col-md-6 bg-light text-center">
                                        <p>key</p>
                                </div>
                                <div class="col-md-6 bg-light text-center">
                                        <p>value</p>
                                </div>
                            </div>
                            <div v-for="permissionChild in permission.children" :key="permissionChild.id">
                                <div v-if="permission.parent_id == '0'" class="row border">
                                    <div class="col-md-6">
                                        <div>
                                            <input class="form-control" type="text" v-model="permissionChild.key"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <input class="form-control" type="text" v-model="permissionChild.value"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-left mt-2">
                                <button type="submit" class="btn btn-primary btn-pill mr-center"
                                    @click="updatePermission()"> <span v-if="edit == true">
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
            parent_permission_name: "",
            parent_permission_value: "",
            permissionChildren:[
                { key:'Read', value:'read-'},
                { key:'Create', value:'create-'},
                { key:'Edit', value:'edit-'},
                { key:'Delete', value:'delete-'}
            ],
            error_message: "",
            token: [],
            permission: '',
            selectedPermission: [],
            edit: false,
            errors: new ErrorHandling(),
        };
    },
    methods: {
        updatePermission() {


            this.$showLoader();
            var url = "/api/admin/permission/" + this.$route.params.id;
            this.request_method = "put";
            var data = {
                    parentPermissionName: this.parent_permission_name,
                    parentPermissionValue: this.parent_permission_value,
                    childPermissions: this.permissionChildren,
                };

            axios[this.request_method](url,data, this.token)
                .then((response) => {
                    if (response.data.status == "Success") {
                        this.$toast(response.data.msg, "success", 3000);
                        this.$router.push("/admin/permission");
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


        fetchPermission() {
            this.$showLoader();
            if(this.$route.params.id){
                this.edit = true;
            }


            // var page_url = "/api/admin/permission/" + this.$route.params.id;
            var page_url = "/api/admin/permission/" + this.$route.params.id;
            

            // var page_url = "/api/admin/permission" + "?permission_id=" + this.$route.params.id;
            console.log(page_url)

            axios
                .get(page_url, this.token)
                .then((response) => {
                    this.permission = response.data;


                    this.parent_permission_name = response.data.key;
                    this.parent_permission_value = response.data.value;


                    this.permissionChildren = response.data.children;

                    console.log('Permissionssssssssss');
                    console.log(this.permission);
                    console.log('Permissionssssssssss');

                })
                .finally(() => this.$hideLoader());
        },

        addNewRow(){
            var row =  {key:'read', value:'read-'}
            this.permissionChildren.push(row);
        },

        removeNewRow(row){
            const index = this.permissionChildren.indexOf(row);
            if (index !== -1) {
                this.permissionChildren.splice(index, 1);
            }
        },

        updateChildPermissions() {
            this.permissionChildren = this.permissionChildren.map(child => {
                return {
                    ...child,
                    value: child.key.toLowerCase() + '-' + this.parentPermissionValue
                };
            });
        }


      

        

    },



    created() {
        if (this.$route.params.name) {
            this.role_name = this.$route.params.name;
        }
    },

     watch: {
        parentPermissionValue(newVal) {
            this.permissionChildren.forEach(child => {
                child.value = child.key.toLowerCase() + '-' + newVal;
            });
        }
    },

    mounted() {
        var token = localStorage.getItem("token");
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        };
        
        this.fetchPermission();
    },
};
</script>

<style>
div:empty {
    display: none;
}
</style>

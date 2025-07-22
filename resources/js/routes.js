import Login from "./components/admin/Login.vue";
import AccessDenied from "./components/admin/AccessDenied.vue";
import Dashboard from "./components/admin/Dashboard.vue";


import Permission from "./components/admin/permission/Permission.vue";
import AddPermission from "./components/admin/permission/AddPermission.vue";
import EditPermission from "./components/admin/permission/EditPermission.vue";

//role permission
import Role from "./components/admin/role_permission/Role.vue";

import RolePermission from "./components/admin/role_permission/RolePermission.vue";
import AddEditRolePermission from "./components/admin/role_permission/AddEditRolePermission.vue";

//admin
import Admin from "./components/admin/admins/Admin.vue";


import Customer from "./components/admin/users/Customer.vue";
import CustomerProfile from "./components/admin/users/CustomerProfile.vue";

import activebridegroom from "./components/admin/groom_bride/Active.vue";


export default [
    { path: "/admin/login", component: Login, name: "Login", meta: { auth: false }},

    { path: "/admin/access-denied", component: AccessDenied, name: 'access-denied', meta: { auth: false } },
    {
        path: "/admin/", component: () => import("./components/Main.vue"), name: "main",
        children: [
            { path: "dashboard", component: Dashboard, name: "dashboard", meta: { auth: true }},

            //role permission
            { path: "role", component: Role, name: "role", meta: { auth: true }},

            { path: "permission", component: Permission, name: "permission", meta: { auth: true }},
            { path: "create-permission", component: AddPermission, name: "create-permission", meta: { auth: true }},
            { path: 'edit-permission/:id/:name', component: EditPermission, name:"edit-permission",  meta: { auth: true }},

            { path: "role-permission", component: RolePermission, name: "role-permission", meta: { auth: true }},
            { path: "role-permission/add", component: AddEditRolePermission, name: "add-role-permission", meta: { auth: true }},
            { path: 'role-permission/edit/:id/:name', component: AddEditRolePermission, name:"edit-role-permission",  meta: { auth: true }},

            //user
            { path: "user", component: Admin, name: "admin-user", meta: { auth: true }},


            { path: "customer", component: Customer, name: "customer", meta: { auth: true }},
            { path: "read-customers/:id", component: CustomerProfile, name: "read-customers", meta: { auth: true }},


            //user
            { path: "activebridegroom", component: activebridegroom, name: "activebridegroom", meta: { auth: true }},
            // { path: "customer", component: Customer, name: "customer", meta: { auth: true }},
            // { path: "read-customers/:id", component: CustomerProfile, name: "read-customers", meta: { auth: true }},
        ],
    },
];


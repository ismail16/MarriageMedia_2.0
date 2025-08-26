<template>
    <div class="left-sidebar bg-sidebar  bg-light">
        <div id="sidebar" class="sidebar sidebar-footer">
            <div class="brand">
                <a href="/admin/dashboard" title="Dashboard">
                    <img class="brand-icon" src="/assets/img/user/user1.png" alt="" height="25" width="40" />
                    <span class="brand-name text-truncate">Dashboard</span>
                </a>
                <button class="btn btn-sm d-lg-none d-md-none" id="close_btn"
                    style="position: absolute; top: -5px; right: -5px;">
                    <i class="mdi mdi-close text-danger h3"></i>
                </button>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="navigation" data-simplebar>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">

                    <!-- Users -->
                    <li v-if="$allPermissions.includes('users')" class="has-sub mt-2 "
                        @click.prevent="setActive('Users')"
                        :class="{ active: this.$route.name == 'role-permission' || this.$route.name == 'admin-user' || this.$route.name == 'customer' || this.$route.name == 'supplier' }">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users</span>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <!-- <li>
                                    <router-link to="/admin/role" class="sidenav-item-link"
                                        @click.prevent="setActive('roles')"
                                        :class="{ active: isActive('roles') }">Role</router-link>
                                </li> -->
                                <li v-if="$allPermissions.includes('admin-user')">
                                    <router-link to="/admin/user" class="sidenav-item-link"
                                        @click.prevent="setActive('user')"
                                        :class="{ active: isActive('user') }">Admin-User</router-link>
                                </li>

                                <li v-if="$allPermissions.includes('admin-user')">
                                    <router-link to="/admin/permission" class="sidenav-item-link"
                                        @click.prevent="setActive('permission')"
                                        :class="{ active: isActive('permission') }">Permission</router-link>
                                </li>

                                <li v-if="$allPermissions.includes('role-permission')">
                                    <router-link to="/admin/role-permission" class="sidenav-item-link"
                                        @click.prevent="setActive('role-permission')"
                                        :class="{ active: isActive('role-permission') }">Role-Permission</router-link>
                                </li>

                                <li v-if="$allPermissions.includes('customer')">
                                    <router-link to="/admin/customer" class="sidenav-item-link"
                                        @click.prevent="setActive('customer')"
                                        :class="{ active: isActive('customer') }">Customer</router-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Brides/Grooms -->
                    <li class="has-sub mt-2">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <img src="/images/icons/flaticon/047-couple-1.png" height="25" alt="">
                            <span class="nav-text ml-2">Brides/Grooms</span>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <router-link to="/admin/request-bride-groom" class="sidenav-item-link">
                                        <img src="/images/icons/flaticon/031-mail.png" height="18" alt="">
                                        <span class="ml-1">Request</span>
                                    </router-link>
                                    <router-link to="/admin/active-bride-groom" class="sidenav-item-link">
                                        <img src="/images/icons/flaticon/064-love.png" height="18" alt="">
                                        <span class="ml-1">Active</span>
                                    </router-link>
                                    <router-link to="/admin/archive-bride-groom" class="sidenav-item-link">
                                        <img src="/images/icons/flaticon/027-behavior.png" height="18" alt="">
                                        <span class="ml-1">Archive</span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-sub mt-2">
                        <router-link to="/admin/message" class="sidenav-item-link">
                            <img src="/images/icons/flaticon/080-message-1.png" height="25" alt="">
                            <span class="ml-1">Message</span>
                        </router-link>
                    </li>

                    <li class="has-sub mt-2">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <img src="/images/icons/flaticon/033-mail-1.png" height="25" alt="">
                            <span class="nav-text ml-2">Send Email</span>
                        </a>
                    </li>

                    <li class="has-sub mt-2">
                        <router-link to="/admin/success-story" class="sidenav-item-link">
                            <img src="/images/icons/flaticon/045-wedding-couple.png" height="25" alt="">
                            <span class="ml-1">Success Story</span>
                        </router-link>
                    </li>

                    <li class="has-sub mt-2">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <img src="/images/icons/flaticon/076-delivery-box.png" height="25" alt="">
                            <span class="nav-text ml-2">Package Price</span>
                        </a>
                    </li>

                    <!-- Area -->
                    <li class="has-sub mt-2">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <img src="/images/icons/flaticon/008-placeholder.png" height="25" alt="">
                            <span class="nav-text ml-2">Area</span>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <router-link to="#" class="sidenav-item-link">Division</router-link>
                                    <router-link to="#" class="sidenav-item-link">District</router-link>
                                    <router-link to="#" class="sidenav-item-link">Upazila</router-link>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <!-- Affiliate -->
                    <li class="has-sub mt-2">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <img src="/images/icons/flaticon/083-affiliate.png" height="25" alt="">
                            <span class="nav-text ml-2">Affiliate</span>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <router-link to="#" class="sidenav-item-link">Users</router-link>
                                    <router-link to="#" class="sidenav-item-link">Payment</router-link>
                                    <router-link to="#" class="sidenav-item-link">Referral List</router-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
    data() {
        return {
            activeItem: "",
            toggleMenu: false,
            activeChildItem: "",
            toggleChildMenu: ""
        };
    },
    created: function () {
        // this.setActive(this.$route.name);
    },
    methods: {
        isActive(menuItem) {
            return this.activeItem === menuItem && this.toggleMenu;
        },
        setActive(menuItem) {
            if (localStorage.getItem("menueItem") != menuItem) {
                this.toggleMenu = false;
            }
            localStorage.setItem("menueItem", menuItem);
            this.activeItem = menuItem;
            this.toggleMenu = !this.toggleMenu;
        }
    },
    mounted() {
        console.log(localStorage.getItem("permissions"))
    

    },

    // props: ["burgerMenu"],
};
</script>

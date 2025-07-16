<template>
    <header class="main-header" id="header">
        <nav class="navbar navbar-static-top navbar-expand-lg">
            <!-- Sidebar toggle button -->
            <button id="sidebar-toggler" class="sidebar-toggle"></button>
            <!-- search form -->
            <div class="search-form d-lg-inline-block">
                <div class="input-group">
                    <input type="text" name="query" id="search-input" class="form-control" placeholder="search.."
                        autofocus autocomplete="off" />
                    <button type="button" name="search" id="search-btn" class="btn btn-flat">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
                <div id="search-results-container">
                    <ul id="search-results"></ul>
                </div>
            </div>

            <!-- navbar right -->
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account -->
                    <li>
                        <div class="posicon d-lg-block d-none">
                            <a href="/" class="white btn btn-link mr-2 fw-bold" target="_blank">Web</a>
                        </div>
                    </li>
                    <li class="dropdown notifications-menu custom-dropdown"  v-if="$allPermissions.includes('pos')">
                        <button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
                            <i class="mdi mdi-bell-outline"></i>
                        </button>

                        <div class="card card-default dropdown-notify dropdown-menu-right mb-0">
                            <div class="card-header card-header-border-bottom px-3">
                                <h2>Notifications</h2>
                            </div>

                            <div class="card-body px-0 py-0">
                                <ul class="nav nav-tabs nav-style-border p-0 justify-content-between" id="myTab"
                                    role="tablist">
                                    <li class="nav-item mx-3 my-0 py-0">
                                        <a href="#" class="btn btn-sm btn-success" id="orders-tab" data-bs-toggle="tab"
                                            data-bs-target="#orders" role="tab" aria-controls="orders"
                                            aria-selected="true">Orders ({{  this.orders.length }})</a>
                                    </li>

                                    <li class="nav-item mx-3 my-0 py-0">
                                        <a href="#" class="btn btn-sm btn-info" id="profile2-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile2" role="tab" aria-controls="profile2"
                                            aria-selected="false">Msgs ({{ this.messages.length }})</a>
                                    </li>

                                    <li class="nav-item mx-3 my-0 py-0">
                                        <a href="#" class="btn btn-sm btn-primary" id="contact2-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact2" role="tab" aria-controls="contact2"
                                            aria-selected="false">Activity</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myNotifications">
                                    <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                            <li v-for="order in this.orders" :key="order.order_id">
                                                <a :href="'/admin/edit-orders/' + order.order_id" class="media media-message media-notification">
                                                    <div class="media-body d-flex justify-content-between">
                                                        <div class="message-contents">
                                                            <h4 class="title">{{ order.billing_first_name }}</h4>
                                                            <p class="">Order from <b>{{ order.order_from }}</b> at <span class="font-size-12 font-weight-medium">
                                                                <i class="mdi mdi-clock-outline"></i> 
                                                                {{ order.order_date }}
                                                            </span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="profile2" role="tabpanel">
                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                            <li v-for="message in this.messages" :key="message.id" class="border-bottom">
                                                <a :href="'/admin/read-messages/' + message.id" class="media media-message media-notification">
                                                    <div class="media-body d-flex justify-content-between">
                                                        <div class="message-contents">
                                                            <h4 class="title">{{ message.first_name }}</h4>
                                                            <p class="">Message for Query at <span class="font-size-12 font-weight-medium">
                                                                <i class="mdi mdi-clock-outline"></i> 
                                                                {{ message.created_at }}
                                                            </span></p>
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mr-3">
                                                        <i class="mdi mdi-message h2"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="contact2" role="tabpanel">
                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                            <li>
                                                <a href="javscript:void(0)"
                                                    class="media media-message media-notification event-active">

                                                    <div
                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                                        <i class="mdi mdi-calendar-check font-size-20"></i>
                                                    </div>

                                                    <div class="media-body d-flex justify-content-between">
                                                        <div class="message-contents">
                                                            <h4 class="title">Upcomming event added</h4>
                                                            <p class="last-msg font-size-14">03/Jan/2020
                                                                (1pm -
                                                                2pm)</p>

                                                            <span
                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                <i class="mdi mdi-clock-outline"></i> 10 min
                                                                ago...
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javscript:void(0)"
                                                    class="media media-message media-notification">

                                                    <div
                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                        <i class="mdi mdi-chart-areaspline font-size-20"></i>
                                                    </div>

                                                    <div class="media-body d-flex justify-content-between">
                                                        <div class="message-contents">
                                                            <h4 class="title">New Sales report</h4>
                                                            <p class="last-msg font-size-14">Lorem ipsum
                                                                dolor
                                                                sit, amet consectetur adipisicing elit. Nam
                                                                itaque doloremque odio, eligendi delectus
                                                                vitae.
                                                            </p>

                                                            <span
                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                ago...
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="dropdown-menu dropdown-menu-right d-none">
                            <li class="dropdown-header">You have 5 notifications</li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-plus"></i> New user registered
                                    <span class=" font-size-12 d-inline-block float-right"><i
                                            class="mdi mdi-clock-outline"></i> 10 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-remove"></i> User deleted
                                    <span class=" font-size-12 d-inline-block float-right"><i
                                            class="mdi mdi-clock-outline"></i> 07 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                    <span class=" font-size-12 d-inline-block float-right"><i
                                            class="mdi mdi-clock-outline"></i> 12 PM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-supervisor"></i> New client
                                    <span class=" font-size-12 d-inline-block float-right"><i
                                            class="mdi mdi-clock-outline"></i> 10 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-server-network-off"></i> Server overloaded
                                    <span class=" font-size-12 d-inline-block float-right"><i
                                            class="mdi mdi-clock-outline"></i> 05 AM</span>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a class="text-center" href="#"> View All </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user-menu">
                        <button class="dropdown-toggle nav-link drop fw-bold" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <!-- <span class="text-primary">{{ username }}</span> -->
                            <img src="/assets/img/user/user1.png" class="user-image border ml-2 mr-2"
                                alt="User Image" />
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu">
                            <!-- User image -->
                            <li class="dropdown-header">
                                <img src="/assets/img/user/user1.png" class="img-circle" alt="User Image" />
                                <div class="d-inline-block fw-bold">
                                    {{ username }}
                                    <small class="pt-1">{{ email }}</small>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account"></i> My Profile
                                </a>
                            </li>
                            <!-- <li class="right-sidebar-in">
                                <a href="javascript:0">
                                    <i class="mdi mdi-settings-outline"></i>
                                    Setting
                                </a>
                            </li> -->
                            <li class="dropdown-footer text-center p-3 ">
                                <a href="#" class="dropdown-item text-danger bg-light font-weight-bold"
                                    @click="logOut()">
                                    <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-power">
                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                            <line x1="12" y1="2" x2="12" y2="12"></line>
                                        </svg>
                                    </span>
                                    <strong>Logout</strong>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            showdropdown: false,
            username: "",
            email : "",
            orders: [],
            messages: [],
            sortBy: 'id',
            sortType: 'desc'
        };
    },
    methods: {
        logOut() {
            this.$parent.loading = true;
            let page_url = "/api/admin/logout";
            axios.post(page_url, {}, this.token).then((res) => {
                localStorage.setItem("loggedIn", 0);
                localStorage.removeItem("token");
                localStorage.removeItem("name");
                localStorage.removeItem("user_id");
                localStorage.clear();
                setTimeout(() => {
                    this.$router.push("/admin/login");
                }, 1000);
            });
        },

        showDropDown() {
            this.showdropdown = !this.showdropdown;
        },
    },
    mounted() {
        var token = localStorage.getItem("token");
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        };
        if (localStorage.getItem("name")) {
            this.username = localStorage.getItem("name");
            this.email = localStorage.getItem("email");
        };
    },
};
</script>

<template>
    <!--  WRAPPER  -->
    <div class="wrapper">
        <!-- LEFT MAIN SIDEBAR -->
        <Sidebar :burgerMenu="burgerMenu" />

        <!--  PAGE WRAPPER -->
        <div class="page-wrapper">
            <!-- Header -->
            <Header @setBurgerMenu="setBurgerMenu" />

            <!-- CONTENT WRAPPER -->
            <div class="content-wrapper">
                <router-view> </router-view>
            </div>
            <!-- Footer -->
            <Footer/>
        </div>
    </div>
</template>

<script>
import Header from "./admin/partials/Header.vue";
import Sidebar from "./admin/partials/Sidebar.vue";
import Footer from "./admin/partials/Footer.vue";
export default {
    components: {
        Header,
        Sidebar,
        Footer,
    },
    data() {
        return {
            burgerMenu: false,
            isLoading: true,
            permissions : ''
        };
    },
    methods: {
        setBurgerMenu() {
            this.burgerMenu = !this.burgerMenu;
        },

    },
    
 

    created() {
        if (localStorage.getItem("permissions")) {
            this.permissions = localStorage.getItem("permissions").split(",");
    console.log(this.$route.name);
             if (this.$route.name !== "dashboard" && !this.permissions.includes(this.$route.name)  ) {
                 this.$router.push("/admin/access-denied");
             }
        }
    },
    mounted() {
    },
};


</script>

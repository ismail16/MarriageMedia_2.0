import "./bootstrap";

// Backend css
import "../../public/assets/plugins/daterangepicker/daterangepicker.css";
import "../../public/assets/plugins/simplebar/simplebar.css";
import "../../public/assets/css/style.css";
import "../../public/backend/css/timeline.css";
import "../../public/frontend_assets/css/customs.css";

// import 'vue-multiselect/dist/vue-multiselect.css';

// Backend js
import "../../public/assets/plugins/jquery/jquery-3.5.1.min.js";
import "../../public/assets/js/bootstrap.bundle.min.js";
import "../../public/assets/plugins/simplebar/simplebar.min.js";
import "../../public/assets/plugins/jquery-zoom/jquery.zoom.min.js";
import "../../public/assets/plugins/slick/slick.min.js";
import "../../public/assets/plugins/charts/Chart.min.js";
import "../../public/assets/js/chart.js";

// import "../../public/assets/plugins/charts/google-map-loader.js";
// import "../../public/assets/plugins/charts/google-map.js";
// import "../../public/assets/plugins/daterangepicker/moment.min.js";
// import "../../public/assets/plugins/daterangepicker/daterangepicker.js";
// import "../../public/assets/js/date-range.js";
import "../../public/assets/plugins/options-sidebar/optionswitcher.js";
import "../../public/assets/js/main.js";

// package
// import CKEditor from '@ckeditor/ckeditor5-vue';
// import Toaster from "@meforma/vue-toaster";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { createRouter, createWebHistory } from "vue-router";
import Routes from "./routes.js";

// customs plugin
import ToastPlugin from './plugins/toastPlugin.js';
import LoaderPlugin from './plugins/LoaderPlugin.js';
// import AttachImage from './components/admin/AttachImage.vue';




const app = createApp();

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});


// use customs plugin
app.use(router);
// app.use(Toaster, {
//     duration:1000
// });
app.use(ToastPlugin);
app.use(LoaderPlugin);
app.config.globalProperties.$formatDate = function(value) {
    if (!value) return '';
    return new Date(value).toLocaleDateString('en-AU');
};
  
app.config.globalProperties.$formatTime = function(value) {
    if (!value) return '';
    return new Date(value).toLocaleTimeString('en-AU');
};

app.config.globalProperties.$allPermissions = '';
if (localStorage.getItem("permissions")) {

    app.config.globalProperties.$allPermissions = localStorage.getItem("permissions").split(",");

    
}



// Login system
router.beforeEach((to, from, next) => {
    var loggedIn = localStorage.getItem("loggedIn");
    // console.log(loggedIn);
    if (to.path === "/admin/login") {
        if (loggedIn == 1) {
            next("/admin/dashboard"); // Redirect to dashboard if already logged in
            return;
        } else {
            next(); // Proceed to login page
            return;
        }
    }

    if (
        to.matched.some((record) => record.meta.auth) &&
        (loggedIn == null || loggedIn == false)
    ) {
        next("/admin/login"); // Redirect to login if not logged in
        return;
    }

    var token = localStorage.getItem("token");

    if (
        loggedIn != null &&
        token != null &&
        to.matched.some((record) => record.meta.auth)
    ) {
        const config = {
            headers: { Authorization: `Bearer ${token}` },
        };

        axios
            .post("/api/admin/token-validate", {}, config)
            .then((res) => {
                if (res.status == 401) {
                    localStorage.removeItem("token");
                    localStorage.removeItem("loggedIn");
                    next("/admin/login"); // Redirect to login if token validation fails
                } else {
                    // Token validation successful, proceed with navigation
                    next();
                }
            })
            .catch((error) => {
                console.log(error);
                next("/admin/login"); // Redirect to login if token validation fails
            });
    } else {
        next(); // Proceed with navigation if no token validation is required
    }
});

app.mount("#app");

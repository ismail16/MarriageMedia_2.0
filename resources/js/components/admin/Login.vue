<template>
    <div class="container-fluid bg-image bg-dark" style="background-image: url(/bg-login.png)">
        <div class="d-flex justify-content-center align-items-center">
            <div class="row w-100 justify-content-center" style="margin: 10% 0px 15% 0px">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-light border-primary mb-0 p-5">
                        <div class="card-header align-items-center justify-content-center">
                            <h5 class="pt-2 pb-2 text-dark">
                                Please login to your account.
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <p class="help is-danger mt-2 text-success bold text-center">
                                <strong>{{ message }}</strong>
                            </p>
                            <form id="myform" class="pb-5 pt-3" @submit.prevent="login">
                                <div class="form-group row">
                                    <div class="col-lg-2 col-3">
                                        <label for="email" class="mb-0 text-dark">
                                            <svg width="30px" height="30px" viewBox="0 0 16 16" class="bi bi-person"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="col-lg-10 col-9 pl-0">
                                        <input type="email" name="email" class="form-control border-secondary"
                                            placeholder="example@mail.com" id="email" v-model="email"
                                            aria-describedby="emailHelp" />
                                        <span class="help is-danger text-danger" v-if="errors.has('email')"
                                            v-text="errors.get('email')"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 col-3">
                                        <label for="password" class="mb-0 text-dark">
                                            <svg width="30px" height="30px" viewBox="0 0 16 16" class="bi bi-lock"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="col-lg-10 col-9 pl-0">
                                        <input type="password" name="password" placeholder="......."
                                            class="form-control text-dark border-secondary" id="password"
                                            v-model="password" />
                                        <span class="help is-danger text-danger" v-if="errors.has('password')"
                                            v-text="errors.get('password')"></span>
                                        <span class="help is-danger text-danger" v-if="error_message">
                                            {{ error_message }}
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary text-white font-weight-bold w-100 py-3">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
import ErrorHandling from "../../plugins/ErrorHandling";
export default {
    data() {
        return {
            email: "",
            password: "",
            error_message: "",
            message: "",
            errors: new ErrorHandling(),
        };
    },
    methods: {
        login() {
            
            localStorage.removeItem("token");
            localStorage.removeItem("loggedIn");
            localStorage.removeItem("email");
            localStorage.removeItem("name");
            localStorage.removeItem("user_id");

            localStorage.removeItem("permissions");

            this.message = "Login..";

            // this.$parent.loading = true;
            axios.post("/api/admin/login", {
                email: this.email,
                password: this.password,
            })
                .then((res) => {
                    if (res.data.status == "Success") {
                        console.log("Success");
                        console.log(res);
                        this.message = 'Login ' + res.data.status;
                        // var warehouse = [];

                        // res.data.user.warehouses.forEach((w) => {
                        //     warehouse.push(w.id);
                        // });
                        
                        localStorage.setItem("token", res.data.token);
                        localStorage.setItem("loggedIn", 1);
                        localStorage.setItem("email", res.data.user.email);
                        localStorage.setItem("user_id", res.data.user.id);
                        localStorage.setItem("name", res.data.user.name);
                        localStorage.setItem("permissions",res.data.user_permissions);
                        localStorage.setItem("role_id",res.data.user.role_id);

                        this.$router.push("/admin/dashboard");
                        location.reload(true);


                    } else if (res.data.status == "Warning") {
                        this.message = 'Login ' + res.data.status;
                        var warehouse = [];
                        res.data.user.warehouses.forEach((w) => {
                            warehouse.push(w.id);
                        });
                        localStorage.setItem("token", res.data.token);
                        localStorage.setItem("loggedIn", 1);
                        localStorage.setItem("email", res.data.user.email);
                        localStorage.setItem("user_id", res.data.user.id);

                        localStorage.setItem("name", res.data.user.name);
                        localStorage.setItem("permissions",res.data.user_permissions);

                        // this.$router.push("/admin/dashboard");
                    } else if ((res.data.status = "Error")) {
                        this.error_message = res.data.message;
                        this.message = 'Login ' + res.data.status;
                    }
                })
                .catch((error) => {
                    this.error_message = "";
                    this.errors = new ErrorHandling();
                    if (error.response.status == 422) {
                        if (error.response.data.status == "Error") {
                            this.error_message = error.response.data.message;
                        } else {
                            this.errors.record(error.response.data.errors);
                        }
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
    },

};
</script>

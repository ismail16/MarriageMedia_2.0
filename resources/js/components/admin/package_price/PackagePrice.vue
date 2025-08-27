<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Package Price</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Package Price
                </p>
            </div>
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title=""
                data-placement="right" data-original-title="Check out more demos" @click="createPackagePrice">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_length float-start" id="productpagesTable_length"><label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchPackagePrices()">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select> entries</label></div>
                            <div id="productpagesTable_filter" class="dataTables_filter float-end">
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control" placeholder="Search"
                                        v-model="searchParameter" @keyup="fetchMessages" autocomplete="off"
                                        name="search-field" id="search-email" readonly @focus="enableInput" />

                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>proposal</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="package_price in package_prices" v-bind:key="package_price.id">
                                        <td>{{ package_price.id }}</td>
                                        <td>
                                            <img v-if="package_price.image"
                                                :src="'/images/packagePrice/' + package_price.image" alt="Profile Image"
                                                height="50" />
                                            <span v-else>No image</span>
                                        </td>
                                        <td>{{ package_price.title }}</td>
                                        <td>{{ package_price.price }}</td>
                                        <td >{{ package_price.duration }}</td>
                                        <td>{{ package_price.proposal }}</td>
                                        <td>{{ package_price.contact }}</td>
                                        <td>
                                            <button v-if="package_price.status == 0"
                                                class="btn btn-xs text-white bg-danger">
                                                <i class="fa fa-times-circle"></i> Deactive
                                            </button>
                                            <button v-else class="btn btn-xs text-white bg-success">
                                                <i class="fa fa-check-circle"></i> Active
                                            </button>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-xs btn-info mr-1 click-edit"
                                                data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="showPackagePrice(package_price)">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="btn btn-xs btn-primary mr-1 click-edit"
                                                data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="editPackagePrice(package_price)">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-xs btn-danger" href="#"
                                                @click="deletePackagePrice(package_price.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="package_prices.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="package_prices.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link"
                                        href="#" @click="fetchPackagePrices(pagination.prev_page_url)">Previous</a>
                                </li>

                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a
                                        class="page-link" href="#"
                                        @click="fetchPackagePrices(pagination.next_page_url)">Next</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Edit Package Price Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="AddEditPackagePeices">

            <div class="modal-dialog modal-lg">
                <div class="modal-content px-5 " style="height:auto;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="" v-if="edit == false">Create Package Peice</h5>
                        <h5 class="modal-title" id="" v-if="edit == true">Edit Package Peice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            @click="closeAddpackagePrice">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="p-3">
                                <form @submit.prevent="submitForm" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Title </label>
                                            <input type="text" v-model="packagePrice.title" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('title')">
                                                {{ errors.get('title') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Price </label>
                                            <input type="number" v-model="packagePrice.price" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('price')">
                                                {{ errors.get('price') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Discount </label>
                                            <input type="number" v-model="packagePrice.discount" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('discount')">
                                                {{ errors.get('discount') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0"> Duration (Day) </label>
                                            <input type="number" v-model="packagePrice.duration" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('duration')">
                                                {{ errors.get('duration') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0"> Proposal </label>
                                            <input type="number" v-model="packagePrice.proposal" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('proposal')">
                                                {{ errors.get('proposal') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0"> Contact </label>
                                            <input type="number" v-model="packagePrice.contact" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('contact')">
                                                {{ errors.get('contact') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Image </label>

                                            <input type="file" class="form-control" @change="onFileChange" ref="fileInput">

                                            <small class="text-danger" v-if="errors.has('image')">
                                                {{ errors.get('image') }}
                                            </small>
                                            <!-- Preview -->
                                            <div v-if="preview">
                                                <img :src="preview" alt="Preview" height="50" />
                                            </div>
                                            <div v-else-if="packagePrice.image && typeof packagePrice.image === 'string'">
                                                <img :src="'/images/packagePrice/' + packagePrice.image" alt="Profile Image" height="50" />
                                            </div>
                                            <span v-else>No image</span>
                                        </div>
                                        <div class="form-group mb-1 col-md-6">
                                            <label class="mb-0">Show Frontend</label>
                                            <select v-model="packagePrice.status" class="form-select">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <small class="text-danger" v-if="errors.has('status')">
                                                {{ errors.get('status') }}
                                            </small>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="modal-footer justify-content-center">
                                                <button type="submit" class="btn btn-primary"
                                                    @click="addUpdatePackagePrice()">  <span v-if="edit == true">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Show Package Price Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="showMessage">

            <div class="modal-dialog modal-xl">
                <div class="modal-content px-5 " style="height:auto;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card bg-light-green">
                            <div class="card-header">
                                <div>
                                    <h3>Success Story</h3>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <ul class="timeline timeline-left">
                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge bg_primary">
                                            <img src="/images/icons/flaticon/018-info-1.png" class="w-75">
                                        </div>
                                        <div class="timeline-panel bg-body-green -0">
                                            <div class="timeline-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-1 text-center">
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                               <img v-if="packagePrice.image"
                                                                :src="'/images/packagePrice/' + packagePrice.image" alt="Profile Image"
                                                                class="rounded-circle" height="80"/>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Bride Name </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ packagePrice.bride_name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Groom Name </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ packagePrice.groom_name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Location </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ packagePrice.location }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge bg_primary">
                                            <img src="/images/icons/flaticon/080-message-1.png" class="w-75">
                                        </div>
                                        <div class="timeline-panel bg-body-green -0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Comment</h4>
                                            </div>
                                            <div class="timeline-body text-dark">
                                                <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ packagePrice.comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" @click="closeModal">
                            <i class="fas fa-times"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import ErrorHandling from "../../../plugins/ErrorHandling";

export default {

    data() {
        return {
            display_form: false,
            packagePrice: {
                id: "",
                title: "",
                price: "",
                discount: "",
                duration: "",
                proposal: "",
                contact: "",
                image: "",
                status: 1,
            },
            preview: "",

            searchParameter: '',
            sortBy: 'id',
            sortType: 'DESC',
            limit: 10,
            error_message: '',
            edit: false,
            actions: false,
            pagination: {},
            package_prices: [],
            token: [],
            errors: new ErrorHandling(),
        };
    },

    methods: {

        closeModal() {
            $(this.$refs.showMessage).modal("hide");
        },

        showModal() {
            $(this.$refs.showMessage).modal("show");
        },

        ShowAddPackagePriceModal() {
            $(this.$refs.AddEditPackagePeices).modal("show");
        },

        closeAddpackagePrice() {
            $(this.$refs.AddEditPackagePeices).modal("hide");
        },

        createPackagePrice() {
            this.errors.record('');
            this.clearForm();
            this.ShowAddPackagePriceModal();
        },

        fetchPackagePrices(page_url) {
            this.$showLoader();
            let vm = this;
            page_url = page_url || "/api/admin/package-price";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }

            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }

            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType;
            page_url += '&status=1&activation=1';

            axios.get(page_url, this.token).then(res => {
                this.package_prices = res.data.data;
                console.log(res.data.data)
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
        },

        addUpdatePackagePrice() {
            this.$showLoader();
            let url = "/api/admin/package-price";

            if (this.edit === false) {
                // Add
                this.request_method = "post";
            } else {
                // Update
                url = "/api/admin/package-price/" + this.packagePrice.id;
                this.request_method = "post"; // 👈 use POST with _method=PUT (works better for file upload)
            }

            let formData = new FormData();
            formData.append("title", this.packagePrice.title);
            formData.append("price", this.packagePrice.price);
            formData.append("discount", this.packagePrice.discount);
            formData.append("duration", this.packagePrice.duration);
            formData.append("proposal", this.packagePrice.proposal);
            formData.append("contact", this.packagePrice.contact);
            formData.append("status", this.packagePrice.status);

            // ✅ only append image if it's a File (not a string URL)
            if (this.packagePrice.image instanceof File) {
                formData.append("image", this.packagePrice.image);
            }

            // 👈 if updating, Laravel expects PUT, so add _method
            if (this.edit === true) {
                formData.append("_method", "PUT");
            }

            axios.post(url, formData, this.token)
                .then((res) => {
                    if (res.data.status == "Success") {
                        $(this.$refs.AddEditPackagePeices).modal("hide");
                        this.$toast(res.data.message, 'success', 2000);
                        this.clearForm();
                        this.fetchPackagePrices();
                    } else {
                        this.$toast(res.data.message, 'error');
                    }
                })
                .catch((error) => {
                    console.log(error)
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
                .finally(() => (this.$hideLoader()));
        },


        editPackagePrice(packagePrice) {
            this.edit = true;
            this.errors.record('');
            this.ShowAddPackagePriceModal();
            this.packagePrice.id = packagePrice.id;
            this.packagePrice.title = packagePrice.title;
            this.packagePrice.price = packagePrice.price;
            this.packagePrice.discount = packagePrice.discount;
            this.packagePrice.duration = packagePrice.duration;
            this.packagePrice.proposal = packagePrice.proposal;
            this.packagePrice.contact = packagePrice.contact;
            this.packagePrice.image = packagePrice.image;
            this.packagePrice.status = packagePrice.status;
        },

        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        },

        deletePackagePrice(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/package-price/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success', 3000);
                            this.fetchPackagePrices();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        showPackagePrice(packagePrice) {
            this.errors.record('');
            this.showModal();
            this.packagePrice.id = packagePrice.id;
            this.packagePrice.title = packagePrice.title;
            this.packagePrice.price = packagePrice.price;
            this.packagePrice.discount = packagePrice.discount;
            this.packagePrice.duration = packagePrice.duration;
            this.packagePrice.proposal = packagePrice.proposal;
            this.packagePrice.contact = packagePrice.contact;
            this.packagePrice.image = packagePrice.image;
            this.packagePrice.status = packagePrice.status;
        },

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchPackagePrices();
        },
        
        onFileChange(e) {
            const file = e.target.files[0];
            if (file) {
                this.packagePrice.image = file;
                this.preview = URL.createObjectURL(file); // optional for preview
            }
        },

        clearForm() {
            this.edit = false;
            this.packagePrice.id = null;
            this.packagePrice.title = '';
            this.packagePrice.price = '';
            this.packagePrice.discount = '';
            this.packagePrice.duration = '';
            this.packagePrice.proposal = '';
            this.packagePrice.contact = '';
            this.packagePrice.image = '';
            this.packagePrice.status = '';
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchPackagePrices();
        },
    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.$nextTick(() => {
            setTimeout(() => {
                this.searchParameter = '';
                const el = document.getElementById('search-email');
                if (el) el.value = '';
            }, 100); // wait for autofill to apply, then clear
        });

        this.fetchPackagePrices();
    }
};
</script>
<style>
.icon-label {
    display: flex;
    align-items: center;
}

.icon-label i {
    width: 1.25em;
    text-align: center;
}

.icon-label strong {
    margin-left: 5px;
}

.icon-label-text {
    width: 120px;
}

.two-line-truncate {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    /* 👈 number of lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Success Stories</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Success Stories
                </p>
            </div>
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title=""
                data-placement="right" data-original-title="Check out more demos" @click="createSuccessStory">
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
                                        v-on:change="fetchSuccessStories()">
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
                                        <th>Image</th>
                                        <th>Bride Name</th>
                                        <th>Groom Name</th>
                                        <th class="w-25">Comment</th>                                        
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="success_story in success_stories" v-bind:key="success_story.id">
                                        <td>{{ success_story.id }}</td>
                                        <td>
                                            <img v-if="success_story.image"
                                                :src="'/images/successStory/' + success_story.image" alt="Profile Image"
                                                height="50" />
                                            <span v-else>No image</span>
                                        </td>
                                        <td>{{ success_story.bride_name }}</td>
                                        <td>{{ success_story.groom_name }}</td>
                                        <td class="two-line-truncate">
                                            {{ success_story.comment }}
                                        </td>
                                        <td>{{ success_story.location }}</td>
                                        <td>
                                            <button v-if="success_story.status == 0"
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
                                                @click="showSuccessStory(success_story)">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="btn btn-xs btn-primary mr-1 click-edit"
                                                data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="editSuccessStory(success_story)">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-xs btn-danger" href="#"
                                                @click="deleteSuccessStory(success_story.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="success_stories.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="success_stories.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link"
                                        href="#" @click="fetchSuccessStories(pagination.prev_page_url)">Previous</a>
                                </li>

                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a
                                        class="page-link" href="#"
                                        @click="fetchSuccessStories(pagination.next_page_url)">Next</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Edit Success Stories Modal  -->
        <div class="modal fade modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true" ref="AddEditSuccessStories">

            <div class="modal-dialog modal-lg">
                <div class="modal-content px-5 " style="height:auto;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="" v-if="edit == false">Create Success Story</h5>
                        <h5 class="modal-title" id="" v-if="edit == true">Edit Success Story</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            @click="closeAddSuccessStory">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="p-3">
                                <form @submit.prevent="submitForm" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Bride Name </label>
                                            <input type="text" v-model="successStory.bride_name" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('bride_name')">
                                                {{ errors.get('bride_name') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Groom Name </label>
                                            <input type="text" v-model="successStory.groom_name" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('groom_name')">
                                                {{ errors.get('groom_name') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Location Name </label>
                                            <input type="text" v-model="successStory.location" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('location')">
                                                {{ errors.get('location') }}
                                            </small>
                                        </div>
                                        <div class="col-md-6 form-group mb-1">
                                            <label class="mb-0">Date Of Marrige </label>
                                            <input type="date" v-model="successStory.marriage_date" class="form-control ">
                                            <small class="text-danger" v-if="errors.has('marriage_date')">
                                                {{ errors.get('marriage_date') }}
                                            </small>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-1">
                                                    <label class="mb-0">Comment </label>
                                                    <textarea v-model="successStory.comment" rows="3" class="form-control"></textarea>
                                                    <small class="text-danger" v-if="errors.has('comment')">
                                                        {{ errors.get('comment') }}
                                                    </small>
                                                </div>
                                            </div>
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
                                            <div v-else-if="successStory.image && typeof successStory.image === 'string'">
                                                <img :src="'/images/successStory/' + successStory.image" alt="Profile Image" height="50" />
                                            </div>
                                            <span v-else>No image</span>
                                        </div>
                                        <div class="form-group mb-1 col-md-6">
                                            <label class="mb-0">Show Frontend</label>
                                            <select v-model="successStory.status" class="form-select">
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
                                                    @click="addUpdateSuccessStory()">  <span v-if="edit == true">
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

        <!-- Show Message Modal  -->
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
                                                               <img v-if="successStory.image"
                                                                :src="'/images/successStory/' + successStory.image" alt="Profile Image"
                                                                class="rounded-circle" height="80"/>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Bride Name </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ successStory.bride_name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Groom Name </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ successStory.groom_name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Location </label>
                                                            <p class=" p-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ successStory.location }}
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
                                                    {{ successStory.comment }}
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
            successStory: {
                id: "",
                bride_name: "",
                groom_name: "",
                location: "",
                marriage_date: "",
                image: "",
                comment: "",
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
            success_stories: [],
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

        ShowAddSuccessStoryModal() {
            $(this.$refs.AddEditSuccessStories).modal("show");
        },

        closeAddSuccessStory() {
            $(this.$refs.AddEditSuccessStories).modal("hide");
        },

        createSuccessStory() {
            this.errors.record('');
            this.clearForm();
            this.ShowAddSuccessStoryModal();
        },

        fetchSuccessStories(page_url) {
            this.$showLoader();
            let vm = this;
            page_url = page_url || "/api/admin/success-story";
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
                this.success_stories = res.data.data;
                console.log(res.data.data)
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
        },

        addUpdateSuccessStory() {
            this.$showLoader();
            let url = "/api/admin/success-story";

            if (this.edit === false) {
                // Add
                this.request_method = "post";
            } else {
                // Update
                url = "/api/admin/success-story/" + this.successStory.id;
                this.request_method = "post"; // 👈 use POST with _method=PUT (works better for file upload)
            }

            let formData = new FormData();
            formData.append("bride_name", this.successStory.bride_name);
            formData.append("groom_name", this.successStory.groom_name);
            formData.append("location", this.successStory.location);
            formData.append("marriage_date", this.successStory.marriage_date);
            formData.append("comment", this.successStory.comment);
            formData.append("status", this.successStory.status);

            // ✅ only append image if it's a File (not a string URL)
            if (this.successStory.image instanceof File) {
                formData.append("image", this.successStory.image);
            }

            // 👈 if updating, Laravel expects PUT, so add _method
            if (this.edit === true) {
                formData.append("_method", "PUT");
            }

            axios.post(url, formData, this.token)
                .then((res) => {
                    if (res.data.status == "Success") {
                        $(this.$refs.AddEditSuccessStories).modal("hide");
                        this.$toast(res.data.message, 'success', 2000);
                        this.clearForm();
                        this.fetchSuccessStories();
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


        editSuccessStory(successStory) {
            this.edit = true;
            this.errors.record('');
            this.ShowAddSuccessStoryModal()

            this.successStory.id = successStory.id;
            this.successStory.bride_name = successStory.bride_name;
            this.successStory.groom_name = successStory.groom_name;
            this.successStory.location = successStory.location;
            this.successStory.marriage_date = successStory.marriage_date;
            this.successStory.image = successStory.image;
            this.successStory.comment = successStory.comment;
            this.successStory.status = successStory.status;
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

        deleteSuccessStory(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/success-story/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success', 3000);
                            this.fetchSuccessStories();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        showSuccessStory(successStory) {
            this.errors.record('');
            this.showModal();
            this.successStory.id = successStory.id;
            this.successStory.bride_name = successStory.bride_name;
            this.successStory.groom_name = successStory.groom_name;
            this.successStory.location = successStory.location;
            this.successStory.marriage_date = successStory.marriage_date;
            this.successStory.image = successStory.image;
            this.successStory.comment = successStory.comment;
            this.successStory.status = successStory.status;
        },

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchSuccessStories();
        },
        
        onFileChange(e) {
            const file = e.target.files[0];
            if (file) {
                this.successStory.image = file;
                this.preview = URL.createObjectURL(file); // optional for preview
            }
        },

        clearForm() {
            this.edit = false;
            
            this.successStory.id = null;
            this.successStory.bride_name = "";
            this.successStory.groom_name = "";
            this.successStory.location = "";
            this.successStory.marriage_date = "";
            this.successStory.image = "";
            this.successStory.comment = "";
            this.successStory.status = "";
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchSuccessStories();
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

        this.fetchSuccessStories();
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
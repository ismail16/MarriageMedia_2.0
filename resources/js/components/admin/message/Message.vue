<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Brides/Grooms Active</h1>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Brides/Grooms Active
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_length float-start" id="productpagesTable_length"><label>Show
                                    <select name="productpagesTable_length" class="" v-model="limit"
                                        v-on:change="fetchMessages()">
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
                                    <input type="text" class="form-control form-control-sm" placeholder="Search"
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th class="w-25">Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="message in messages" v-bind:key="message.id">
                                        <td>{{ message.id }}</td>
                                        <td>{{ message.name }}</td>
                                        <td>{{ message.email }}</td>
                                        <td>{{ message.subject }}</td>
                                        <td class="two-line-truncate">{{ message.message }}</td>
                                        <td>
                                            <button v-if="message.status == 0"
                                                class="btn btn-xs text-white bg-danger"><i
                                                    class="fa fa-times-circle"></i> Not Verify</button>
                                            <button v-else class="btn btn-xs text-white bg-success"><i
                                                    class="fa fa-check-circle"></i> Verified</button>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-xs btn-info mr-1 click-edit"
                                                data-toggle="tooltip" title="" data-placement="right"
                                                data-original-title="Check out more demos"
                                                @click="showMessage(message)">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-danger" href="#"
                                                @click="deleteMessage(message.id)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="messages.length <= 0" class="" role="alert">
                                <div class="col-md-12 text-center">
                                    <img src="/assets/img/icons/no_data.svg" alt="" class="mb-primary" width="100">
                                    <p class="mb-0">No data available</p>
                                    <p class="mb-0 text-secondary font-size-90">
                                        Please add new entity
                                    </p>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm m-0 float-right" v-if="messages.length >= 10">
                                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link"
                                        href="#" @click="fetchMessages(pagination.prev_page_url)">Previous</a></li>

                                <li class="disabled"><a class="page-link text-dark" href="#">Page {{
                                    pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a
                                        class="page-link" href="#"
                                        @click="fetchMessages(pagination.next_page_url)">Next</a>
                                </li>
                            </ul>

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
                                    <h3>Message</h3>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <ul class="timeline timeline-left">
                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge bg_primary">
                                            <img src="https://www.bdmarriagemedia.com/images/icons/flaticon/018-info-1.png"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel bg-body-green border-0">
                                            <div class="timeline-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Name </label>
                                                            <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                               {{ this.message.name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Email </label>
                                                            <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                               {{ this.message.email }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-1">
                                                            <label class="mb-0 form-label"> Subject  </label>
                                                            <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                               {{ this.message.subject }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge bg_primary">
                                            <img src="/images/icons/flaticon/080-message-1.png"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Message</h4>
                                            </div>
                                            <div class="timeline-body text-dark">
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ this.message.message }}
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
            message: {
                id: "",
                name: "",
                email: "",
                subject: "",
                message: "",
                status: "",
            },

            searchParameter: '',
            sortBy: 'id',
            sortType: 'DESC',
            limit: 10,
            error_message: '',
            pagination: {},
            messages: [],
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

        fetchMessages(page_url) {
            this.$showLoader();

            console.log("Searching for:", this.searchParameter);

            let vm = this;
            page_url = page_url || "/api/admin/message";
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
                this.messages = res.data.data;
                console.log(res.data.data)
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => this.$hideLoader());
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

        deleteMessage(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/message/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success', 3000);
                            this.fetchMessages();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

        showMessage(message) {
            this.errors.record('');
            this.showModal();
            this.message.name = message.name;
            this.message.email = message.email;
            this.message.subject = message.subject;
            this.message.message = message.message;
            this.message.status = message.status;
        },

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchMessages();
        },

        clearSearch() {
            this.searchParameter = "",
                this.fetchMessages();
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
        this.fetchMessages();
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
<template>
     <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <p class="breadcrumbs"><span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>
                    <router-link to="/admin/messages" class="">Messages
                    </router-link>
                    <span><i class="mdi mdi-chevron-right"></i></span>Read Messages
                </p>
            </div>
            <div>
                <router-link to="/admin/messages" class="btn btn-primary">View All
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row w-100">
                            <div class="col-md-4">
                                <label class="form-label"> Name  : </label>
                                <span class="fw-bold ml-2"> {{ message.first_name }} {{ message.last_name }} </span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label "> Email : </label>
                                <span class="fw-bold ml-2">{{ message.email }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"> phone : </label>
                                <span class="fw-bold ml-2">{{ message.phone }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label col-12 "> Message : </label>
                                <span class="fw-bold">{{ message.message }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-border-bottom">
                        <h2>Reply mail</h2>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row vendor-uploads">
                            <div class="col-lg-12">
                                <div class="vendor-upload-detail">
                                    <div class="row g-3">
                                       
                                        <div class="col-md-6  mb-2">
                                            <label class="form-label">
                                                Subject <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"  v-model="reply.subject" class="form-control" >
                                        </div>
                                        
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email"  v-model="reply.email" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-12  mb-2">
                                            <div class="form-group">
                                                <label class="text-dark"> Product Description <span class="text-danger">*</span></label>
                                                <!-- <textarea class="form-control"  v-model="reply.message" rows="3"></textarea> -->

                                                <ckeditor :editor="editor" v-model="reply.message" :config="editorConfig">
                                                </ckeditor>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12 mb-2">
                                            <div class="modal-footer justify-content-center">
                                                <button type="submit" class="btn btn-primary btn-pill mr-center"
                                                    @click="replyMessage()">
                                                    <i class="fa fa-envelope"></i> Sent
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    data() {
        return {
            message: {
                id: "",
                first_name: "",
                last_name: "",
                phone: "",
                email: "",
                message: "",
                status: "",
            },

            editor: ClassicEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            },

            reply: {
                id: "",
                first_name: "Todays Look Australia",
                email: "",
                subject: "Reply Message From Todays Look Australia",
                message: "",
            },

            error_message: '',
            request_method: "",
            message: [],
            token: [],
        };
    },

    methods: {

        replyMessage() {

            console.log(this.reply)

            if(this.reply.email != '' && this.reply.subject != '' && this.reply.message != ''){
                this.$showLoader();
                axios.post("/api/admin/replyMessage", this.reply, this.token)
                    .then((response) => {
                        console.log(response.data);
                        this.clearForm();
                        this.$toast("Reply Message Successfully", 'success', 3000);
                    })
                    .catch((error) => {
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
               
            }else{
                this.$toast("Please fill up required fields", 'error', 3000);
                return 0;
            }

           
        },

        fetchMessage() {
            var page_url = "/api/admin/contact_us/" + this.$route.params.id;
            axios.get(page_url, this.token).then(res => {
                this.message = res.data.data;

                this.reply.email = res.data.data.email;

            }).finally(() => this.$hideLoader());
        },

        deleteMessage(id) {
            if (confirm('Are You Sure?')) {
                this.$showLoader();
                axios.delete(`/api/admin/contact_us/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toast('Deleted Successfully', 'success');
                            this.fetchMessage();
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.$hideLoader());
            }
        },

    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchMessage();
    }
};
</script>

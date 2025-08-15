<template>
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Personal Information</h1>
                <p class="breadcrumbs">
                    <span><a href="/admin/dashboard">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i><a href="/admin/activebridegroom">Brides/Grooms Active</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Show
                </p>
            </div>
        </div>

        <div class="">

            <div class="card mt-2 bg-light-green">
                <div class="card-header pb-0 pt-2">
                    <div id="verifiedItems" class="float-end">
                        <a href="/admin/marriage-info/176">
                            <i class="fas fa-edit text-success"></i>Info
                        </a>
                        <span>Verified:</span>
                        <i class="fas fa-user-check text-success"></i>
                    </div>
                    <div>
                        <h3>Basic Information</h3>
                    </div>
                </div>
                <div class="card-body p-2">
                    <ul class="timeline timeline-left">
                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/018-info-1.png"
                                    class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Name </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.first_name + ' ' + user.last_name}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Email address </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.email }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Mobile </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.mobile }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Gender </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.gender }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Profession </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.profession }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Meretial status</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.marital_status }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Birthday</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.birthday }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Looking For</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.looking_for }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Country</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.country.name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Division</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.division.name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> City / District</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.district.name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Thana/Upazila</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.upazila.name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Religion</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.religion }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Caste</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.social_order }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Profile Create By</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.createdby }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="card mt-2 mb-2 bg-light-green">
                <div class="card-header pb-0 pt-2">
                    <a href="#" class="btn btn-sm m-2 btn-primary float-end">Show Images</a>
                    <div>
                        <h3>Images</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 border" v-for="userImage in user.images" :key="userImage.id">
                            <div class="row">
                                <div class="col-6">
                                    <img :src="'/images/user_profile_image/' + userImage.image" class="img-fluid" style="height: 100px;" alt="user image">
                                </div>
                                <div class="col-6 row d-flex align-items-center">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-xs bg-green-active"><i
                                                class="fa fa-check-circle"></i> Show Public</button>
                                    </div>
                                    <div class="p-1 col-12 text-center">
                                        <a href="#" class="btn btn-xs btn-success" target="_blank">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-xs btn-success ml-1">
                                            <i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-2 bg-light-green">
                <div class="card-header pb-0 pt-2">
                    <div class="float-end">
                        <a href="#"
                            class="btn btn-sm m-2 btn-primary">Edit Personal-info</a>
                    </div>
                    <div>
                        <h3>Profile Details</h3>
                    </div>
                </div>
                <div class="card-body p-2">
                    <ul class="timeline timeline-left">
                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/065-love-1.png" class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">ABOUT HE</h4>
                                </div>
                                <div class="timeline-body text-dark">
                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold" v-if="user.user_info">
                                       {{ user.user_info.about_me_family }}
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/018-info-1.png" class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Basic Information</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Age </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    <p>{{ calculateAge(user.birthday) }} years old</p>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Marital Status</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.marital_status }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Height </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.user_info.height }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Weight </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.user_info.weight }} Kg
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Religion </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.religion }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Blood Group </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.user_info.blood_group }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/016-graduated.png" class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Education and Profession</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Education Level
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.education_level }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Major Subject </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.major_subject }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">My Profession </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.user_info.my_profession }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Job Title </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.job_title }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Company Name </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.job_company_name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">My Income </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.income }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/009-address.png" class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Present Address</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Residence(Country)
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                     {{ user.user_info.country_of_residence }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Residence(City)
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                     {{ user.user_info.state_of_residence }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Citizenship </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.citizenship }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Zip Code </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.zip_code }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/009-address.png"
                                    class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Permanent Address</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Country </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.country.name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">District </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.district }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Thana/Upazila
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.thana }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/022-family-2.png"
                                    class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Family Information</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Father's Name</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.father_name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Father's Occupation</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.father_occupation }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Mother's Name</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.mother_name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Mother's Occupation</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.mother_occupation }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Number of Brother</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.number_of_brother }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">brother Married?</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.how_many_brother_married }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Number of Sister</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.number_of_sister }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Sister Married? </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.user_info.how_many_sister_married }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mt-2 bg-light-green">
                <div class="card-header pb-0 pt-2">
                    <div class="float-end">
                        <a href="#" class="btn btn-sm m-2 btn-primary">Edit Sreference</a>
                    </div>
                    <div>
                        <h3>Preferences</h3>
                    </div>
                </div>
                <div class="card-body p-2">
                    <ul class="timeline timeline-left">
                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary">
                                <img src="/images/icons/flaticon/065-love-1.png" class="w-75">
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Preferences</h4>
                                </div>
                                <div class="timeline-body">
                                    <div class="row bg-off-pink">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Details you preferance</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.details_you_prefer }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Age </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.minAge + ' to ' + user.preference.maxAge }} years
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Height </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.minHeight + ' to ' + user.preference.maxHeight }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Weight </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.minWeight + ' to ' + user.preference.maxWeight }} Kg
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="mb-0 form-label">Religion </label>
                                            <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                {{ user.preference.religion }}
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Family status </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.family_status }}
                                                </p>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="mb-0 form-label">Meretial status </label>
                                            <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                               {{ user.preference.marital_status }}
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Allow Children?</label>
                                                <p  class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.allow_children }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Skin Color </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.skin_color }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Blood Group </label>
                                                <p  class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.blood_group }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="other-area">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Hair Color</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ user.preference.hair_color }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="other-area">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Eye Color</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ user.preference.eye_color }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="other-area">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Allow Disabilities? </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ user.preference.disabilities_status }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="other-area">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Education Level</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                       {{ user.preference.education_level }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Major Subject
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.subject }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">My Profession
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.profession }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-off-pink">
                                        <div class="col-md-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Country of Residence
                                                </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.country }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">District </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.district }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Citizenship </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.citizenship }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-off-pink">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label"> Allow Smoke?</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.smoke_status }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Allow Alcohol?</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.alcohol_status }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Diat Status</label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ user.preference.diat_status }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-1">
                                                <label class="mb-0 form-label">Language </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                   {{ user.preference.language }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="card-footer border-top">
                <div>
                    <form @submit.prevent="confirmUpdate">
                        <label>
                            <input type="checkbox" v-model="form.user_status" /> Verified User
                        </label>
                        <br />

                        <label>
                            <input type="checkbox" v-model="form.activation" /> Activation User
                            <span class="text-danger">(Be Sure All information is correct)</span>
                        </label>
                        <br />

                        <button class="btn btn-md btn-success" type="submit">
                            Confirm
                        </button>
                    </form>

                    <!-- Success message -->
                    <p v-if="successMessage" class="text-success">{{ successMessage }}</p>
                </div>
                <!-- <form action="#" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Confirming User')">
                    <input type="checkbox" name="user_status" value="1" checked> Verified User <br>
                    <input type="checkbox" name="activation" value="1" checked> Activation User <span class="text-danger">(Be Sure All information is correct)</span> <br>
                    <button class="btn btn-md btn-success" type="submit"> Confirm </button>
                </form> -->
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
            user: {
                id: "",
                uid: "",
                package_price_id: "",
                role_id: "",
                first_name: "",
                last_name: "",
                mobile: "",
                email: "",
                gender: "",
                marital_status: "",
                profession: "",
                country: "",
                division: "",
                district: "",
                upazila: "",
                birthday: "",
                guardian_mobile: "",
                createdby: "",
                religion: "",
                social_order: "",
                looking_for: "",
                address: "",
                activation: "",
                status: "",
                created_by: "",
                updated_by: "",
                user_info:{
                    id: "",
                    user_id: "",
                    about_me_family: "",
                    education_level: "",
                    major_subject: "",
                    my_profession: "",
                    job_title: "",
                    job_company_name: "",
                    income: "",
                    district: "",
                    thana: "",
                    zip_code: "",
                    country_of_residence: "",
                    state_of_residence: "",
                    citizenship: "",
                    father_name: "",
                    father_occupation: "",
                    mother_name: "",
                    mother_occupation: "",
                    number_of_brother: "",
                    how_many_brother_married: "",
                    number_of_sister: "",
                    how_many_sister_married: "",
                    height: "",
                    weight: "",
                    blood_group: "",
                    hair_color: "",
                    eye_color: "",
                    skin_color: "",
                    smoke_status: "",
                    disabilities_status: "",
                    do_u_have_children: "",
                    hear_about_us: "",
                    diat_status: "",
                    mother_tongue: "",
                    can_speak: "",
                    status: "",
                },

                images:[],
                preference:{
                    id: "",
                    user_id: "",
                    minAge: "",
                    maxAge: "",
                    religion: "",
                    family_status: "",
                    marital_status: "",
                    allow_children: "",
                    minHeight: "",
                    maxHeight: "",
                    minWeight: "",
                    maxWeight: "",
                    blood_group: "",
                    hair_color: "",
                    eye_color: "",
                    skin_color: "",
                    disabilities_status: "",
                    education_level: "",
                    subject: "",
                    profession: "",
                    country: "",
                    district: "",
                    citizenship: "",
                    smoke_status: "",
                    alcohol_status: "",
                    diat_status: "",
                    language: "",
                    details_you_prefer: "",
                    status: "",
                },


            },
            error_message: '',
            token: [],
            displayModal: false,
            errors: new ErrorHandling(),
            form: {
                user_status: 0,
                activation: 0,
            },
        };
    },

    methods: {

        confirmUpdate() {
            if (!confirm("Are you Sure? Confirming User")) return;

            axios.put('/api/admin/groom-bride/'+this.$route.params.id, {
                
                    user_status: this.form.user_status ? 1 : 0,
                    activation: this.form.activation ? 1 : 0,
                }, this.token)
                .then((res) => {
                    console.log(res)

                    if (res.data.status == "Success") {
                        this.$toast('Data Update Successfully', 'success', 3000);

                        this.$router.push('/admin/activebridegroom'); 
                    }

                    // this.successMessage = res.data.message || "User status updated!";
                })
                .catch((err) => {
                    console.error(err);
                    // alert("Error updating status");
                });
        },
  


        showModal() {
            $(this.$refs.showModal).modal("show");
        },

        createUser() {
            this.errors.record('');
            this.clearForm();
            this.showModal();
        },

        editUser(id) {
            axios.get(`/api/admin/groom-bride/${id}`, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        console.log(res.data.data)
                        var thisUser = res.data.data;
                        // Top-level fields
                        this.user.id = thisUser.id;
                        this.user.uid = thisUser.uid;
                        this.user.package_price_id = thisUser.package_price_id;
                        this.user.role_id = thisUser.role_id;
                        this.user.first_name = thisUser.first_name;
                        this.user.last_name = thisUser.last_name;
                        this.user.mobile = thisUser.mobile;
                        this.user.email = thisUser.email;
                        this.user.gender = thisUser.gender;
                        this.user.marital_status = thisUser.marital_status;
                        this.user.profession = thisUser.profession;
                        this.user.country = thisUser.country;
                        this.user.division = thisUser.division;
                        this.user.district = thisUser.district;
                        this.user.upazila = thisUser.upazila;
                        this.user.birthday = thisUser.birthday;
                        this.user.guardian_mobile = thisUser.guardian_mobile;
                        this.user.createdby = thisUser.createdby;
                        this.user.religion = thisUser.religion;
                        this.user.social_order = thisUser.social_order;
                        this.user.looking_for = thisUser.looking_for;
                        this.user.address = thisUser.address;

                        this.form.user_status = Number(thisUser.status) === 1;
                        this.form.activation = Number(thisUser.activation) === 1;

                        this.user.activation = thisUser.activation;
                        this.user.status = thisUser.status;
                        this.user.created_by = thisUser.created_by;
                        this.user.updated_by = thisUser.updated_by;
                        // Nested user_info
                        if (thisUser.user_info) {
                            this.user.user_info.id = thisUser.user_info.id;
                            this.user.user_info.user_id = thisUser.user_info.user_id;
                            this.user.user_info.about_me_family = thisUser.user_info.about_me_family;
                            this.user.user_info.education_level = thisUser.user_info.education_level;
                            this.user.user_info.major_subject = thisUser.user_info.major_subject;
                            this.user.user_info.my_profession = thisUser.user_info.my_profession;
                            this.user.user_info.job_title = thisUser.user_info.job_title;
                            this.user.user_info.job_company_name = thisUser.user_info.job_company_name;
                            this.user.user_info.income = thisUser.user_info.income;
                            this.user.user_info.district = thisUser.user_info.district;
                            this.user.user_info.thana = thisUser.user_info.thana;
                            this.user.user_info.zip_code = thisUser.user_info.zip_code;
                            this.user.user_info.country_of_residence = thisUser.user_info.country_of_residence;
                            this.user.user_info.state_of_residence = thisUser.user_info.state_of_residence;
                            this.user.user_info.citizenship = thisUser.user_info.citizenship;
                            this.user.user_info.father_name = thisUser.user_info.father_name;
                            this.user.user_info.father_occupation = thisUser.user_info.father_occupation;
                            this.user.user_info.mother_name = thisUser.user_info.mother_name;
                            this.user.user_info.mother_occupation = thisUser.user_info.mother_occupation;
                            this.user.user_info.number_of_brother = thisUser.user_info.number_of_brother;
                            this.user.user_info.how_many_brother_married = thisUser.user_info.how_many_brother_married;
                            this.user.user_info.number_of_sister = thisUser.user_info.number_of_sister;
                            this.user.user_info.how_many_sister_married = thisUser.user_info.how_many_sister_married;
                            this.user.user_info.height = thisUser.user_info.height;
                            this.user.user_info.weight = thisUser.user_info.weight;
                            this.user.user_info.blood_group = thisUser.user_info.blood_group;
                            this.user.user_info.hair_color = thisUser.user_info.hair_color;
                            this.user.user_info.eye_color = thisUser.user_info.eye_color;
                            this.user.user_info.skin_color = thisUser.user_info.skin_color;
                            this.user.user_info.smoke_status = thisUser.user_info.smoke_status;
                            this.user.user_info.disabilities_status = thisUser.user_info.disabilities_status;
                            this.user.user_info.do_u_have_children = thisUser.user_info.do_u_have_children;
                            this.user.user_info.hear_about_us = thisUser.user_info.hear_about_us;
                            this.user.user_info.diat_status = thisUser.user_info.diat_status;
                            this.user.user_info.mother_tongue = thisUser.user_info.mother_tongue;
                            this.user.user_info.can_speak = thisUser.user_info.can_speak;
                            this.user.user_info.status = thisUser.user_info.status;
                        }
                        // Nested preference
                        if (thisUser.preference) {
                            this.user.preference.id = thisUser.preference.id;
                            this.user.preference.user_id = thisUser.preference.user_id;
                            this.user.preference.minAge = thisUser.preference.minAge;
                            this.user.preference.maxAge = thisUser.preference.maxAge;
                            this.user.preference.religion = thisUser.preference.religion;
                            this.user.preference.family_status = thisUser.preference.family_status;
                            this.user.preference.marital_status = thisUser.preference.marital_status;
                            this.user.preference.allow_children = thisUser.preference.allow_children;
                            this.user.preference.minHeight = thisUser.preference.minHeight;
                            this.user.preference.maxHeight = thisUser.preference.maxHeight;
                            this.user.preference.minWeight = thisUser.preference.minWeight;
                            this.user.preference.maxWeight = thisUser.preference.maxWeight;
                            this.user.preference.blood_group = thisUser.preference.blood_group;
                            this.user.preference.hair_color = thisUser.preference.hair_color;
                            this.user.preference.eye_color = thisUser.preference.eye_color;
                            this.user.preference.skin_color = thisUser.preference.skin_color;
                            this.user.preference.disabilities_status = thisUser.preference.disabilities_status;
                            this.user.preference.education_level = thisUser.preference.education_level;
                            this.user.preference.subject = thisUser.preference.subject;
                            this.user.preference.profession = thisUser.preference.profession;
                            this.user.preference.country = thisUser.preference.country;
                            this.user.preference.district = thisUser.preference.district;
                            this.user.preference.citizenship = thisUser.preference.citizenship;
                            this.user.preference.smoke_status = thisUser.preference.smoke_status;
                            this.user.preference.alcohol_status = thisUser.preference.alcohol_status;
                            this.user.preference.diat_status = thisUser.preference.diat_status;
                            this.user.preference.language = thisUser.preference.language;
                            this.user.preference.details_you_prefer = thisUser.preference.details_you_prefer;
                            this.user.preference.status = thisUser.preference.status;
                        }
                        // Assign images array (if present)
                        if (Array.isArray(thisUser.profile_images)) {
                            this.user.images = thisUser.profile_images;
                        }
                    }

                })
                .catch(err => console.log(err));
        },

        calculateAge(birthday) {
            if (!birthday) return null;
            const birthDate = new Date(birthday);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }
    },

    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        if (this.$route.params.id) {
            this.editUser(this.$route.params.id)
        }
    }
};
</script>

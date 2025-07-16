@extends('author.layouts.master')
@section('title','Personal Information')
@section('content')
<section class="">
    <div class="container-fluid session_contect">
        <div class="row">
            @if(session()->has('message'))
            <div class="col-lg-12 col-xl-12 d-flex justify-content-center session_message">
                <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                    {{session('message')}}
                    <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>

            <div class="col-md-9">
                @include('author.partials.progress_message')
                @if($PersonalInfo)

                <div class="card card mt-2 mb-2 bg-light-green">
                    <div class="card-header pb-0 pt-2">
                        <div id="verifiedItems" class="float-right">
                            <a class="float-right btn btn-sm btn-primary" href="{{route('member.personal-info.edit', $PersonalInfo->id)}}">
                                <i class="nav-icon fas fa-edit"></i> Edit
                            </a>
                        </div>
                        <div>
                            <h3>Profile Details</h3>
                        </div>
                    </div>
                    <div class="card-body pt-2 bg-light-green">
                        <h5 class="border-bottom pt-2">ABOUT HE</h5>
                        <div class="row bg-body-green">
                            <div class="col-md-12">
                                <div class="form-group mb-1">
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {!! $user->user_info->about_me_family !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h5 class="border-bottom pt-2">Education and Profession</h5>
                        <div class="row bg-body-green">

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Education Level</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{str_replace('_', ' ', $user->user_info->education_level) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card-body pt-1">
                        <div class="">
                            <div class="_container">

                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Major Subject</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{str_replace('_', ' ', $user->user_info->major_subject) }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>My Profession</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{str_replace('_', ' ', $user->user_info->my_profession) }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Job Title : </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->job_title }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Company Name </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->job_company_name }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>My Income</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ str_replace('_', ' ', $user->user_info->income) }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">
                                    <h5 class="w-100 mb-0">Present Address</h5>
                                    <!-- <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>District</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $user->user_info->district }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Thana</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->thana }} </b>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Residence(Country)</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">s{{ $user->user_info->country_of_residence }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Residence(City)</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->state_of_residence }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Citizenship </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->citizenship }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Zip Code</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->zip_code }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">
                                    <h5 class="w-100 mb-0">Family Information</h5>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Father's Name </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->father_name }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Father's Occupation </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ str_replace('_', ' ', $user->user_info->father_occupation) }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Mother's Name </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->mother_name }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right pr-0">
                                                <span>Mother's Occupation </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->mother_occupation }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Number of Brother </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->number_of_brother }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>brother Married? </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->how_many_brother_married }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Number of Sister </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->number_of_sister }} </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Sister Married? </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark"> {{ $user->user_info->how_many_sister_married }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">
                                    <h5 class="w-100 mb-0">Physical Information</h5>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>My Height</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->height }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Weight(kg)</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->weight }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span>Blood Group</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->blood_group }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="hair_color">My Hair Color</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->hair_color }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="eye_color">My Eye Color </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->eye_color }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="skin_color">My Skin Color </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->skin_color }}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">
                                    <h5 class="w-100 mb-0">Others</h5>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="smoke_status">Do I smoke?</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->smoke_status }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="alcohol_status">Addicted to alcohol?</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->alcohol_status }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="disabilities_status">Any disabilities?</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->disabilities_status }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="do_u_have_children">Have children?</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->do_u_have_children }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="hear_about_us">Know about us from </span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{ $PersonalInfo->hear_about_us }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6  border border-white">
                                        <div class="row">
                                            <div class="col-md-5 border-right">
                                                <span for="diat_status">Diat Status</span>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="text-dark">{{str_replace('_', ' ', $PersonalInfo->diat_status)}}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row p-2 mt-2" style="background-color: #91d2ab3b;">
                                    <h5 class="w-100 mb-0">Languages</h5>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <span for="mother_tongue">Mother Tongue</span>
                                            </div>
                                            <div class="col-md-5">
                                                <b class="text-dark">{{ $PersonalInfo->mother_tongue }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <span for="hear_about_us">Others Language i know : </span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Bangla', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Bangla"> Bangla

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('English', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="English" checked=""> English

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Hindi', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Hindi"> Hindi

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Arabic', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Arabic"> Arabic

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Chinese', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Chinese"> Chinese

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Spanish', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Spanish"> Spanish

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('German', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="German"> German

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Italian', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Italian"> Italian

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Russian', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Russian"> Russian

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('French', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="French"> French

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Urdu', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Urdu"> Urdu

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Dutch', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Dutch"> Dutch

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Persian', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Persian"> Persian

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Malay_based', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Malay_based"> Malay based

                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <span class="form-check-label">
                                                        <input type="checkbox" onclick="return false;" <?php if (in_array('Tamil', json_decode($PersonalInfo->can_speak))) {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Tamil"> Tamil

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                @else
                <a class="btn btn-sm mt-2 btn-primary" href="{{route('member.personal-info.create')}}">
                    <i class="nav-icon fas fa-plus"></i> Create
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
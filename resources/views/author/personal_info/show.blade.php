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

            <div class="col-md-9 pl-0">
                @include('author.partials.progress_message')
                @if($PersonalInfo)
                <div class="card mt-2 mb-2 bg-light-green">
                    <div class="card-header pb-0 pt-2">
                        <div id="verifiedItems" class="float-right">
                            <a class="float-right btn btn-sm btn-primary" href="{{route('member.personal-info.edit', $PersonalInfo->id)}}">
                                <i class="nav-icon fas fa-edit"></i> Edit
                            </a>
                        </div>
                        <div>
                            <h4>Profile Details</h4>
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

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Major Subject</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{str_replace('_', ' ', $user->user_info->major_subject) }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Profession</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{str_replace('_', ' ', $user->user_info->my_profession) }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Job Title</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->job_title }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Company Name</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->job_company_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Income</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ str_replace('_', ' ', $user->user_info->income) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h5 class="border-bottom pt-2">Present Address</h5>
                        <div class="row bg-body-green">
                            <!--  <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">District</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->district }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Thana</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->thana }}
                                    </p>
                                </div>
                            </div> -->



                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Residence(Country)</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->country_of_residence }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Residence(City)</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->state_of_residence }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Citizenship</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->citizenship }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Zip Code</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->zip_code }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <h5 class="border-bottom pt-2">Family Information</h5>
                        <div class="row bg-body-green">
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Father's Name</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->father_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Father's Occupation</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ str_replace('_', ' ', $user->user_info->father_occupation) }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Mother's Name</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->mother_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Mother's Occupation</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->mother_occupation }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Profession</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">

                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Number of Brother</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->number_of_brother }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Brother Married?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->how_many_brother_married }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Number of Sister</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->number_of_sister }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Sister Married?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $user->user_info->how_many_sister_married }}
                                    </p>
                                </div>
                            </div>

                        </div>


                        <h5 class="border-bottom pt-2">Physical Information</h5>
                        <div class="row bg-body-green">
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Height</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->height }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Weight(kg)</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->weight }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Blood Group</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->blood_group }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Hair Color</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->hair_color }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Eye Color</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->eye_color }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">My Skin Color</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->skin_color }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h5 class="border-bottom pt-2">Others</h5>
                        <div class="row bg-body-green">
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Do I smoke?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->smoke_status }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Addicted to alcohol?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->alcohol_status }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Any disabilities?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->disabilities_status }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Have children?</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->do_u_have_children }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Know about us from </label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $PersonalInfo->hear_about_us }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Diat Status</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{str_replace('_', ' ', $PersonalInfo->diat_status)}}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Mother Tongue</label>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{$PersonalInfo->mother_tongue}}
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Others Language i know</label>
                                    <?php
                                    $can_speaks = json_decode($PersonalInfo->can_speak);
                                    ?>
                                    <p class="border pl-2 m-0 bg-light text-dark font-weight-bold">
                                        @foreach($can_speaks as $can_speak)
                                        {{str_replace('_', ' ', $can_speak) }},
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-9 d-flex justify-content-center d-flex align-items-center">
                    <a class="btn btn-lg mt-2 btn-primary" href="{{route('member.personal-info.create')}}">
                        <i class="nav-icon fas fa-plus"></i> Set Personal Information
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
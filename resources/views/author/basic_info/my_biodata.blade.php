@extends('author.layouts.master')
@section('title', 'Personal Information')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('author.partials.sidebar')
                </div>
                <div class="col-md-9">
                    <!-- <a href="{{ route('member.downloadBiodata', $user->id) }}">download</a> -->
                    <button class="download_biodata btn btn-sm btn-primary mt-2">Download Bio-data</button>
                    <div class="card mt-2 bg-light-green" id="content">
                        <div class="card-header pb-0 pt-2">
                            <div id="verifiedItems" class="float-right">
                                <span>Verified:</span>
                                <i class="fas fa-user-check text-success"></i>
                            </div>
                            <div>
                                <h3>Bio-Data</h3>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <ul class="timeline timeline-left pt-0">
                                <li class="timeline-inverted timeline-item mb-1">
                                    <div class="timeline-badge bg_primary">
                                        <img src="{{ asset('images/icons/flaticon/018-info-1.png') }}" class="w-75">
                                    </div>
                                    <div class="timeline-panel pt-0 bg-body-green border-0">
                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    @if ($UserProfileImage != null)
                                                        <img src="{{ asset('images/user_profile_image/' . $UserProfileImage->image) }}"
                                                            class="img-fluid" style="height: 200px;">
                                                    @else
                                                        @if ($user->gender == 'Female')
                                                            <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}"
                                                                style="height: 200px;">
                                                        @else
                                                            <img src="{{ asset('images/icons/flaticon/businessman.png') }}"
                                                                style="height: 200px;">
                                                        @endif
                                                    @endif
                                                    <h5 class="border-bottom">Contact</h5>
                                                    <div class="form-group mb-0 ">
                                                        <p class="text-dark font-weight-bold">
                                                            <i class="fa fa-envelope"></i> {{ $user->email }}
                                                        </p>
                                                        <p class="text-dark font-weight-bold">
                                                            <i class="fa fa-phone-square"></i> {{ $user->mobile }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Name </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->first_name }} {{ $user->last_name }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Gender </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->gender }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Profession </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ str_replace('_', ' ', $user->profession) }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Meretial </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ str_replace('_', ' ', $user->marital_status) }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Birthday </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->birthday }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Upazila/Thana </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->upazila->name ?? '' }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> City/District </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->district->name }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Country </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->country->name }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Looking For </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->looking_for }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Religion </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ $user->religion }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="mb-0 form-label col-sm-4"> Caste </label>
                                                        <p class="col-sm-8 text-dark font-weight-bold">
                                                            : {{ str_replace('_', ' ', $user->social_order) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($user->user_info)
                                                <div class="row border m-1 p-2">
                                                    <div class="col-sm-3">
                                                        <div class="form-group  mb-0">
                                                            <label class="mb-0 form-label">
                                                                Complexion :
                                                                <span
                                                                    class="bg-light text-dark font-weight-bold p-1">{{ $user->user_info->skin_color }}</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">
                                                                Height :
                                                                <span
                                                                    class="bg-light text-dark font-weight-bold p-1">{{ $user->user_info->height }}''</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">
                                                                Weight :
                                                                <span
                                                                    class="bg-light text-dark font-weight-bold p-1">{{ $user->user_info->weight }}Kg</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">
                                                                Blood Group :
                                                                <span
                                                                    class="bg-light text-dark font-weight-bold p-1">{{ $user->user_info->blood_group }}''</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @if ($user->user_info)
                                    <li class="timeline-inverted timeline-item mb-1">
                                        <div class="timeline-badge bg_primary">
                                            <img src="{{ asset('images/icons/flaticon/065-love-1.png') }}" class="w-75">
                                        </div>
                                        <div class="timeline-panel pt-0 bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title mb-0">ABOUT HE</h4>
                                            </div>
                                            <div class="timeline-body text-dark">
                                                <p class="pl-1 m-0 bg-light text-dark font-weight-bold">
                                                    {!! $user->user_info->about_me_family !!}
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item mb-1">
                                        <div class="timeline-badge bg_primary">
                                            <img src="{{ asset('images/icons/flaticon/016-graduated.png') }}"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel pt-0 bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title mb-0">Education and Profession</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Education Level </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $user->user_info->education_level) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Major Subject </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $user->user_info->major_subject) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">My Profession </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $user->user_info->my_profession) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Job Title </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->job_title }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Company Name </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->job_company_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">My Income </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $user->user_info->income) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item mb-1">
                                        <div class="timeline-badge bg_primary">
                                            <img src="{{ asset('images/icons/flaticon/009-address.png') }}"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel pt-0 bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title mb-0">Address</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Residence(Country) </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->country_of_residence }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Residence(City) </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->state_of_residence }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Citizenship </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->citizenship }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Zip Code </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->zip_code }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item mb-1">
                                        <div class="timeline-badge bg_primary">
                                            <img src="{{ asset('images/icons/flaticon/022-family-2.png') }}"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel pt-0 bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title mb-0">Family Information</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Father's Name </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->father_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Father's Occupation </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $user->user_info->father_occupation) }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Mother's Name </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->mother_name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Mother's Occupation </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->mother_occupation }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Number of Brother </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->number_of_brother }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">brother Married? </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->how_many_brother_married }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Number of Sister </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->number_of_sister }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Sister Married? </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $user->user_info->how_many_sister_married }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                @if ($Preference)
                                    <li class="timeline-inverted timeline-item mb-1">
                                        <div class="timeline-badge bg_primary">
                                            <img src="{{ asset('images/icons/flaticon/065-love-1.png') }}"
                                                class="w-75">
                                        </div>
                                        <div class="timeline-panel pt-0 bg-body-green border-0">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title mb-0">Preferences</h4>
                                            </div>

                                            <div class="timeline-body">
                                                <div class="row bg-off-pink">
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Details you preferance</label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->details_you_prefer }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label"> Age </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->minAge }} - {{ $Preference->maxAge }}
                                                                years
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label"> Height </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->minHeight }}" -
                                                                {{ $Preference->maxHeight }}"
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label"> Weight </label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->minWeight }} -
                                                                {{ $Preference->maxWeight }} Kg
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="mb-0 form-label">Religion </label>
                                                        <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                            {{ $Preference->religion }}
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Family status </label>
                                                            <?php
                                                            $family_statuss = json_decode($Preference->family_status);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($family_statuss as $family_status)
                                                                    {{ str_replace('_', ' ', $family_status) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <label class="mb-0 form-label">Meretial status </label> <br>
                                                        <?php
                                                        $marital_statuss = json_decode($Preference->marital_status);
                                                        ?>
                                                        <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                            @foreach ($marital_statuss as $marital_status)
                                                                {{ str_replace('_', ' ', $marital_status) }},
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">
                                                                Allow Children?</label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->allow_children }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Blood Group </label>
                                                            <?php
                                                            $blood_groups = json_decode($Preference->blood_group);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($blood_groups as $blood_group)
                                                                    {{ str_replace('_', ' ', $blood_group) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Skin Color </label>
                                                            <?php
                                                            $skin_colors = json_decode($Preference->skin_color);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($skin_colors as $skin_color)
                                                                    {{ str_replace('_', ' ', $skin_color) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <div class="other-area">
                                                            <div class="form-group mb-0">
                                                                <label class="mb-0 form-label">Hair Color </label>
                                                                <p
                                                                    class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                    {{ $Preference->hair_color }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="other-area">
                                                            <div class="form-group mb-0">
                                                                <label class="mb-0 form-label">Eye Color </label>
                                                                <p
                                                                    class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                    {{ $Preference->eye_color }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="other-area">
                                                            <div class="form-group mb-0">
                                                                <label class="mb-0 form-label">Allow Disabilities? </label>
                                                                <p
                                                                    class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                    {{ $Preference->disabilities_status }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="other-area">
                                                            <div class="form-group mb-0">
                                                                <label class="mb-0 form-label">Education Level </label>
                                                                <?php
                                                                $education_levels = json_decode($Preference->education_level);
                                                                ?>
                                                                <p
                                                                    class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                    @foreach ($education_levels as $education_level)
                                                                        {{ str_replace('_', ' ', $education_level) }},
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Major Subject </label>
                                                            <?php
                                                            $subjects = json_decode($Preference->subject);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($subjects as $subject)
                                                                    {{ str_replace('_', ' ', $subject) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">My Profession </label>
                                                            <?php
                                                            $professions = json_decode($Preference->profession);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($professions as $profession)
                                                                    {{ str_replace('_', ' ', $profession) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row bg-off-pink">
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Country of Residence </label>
                                                            <?php
                                                            $countrys = json_decode($Preference->country);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($countrys as $country)
                                                                    {{ str_replace('_', ' ', $country) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">District </label>
                                                            <?php
                                                            $districts = json_decode($Preference->district);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($districts as $district)
                                                                    {{ str_replace('_', ' ', $district) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Citizenship </label>
                                                            <?php
                                                            $citizenships = json_decode($Preference->citizenship);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($citizenships as $citizenship)
                                                                    {{ str_replace('_', ' ', $citizenship) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row bg-off-pink">
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">
                                                                Allow Smoke?</label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->smoke_status }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Allow Alcohol?</label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ $Preference->alcohol_status }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Diat Status</label>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                {{ str_replace('_', ' ', $Preference->diat_status) }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group mb-0">
                                                            <label class="mb-0 form-label">Language </label>
                                                            <?php
                                                            $languages = json_decode($Preference->language);
                                                            ?>
                                                            <p class="border pl-1 m-0 bg-light text-dark font-weight-bold">
                                                                @foreach ($languages as $language)
                                                                    {{ str_replace('_', ' ', $language) }},
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!--import the script-->
    <!-- <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script> -->
    <!-- <script src="{{ asset('htmltopdf/html2canvas.min.js') }}"></script> -->
    <!-- <script src="{{ asset('htmltopdf/jspdf.debug.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script>
        $(document).ready(function() {
            $(".download_biodata").click(function() {
                // var convertionType = $("#convertion-type").val();
                // if(convertionType == "split") {
                // 	splitHTMLtoMultiPagePDF();
                // } else {
                // 	addHTMLToPDFPage();
                // }
                splitHTMLtoMultiPagePDF();

            });
        });

        function addHTMLToPDFPage() {
            var doc = new jsPDF('p', 'pt', [$("body").width(), $("body").height()]);
            // converHTMLToCanvas($("#html-template")[0], doc, false, false);
            // converHTMLToCanvas($("#html-template1")[0], doc, true, false);
            converHTMLToCanvas($("#content")[0], doc, false, true);
        }

        function converHTMLToCanvas(element, jspdf, enableAddPage, enableSave) {
            html2canvas(element, {
                allowTaint: true
            }).then(function(canvas) {
                if (enableAddPage == true) {
                    jspdf.addPage($("body").width(), $("body").height());
                }

                image = canvas.toDataURL('image/png', 1.0);
                jspdf.addImage(image, 'PNG', 5, 5, $(element).width(), $(element).height()); // A4 sizes

                if (enableSave == true) {
                    jspdf.save("add-to-multi-page.pdf");
                }
            });
        }

        function splitHTMLtoMultiPagePDF() {

            html2canvas($("#content")[0], {
                allowTaint: true
            }).then(function(canvas) {


                var myImage = canvas.toDataURL("image/jpeg,1.0");

                // Adjust width and height
                var imgWidth = (canvas.width * 35) / 240;
                var imgHeight = (canvas.height * 35) / 240;

                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(myImage, 'png', 3, 3, imgWidth, imgHeight);

                window.open(pdf.output("bloburl"), "_blank");




                // var htmlWidth = $("#content").width();
                // var htmlHeight = $("#content").height();
                // var pdfWidth = htmlWidth + (15 * 2);
                // var pdfHeight = (pdfWidth * 1.5) + (15 * 2);

                // var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                // var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;

                // canvas.getContext('2d');
                // var image = canvas.toDataURL("image/png", 1.0);
                // doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);

                // for (var i = 1; i <= pageCount; i++) {
                //     doc.addPage(pdfWidth, pdfHeight);
                //     doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
                // }

                // window.open(doc.output("bloburl"), "_blank");


            });
        };
    </script>
@endpush

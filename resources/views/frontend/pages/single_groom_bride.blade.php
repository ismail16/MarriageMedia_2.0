@extends('frontend.layouts.master')
@section('title','Profile | Groom-Bride')
@section('content')
<section class="pt-2">
    <div class="container">
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

            <div class="col-md-12 mb-2">
                <div class="card _bg-light-green">
                    <div class="card-header pb-0 pt-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <h5>
                                    Profile ID-
                                    <a href="{{ route('single_groom_bride',$user->u_id) }}">
                                        {{$user->u_id}}
                                    </a>
                                </h5>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                                Profile Created By: {{ $user->createdby }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-1 pt-1">
                        <div class="row">
                            <div class="col-md-4 bg-body-green p-2">
                                <div class="bg-light-green">
                                    <div class="card-body p-2">
                                        <div class="text-center">
                                             @php
                                                $profile_image = 0;
                                                $profile_image_status = 0;
                                                $profile_img = $user->user_images->first();
                                                
                                                if($profile_img){
                                                    $profile_image = $profile_img['profile_image'];
                                                    $profile_image_status = $profile_img['status'];
                                                }
                                            @endphp
                                    
                                            @if ($profile_image_status == 1 && $profile_image_status == 1)
                                            
                                                <img src="{{ asset('images/user_profile_image/'. $profile_img->image) }}" class="img-fluid" style=" max-height: 250px;">
                                                
                                            @elseif($ImageAccess)
                                                <img src="{{ asset('images/user_profile_image/'. $profile_img->image) }}" class="img-fluid" style=" max-height: 250px;">
                                            @elseif($receive_pro)
                                                <img src="{{ asset('images/user_profile_image/'. $profile_img->image) }}" class="img-fluid" style=" max-height: 250px;">
                                            @else
                                                @if($user->gender == 'Female')
                                                    <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}" class="w-75">
                                                @else
                                                    <img src="{{ asset('images/icons/flaticon/businessman.png') }}" class="w-75">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center pb-2">
                                        @if($user->user_images->first() && Auth::check())
                                            @if($user->user_images->first()->status == 1)
                                                <a href="{{ route('single_groom_bride_gallary', $user->id)}} " class="text-primary cursor-pointer">View Photo Album</a>
                                            @elseif($ImageAccess)
                                                <a href="{{ route('single_groom_bride_gallary', $user->id)}} " class="text-primary cursor-pointer">View Photo Album</a>
                                            @elseif($receive_pro)
                                                <a href="{{ route('single_groom_bride_gallary', $user->id)}} " class="text-primary cursor-pointer">View Photo Album</a>
                                            @else
                                                <form action="{{ route('member.image-access.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="img_req_from_user" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="img_req_to_user" value="{{ $user->id }}">
                                                    <button class="btn-link text-primary cursor-pointer">Request for see picture</button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                                                Login Required
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 bg-body-green p-2">
                                <p>
                                    <span class="font-weight-bold">
                                        Name-
                                        @if(Auth::check())
                                        {{ $user->first_name }} {{ $user->last_name }}
                                        @else
                                        <span>Disclose later</span>
                                        @endif
                                    </span>
                                    {{-- <i class="far fa-calendar-check text-success"></i>
										<span id="user-age" class="profile-detail-value">
											{{ date_diff(date_create($user->birthday), date_create('now'))->y }}
                                    Years
                                    </span> --}}
                                </p>
                                <p>
                                    <i class="far fa-calendar-check text-success"></i>
                                    <span id="user-age" class="profile-detail-value">
                                        {{ date_diff(date_create($user->birthday), date_create('now'))->y }}
                                        Years
                                    </span>
                                </p>
                                <p>
                                    <i class="fas fa-male text-success ml-1"></i>
                                    <span class="profile-detail-value ng-binding ml-1">
                                        {{ $user->user_info->height }}", {{ $user->user_info->weight }}Kg
                                    </span>
                                </p>
                                <p>
                                    <i class="far fa-heart text-danger"></i>
                                    <span class="profile-detail-value ng-binding">
                                        {{ str_replace('_', ' ', $user->marital_status) }}
                                    </span>
                                </p>
                                <p><i class="fas fa-synagogue text-success"></i>
                                    <span class="profile-detail-value ng-binding">
                                        {{ $user->religion }}
                                    </span>
                                </p>
                                <p>
                                    <i class="fa fa-graduation-cap text-success"></i>
                                    <span class="profile-detail-value ng-binding">
                                        {{ str_replace('_', ' ', $user->user_info->education_level )}}
                                    </span>
                                </p>
                                <p>
                                    <i class="fas fa-briefcase text-success"></i>
                                    <span class="profile-detail-value ng-binding">
                                        {{ str_replace('_', ' ', $user->profession) }}
                                    </span>
                                </p>
                                <div class="">
                                    <div class="mt-1">
                                        <span class="profile-detail-value ng-binding">
                                            <b>Contact Information</b>
                                        </span>
                                        <br>

                                        @if(Auth::check())
                                        @if(Auth::user()->activation != 1 || Auth::user()->status != 1)
                                        <div>
                                            <h6 class="text-danger">Your Account Not Activated!</h6>
                                        </div>

                                        @elseif(Auth::user()->activation == 1 && Auth::user()->status == 1 && Auth::user()->package_price()->first()->title != 'Free' )
                                        <div>
                                            <span>
                                                <i class="fa fa-envelope text-success"></i>
                                                {{ $user->email }}</span> <br>
                                            <span>
                                                <i class="fa fa-phone text-success"></i>
                                                {{ $user->mobile }}
                                            </span>
                                        </div>
                                        @else
                                        Email:
                                        <a href="mailto:{{ $user->email }}">
                                            {{ $user->email }}
                                        </a>
                                        @endif
                                        @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                                            Login Required
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
                                        <i class="icon-mail"></i>Send Message
                                    </button>

                                    <!-- <a class="btn btn-sm btn-success text-white">
                                            <i class="icon-mail"></i>Your Account Not Acivate
                                        </a>

                                        <a class="btn btn-sm btn-success text-white" href="{{ route('login') }}">
                                            <i class="icon-mail"></i>Send Message
                                        </a> -->

                                    @if(Auth::check())
                                    <form action="{{ route('member.sent-proposal.store') }}" method="post" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="sent_proposal_user" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="receive_proposal_user" value="{{ $user->id }}">
                                        <button class="btn btn-sm btn-primary cursor-pointer border-0">Sent Proposal</button>
                                    </form>
                                    @endif
                                    <!-- <a class="btn btn-sm btn-primary text-danger" >
                                            <i class="icon-star"></i>Add to Favorite
                                        </a> -->
                                </div>
                            </div>

                            <div class="col-md-4 bg-body-green p-2">
                                <div class="profile_detail_info mt-1 p-2 border">
                                    <p class="text-info"> <i class="far fa-check-circle text-success"></i> Trusted marriage site in bangladesh</p>
                                    <p class="text-info"> <i class="far fa-check-circle text-success"></i> Secured &amp; Reliable</p>
                                    <p class="text-info"> <i class="far fa-check-circle text-success"></i> Verified Profile</p>
                                    <div class="div_line_shadow"></div>
                                </div>
                                <div class="mt-1 p-2">
                                    <span class="profile-detail-value ng-binding">
                                        <b>Account status</b>
                                    </span> <br>
                                    <span>
                                        <i class="far fa-money-bill-alt text-success"></i>
                                        {{ $user->package_price->first()->title }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    @if(Auth::check())

                    @if(Auth::user()->activation == 1 && Auth::user()->status == 1)

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Private Message</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('member.sent-message.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control  p-2" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control  p-2" name="message" rows="5" placeholder="Message"></textarea>
                                        </div>
                                        @if(Auth::check())
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="from_id">
                                        @endif
                                        <input type="hidden" value="{{ $user->id }}" name="to_id">
                                        <div class="text-center">
                                            <button type="submit" class="">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(Auth::user()->activation != 1 || Auth::user()->status != 1)
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Account Not Acivate</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Your Account Not Acivate
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Please Login</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a class="btn btn-sm btn-primary" href="{{ route('login') }}">
                                        <i class="icon-mail"></i>Login Required
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-md-3 mb-2 d-none d-lg-block">
					@include('frontend.pages.search_bar_groom_bride')
				</div>  --}}
            <div class="col-md-12 mb-2">
                <div class="card mt-2 _bg-light-green">
                    <div class="card-header pb-0 pt-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <h5>Profile Details</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                                <div id="verifiedItems" class="float-right">
                                    <span>Verified:</span>
                                    <i class="fas fa-user-check text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <ul class="timeline timeline-left">
                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/065-love-1.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">ABOUT HE</h5>
                                    </div>
                                    <div class="timeline-body text-dark">
                                        <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                            {!! $user->user_info->about_me_family !!}
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/018-info-1.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Basic Information</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Age </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ date_diff(date_create($user->birthday), date_create('now'))->y }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Marital Status </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->marital_status) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Height </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->height }}''
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Weight </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->weight }} Kg
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Weight </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->weight }} Kg
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Religion </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->religion }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Blood Group </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->blood_group }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/016-graduated.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Education and Profession</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Education Level </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->user_info->education_level) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Major Subject </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->user_info->major_subject) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">My Profession </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->user_info->my_profession) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Job Title </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->job_title }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Company Name </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->job_company_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">My Income </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->user_info->income) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/009-address.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Present Address</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <!-- <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">District </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->district->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Thana </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->upazila->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div> -->

                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Residence(Country) </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @php
                                                        $country = App\Models\Country::where('id', $user->user_info->country_of_residence)->first();
                                                        @endphp
                                                        {{ $country->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Residence(City) </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->state_of_residence }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Citizenship </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @php $country = App\Models\Country::where('id', $user->user_info->citizenship)->first(); @endphp
                                                        {{ $country->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Zip Code </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->zip_code }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/009-address.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Permanent Address</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Country </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->country->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">District </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->district->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Thana/ Upazila </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->upazila->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/022-family-2.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Family Information</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Father's Name </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->father_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Father's Occupation </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ str_replace('_', ' ', $user->user_info->father_occupation) }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Mother's Name </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->mother_name }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Mother's Occupation </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->mother_occupation }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Number of Brother </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->number_of_brother }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">brother Married? </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->how_many_brother_married }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Number of Sister </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->number_of_sister }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Sister Married? </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $user->user_info->how_many_sister_married }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted timeline-item">
                                <div class="timeline-badge bg_primary">
                                    <img src="{{ asset('images/icons/flaticon/065-love-1.png') }}" class="w-75">
                                </div>
                                <div class="timeline-panel bg-body-green border-0">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Preferences</h5>
                                    </div>
                                    @if($preference)
                                    <div class="timeline-body">
                                        <div class="row bg-off-pink">
                                            <div class="col-sm-12">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Details you preferance</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->details_you_prefer}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Age </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->minAge}} - {{ $preference->maxAge}} years
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Height </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->minHeight}}" - {{ $preference->maxHeight}}"
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label"> Weight </label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->minWeight}} - {{ $preference->maxWeight}} Kg
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="mb-0 form-label">Religion </label>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    {{ $preference->religion}}
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Family status </label>
                                                    <?php
                                                    $family_statuss = json_decode($preference->family_status);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($family_statuss as $family_status)
                                                        {{str_replace('_', ' ', $family_status) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <label class="mb-0 form-label">Meretial status </label> <br>
                                                <?php
                                                $marital_statuss = json_decode($preference->marital_status);
                                                ?>
                                                <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                    @foreach($marital_statuss as $marital_status)
                                                    {{str_replace('_', ' ', $marital_status) }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">
                                                        Allow Children?</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->allow_children}}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Skin Color </label>
                                                    <?php
                                                    $skin_colors = json_decode($preference->skin_color);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($skin_colors as $skin_color)
                                                        {{str_replace('_', ' ', $skin_color) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Blood Group </label>
                                                    <?php
                                                    $blood_groups = json_decode($preference->blood_group);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($blood_groups as $blood_group)
                                                        {{str_replace('_', ' ', $blood_group) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="other-area">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 form-label">Hair Color </label>
                                                        <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                            {{ $preference->hair_color}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="other-area">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 form-label">Eye Color </label>
                                                        <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                            {{ $preference->eye_color}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="other-area">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 form-label">Allow Disabilities? </label>
                                                        <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                            {{ $preference->disabilities_status}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="other-area">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 form-label">Education Level </label>
                                                        <?php
                                                        $education_levels = json_decode($preference->education_level);
                                                        ?>
                                                        <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                            @foreach($education_levels as $education_level)
                                                            {{str_replace('_', ' ', $education_level) }},
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Major Subject </label>
                                                    <?php
                                                    $subjects = json_decode($preference->subject);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($subjects as $subject)
                                                        {{str_replace('_', ' ', $subject) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">My Profession </label>
                                                    <?php
                                                    $professions = json_decode($preference->profession);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($professions as $profession)
                                                        {{str_replace('_', ' ', $profession) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row bg-off-pink">
                                            <div class="col-md-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Country of Residence </label>
                                                    <?php
                                                    $countrys = json_decode($preference->country);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($countrys as $country)
                                                        {{str_replace('_', ' ', $country) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">District </label>
                                                    <?php
                                                    $districts = json_decode($preference->district);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($districts as $district)
                                                        {{str_replace('_', ' ', $district) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Citizenship </label>
                                                    <?php
                                                    $citizenships = json_decode($preference->citizenship);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($citizenships as $citizenship)
                                                        {{str_replace('_', ' ', $citizenship) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row bg-off-pink">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">
                                                        Allow Smoke?</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->smoke_status}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Allow Alcohol?</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{ $preference->alcohol_status}}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Diat Status</label>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        {{str_replace('_', ' ', $preference->diat_status) }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-1">
                                                    <label class="mb-0 form-label">Language </label>
                                                    <?php
                                                    $languages = json_decode($preference->language);
                                                    ?>
                                                    <p class="border p-1 m-0 bg-light text-dark font-weight-bold">
                                                        @foreach($languages as $language)
                                                        {{str_replace('_', ' ', $language) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Preferences not set Yet!!</h5>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
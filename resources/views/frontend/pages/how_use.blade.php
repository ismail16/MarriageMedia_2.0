@extends('frontend.layouts.master')
@section('title', 'How To Use')
@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mb-2">
            <div class="card mt-2 _bg-light-green">
                <div class="card-header pb-0 pt-2">
                    <h3>How To Use <a target="_blank" href="{{ route('index') }}">BDMarriageMedia.com</a></h3>
                </div>
                <div class="card-body p-2">
                    <h5 class="ml-4 mr-4 form-label">
                        To finding your life partner on bdmarriagemedia.com, just login and
                        search for profiles . Here are few tips of How you can use bdmarriagemedia.com more effectively.
                    </h5>
                    <ul class="timeline timeline-left">
                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                1
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        Create New Profile
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">First of all you have to create your profile with
                                            your basic
                                            information. </p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/registration.png') }}" alt=""
                                                style="height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                2
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        Verify Your Email
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">If your Account successfully created, you need to
                                            verity your email.

                                        </p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/verification.png') }}" alt=""
                                                style="height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                3
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        Log In With valid credentials
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">After verification ,You can log in.Then you will
                                            be able to access
                                            all feature of this platform.</p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/login.png') }}" alt=""
                                                style="height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                4
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        Active your Account
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">You have to make your profile 100% to active your
                                            account, You can do
                                            it from Progress Message in top or from your profile section in dashboard.</p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/profiledashboard.png') }}" alt=""
                                                style="height: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                5
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        Search for suitable Matches
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">When you log in to your bdmarriagemedia.com
                                            account, you will get
                                            the
                                            option to search for your life partner using search filters. You can make your
                                            search more precise
                                            by selecting various preferences, which will help you get closer to finding your
                                            perfect match. </p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/search.png') }}" alt=""
                                                style="height: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted timeline-item">
                            <div class="timeline-badge bg_primary text-dark">
                                6
                            </div>
                            <div class="timeline-panel bg-body-green border-0">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title mb-1 form-label">
                                        View Profile Details
                                    </h5>
                                </div>
                                <div class="timeline-body text-dark row">
                                    <div class="col-md-6 heading-section ftco-animate">

                                        <p class="text-dark text-justify">When you log in to your bdmarriagemedia.com
                                            account, you can view
                                            any
                                            bride/groom profile and you can sent proposal,If you want to sent message you
                                            have to active your
                                            account</p>
                                    </div>
                                    <div class="col-md-6 heading-section ftco-animate">
                                        <div class="card border-warning bg-light-green">
                                            <img src="{{ asset('images/how_use/profile.png') }}" alt=""
                                                style="height: 350px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>




    {{-- <section class="bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="mb-1">How To Use bdmarriagemedia.com</h2>
            <h5 class="mb-4 form-label">To finding your life partner on bdmarriagemedia.com, just login and search for
                profiles .
                Here are few tips of How you can use bdmarriagemedia.com more effectively.</h5>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>Create New Profile</h5>
                    <p class="text-dark text-justify">First of all you have to create your profile with your basic
                        information. </p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/registration.png') }}" alt="" style="height: 250px;">
                    </div>
                </div>
            </div>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>Verify Your Email</h5>
                    <p class="text-dark text-justify">If your Account successfully created, you need to verity your email.
                    </p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/verification.png') }}" alt="" style="height: 250px;">
                    </div>
                </div>
            </div>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>Log In With valid credentials
                    </h5>
                    <p class="text-dark text-justify"> After verification ,You can log in.Then you will be able to access
                        all feature of this platform. </p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/login.png') }}" alt="" style="height: 250px;">
                    </div>
                </div>
            </div>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>Search for suitable Matches
                    </h5>
                    <p class="text-dark text-justify"> When you log in to your bdmarriagemedia.com account, you will get
                        the
                        option to search for your life partner using search filters. You can make your search more precise
                        by selecting various preferences, which will help you get closer to finding your perfect match.</p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/search.png') }}" alt="" style="height: 250px;">
                    </div>
                </div>
            </div>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>View Profile Details</h5>
                    <p class="text-dark text-justify"> When you log in to your bdmarriagemedia.com account, you can view
                        any
                        bride/groom profile and you can sent proposal,If you want to sent message you have to active your
                        account</p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/profile.png') }}" alt="" style="height: 350px;">
                    </div>
                </div>
            </div>
            <div class="row mb-2 p-2 border">
                <div class="col-md-6 heading-section ftco-animate">
                    <h5 class="mb-1 form-label"><i class="far fa-hand-point-right mr-2"></i>Active your Account</h5>
                    <p class="text-dark text-justify">You have to make your profile 100% to active your account, You can do
                        it from Progress Message in top or from your profile section in dashboard. </p>
                </div>
                <div class="col-md-6 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <img src="{{ asset('images/how_use/profilepercentage.png') }}" alt=""
                            style="height: 100px;">
                        <hr>
                        <img src="{{ asset('images/how_use/profiledashboard.png') }}" alt=""
                            style="height: 300px;">
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
@endsection

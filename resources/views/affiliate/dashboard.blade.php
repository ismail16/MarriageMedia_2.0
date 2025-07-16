@extends('author.layouts.master')
@section('title','Affiliate | Dashboard')

@section('content')
@php include(app_path().'/data/temp_data.php'); @endphp

@include('affiliate.partials.modal')

<section class="content">
    <div class="container">
        <section class="content-header">
            <div class="row mt-1">
                <div class="col-sm-6">
                    <h3>Affiliate Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right pb-2 pt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Affiliate</li>
                    </ol>
                </div>
            </div>
        </section>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span class="badge badge-danger">{{ $error }}</span>
            @endforeach
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile p-2 pb-3 pt-3">
                        <div class="text-center">
                            @if($affuser->user_images->first())
                            <img src="{{ asset('images/user_profile_image/'.$affuser->user_images->first()['image']) }}" class="img-fluid w-50">
                            @else
                            @if(auth()->user()->gender == 'Female')
                            <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}" alt="Bride Image" class="img-fluid w-50">
                            @else
                            <img src="{{ asset('images/icons/flaticon/businessman.png') }}" alt="Groom Image" class="img-fluid w-50">
                            @endif
                            @endif

                        </div>
                        <h3 class="profile-username text-center mb-0">
                            {{auth()->user()->first_name}} {{auth()->user()->last_name}}
                        </h3>
                        <p class="text-muted text-center">Affiliate User</p>

                        <ul class="list-group list-group-unbordered mb-3 pt-3">
                            <li class="list-group-item pt-1 pb-1 pr-2 pl-2">
                                <span class="form-label"><i class="fas fa-users"></i> My Referral List</span> <a class="float-right"><span class="badge badge-info">{{$referral_users->count()}}</span></a>
                            </li>
                            <li class="list-group-item pt-1 pb-1 pr-2 pl-2">
                                <span class="form-label"><i class="fa fa-wallet fa-fw"></i> Total Commision</span>
                                <a class="float-right">
                                    <span class="badge badge-info">{{ $totalCommision }}</span>
                                </a>
                            </li>
                            <li class="list-group-item pt-1 pb-1 pr-2 pl-2">
                                <span class="form-label"><i class="fas fa-dollar-sign fa-fw"></i> Available Balance</span> <a class="float-right"><span class="badge badge-info">{{$balance}}</span></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#withdraw"><b>Withdraw</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="ard card-primary card-outline">
                        <div class="card-body box-profile pb-0">
                            @if(auth()->user()->activation ==1 && auth()->user()->status)
                            <p class="form-label font-weight-bold">
                                <i class="fas fa-link mr-1"></i>
                                My Referral Link :
                                <b id="referralLink">{{URL::to('/')}}/profile/create?affcode={{Auth::user()->u_id }}</b>

                                <button id="copyButton" class="btn btn-outline-success font-weight-bold ml-2"><i class="fas fa-copy"></i> Copy</button>

                                <!-- <a href="" class="btn btn-primary"><i class="fas fa-share"></i> Share</a> -->
                            </p>
                            @else
                            <div class="alert alert-danger" role="alert">
                              <h4 class="alert-heading">Notice !</h4>
                              <p><span class="font-weight-bold text-danger">Your account not activated</span>. We are requested you to contact below email to activate your affiliate account. <span class="font-weight-bold text-success">after activated you will get here a referral link for share</span>.</p>
                              <hr>
                              <p class="mb-0">please contact at email address : <b>bdmarriagemediadotcom@gmail.com</b></p>
                            </div>

                            @endif
                            <hr>
                        </div>
                    </div>
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active pl-2 pr-2 pt-0 pb-1" href="#activity" data-toggle="tab">Referral List</a></li>
                            <li class="nav-item"><a class="nav-link pl-2 pr-2 pt-0 pb-1" href="#timeline" data-toggle="tab">Payments</a></li>
                            <li class="nav-item"><a class="nav-link pl-2 pr-2 pt-0 pb-1" href="#settings" data-toggle="tab">Profile</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="tab-content">
                            @include('affiliate.partials.referralList')

                            @include('affiliate.partials.payment_history')

                            @include('affiliate.partials.basic_info')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@include('affiliate.partials.scripts')
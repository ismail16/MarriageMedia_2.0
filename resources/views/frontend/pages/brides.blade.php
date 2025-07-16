@extends('frontend.layouts.master')
@section('title', 'All Bride Profile')
@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    @include('frontend.pages.search_bar')
    <section class="testimony-section  ">
        <div class="container">
            <div class="row justify-content-center pt-3 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h3 class="mb-1">All Bride Profile</h3>
                </div>
            </div>
            <div class="row ftco-animate mb-2">
                @if (count($brides) > 0)
                    @foreach ($brides as $user)
                        <div class="col-md-4 ">
                            <div class="row border m-1">
                                <div class="col-md-5 p-1 d-flex justify-content-center">
                                    @php
                                        if (Auth::check()) {
                                            $ImageAccess = \App\Models\ImageAccess::where('img_req_from_user', Auth::user()->id)
                                                ->where('img_req_to_user', $user->id)
                                                ->where('approved', 1)
                                                ->first();
                                        } else {
                                            $ImageAccess = null;
                                        }
                                        $profile_image = 0;
                                        $profile_image_status = 0;
                                        $profile_img = $user->user_images->first();
                                        
                                        if($profile_img){
                                            $profile_image = $user->user_images->first()['profile_image'];
                                            $profile_image_status = $user->user_images->first()['status'];
                                        }
                                        
                                    @endphp

                                    @if ($profile_image_status == 1 && $profile_image_status == 1)
                                        <img src="{{ asset('images/user_profile_image/' . $user->user_images->first()->image) }}"
                                            alt="Groom Image" class="img-fluid image-size">
                                    @elseif($ImageAccess)
                                        <img src="{{ asset('images/user_profile_image/' . $user->user_images->first()->image) }}"
                                            alt="Groom Image" class="img-fluid image-size">
                                    @else
                                        @if ($user->gender == 'Female')
                                            <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}" alt="Bride Image"
                                                class="img-fluid image-size">
                                        @else
                                            <img src="{{ asset('images/icons/flaticon/businessman.png') }}"
                                                alt="Groom Image" class="img-fluid image-size">
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-7 p-1">
                                    <div class="border-bottom">
                                        ID-<a href="{{ route('single_groom_bride', $user->u_id) }}"
                                            class="as3_name profileLink">
                                            {{ $user->u_id }}
                                        </a><br>
                                        <p class="mb-0 mt-0 text-dark" style=" line-height: 25px; ">
                                            {{ str_replace('_', ' ', $user->profession) }} <br>
                                            {{ $user->gender }},
                                            {{ date_diff(date_create($user->birthday), date_create('now'))->y }} yrs,
                                            {{ $user->user_info->height }}'',
                                            {{ $user->user_info->weight }}Kg,
                                            {{ $user->district->name ?? '' }}
                                        </p>
                                    </div>

                                    <div class="mt-1">
                                        <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                            class="btn btn-sm btn-primary mr-2 profileLink ">Message</a>
                                        <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                            class="btn btn-sm btn-primary profileLink">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 well">
                        <div class="item" style="text-align: center;">
                            <h1 style="color: red">Opps !!</h1>
                            <h3>No data Found</h3><br>
                            <div class="abstract-div">
                                <div class="abstract-cropped" style="display:block; text-align: center;">
                                    Go to <a href="/">Home</a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>

    @if (!Auth::check())
        <script>
            // Function to open the modal
            function openLoginModal() {
                $("#myModal").modal("show");
            }

            // Attach a click event handler to buttons with the profileLink class
            var profileLinks = document.getElementsByClassName("profileLink");
            for (var i = 0; i < profileLinks.length; i++) {
                profileLinks[i].addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    openLoginModal(); // Open the modal
                });
            }
        </script>
    @endif
@endsection

@extends('frontend.layouts.master')
@section('title', 'BD Marriage Media | Best Marriage Media in Bangladesh')
@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    @include('frontend.pages.search_bar')

    <div class="container-fluid gradient-reverse">
        <div class="row">
            <div class="col-md-12">
                <section class="testimony-section">
                    <div class="container">
                        <div class="row justify-content-center pt-3 pb-3">
                            <div class="col-md-7 heading-section ftco-animate text-center">
                                <!-- <h1 class="h3 mb-0 form-label">BD Marriage Media</h1>  -->
                                <h3 class="text-center h3 form-label mb-0">Latest Groom Profile</h3>
                            </div>
                        </div>
                        <div class="row ftco-animate">
                            <div class="col-md-12 block-13 p-0 nav-direction-white">
                                <div class="nonloop-block-13 owl-carousel ">
                                    @if ($grooms)
                                        @foreach ($grooms as $user)
                                            <div class="media-image boxshadow-green">
                                                <div class="row p-1">
                                                    <div class="col-md-5 d-flex justify-content-center">
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
                                                                <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}"
                                                                    alt="Bride Image" class="img-fluid image-size">
                                                            @else
                                                                <img src="{{ asset('images/icons/flaticon/businessman.png') }}"
                                                                    alt="Groom Image" class="img-fluid image-size">
                                                            @endif
                                                        @endif


                                                       
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="border-bottom">
                                                            Profile ID-<a
                                                                href="{{ route('single_groom_bride', $user->u_id) }}"
                                                                class="as3_name profileLink">
                                                                {{ $user->u_id }}
                                                            </a><br>
                                                            <p class="mb-0 mt-0 text-dark" style="line-height: 25px; ">
                                                                {{ str_replace('_', ' ', $user->profession) }} <br>
                                                                {{ $user->gender }},
                                                                {{ date_diff(date_create($user->birthday), date_create('now'))->y }}
                                                                yrs,
                                                                {{ $user->user_info->height }}'',
                                                                {{ $user->user_info->weight }}Kg,
                                                                {{ $user->district->name ?? '' }}
                                                            </p>
                                                        </div>

                                                        <div class="mt-1">
                                                            <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                                                class="btn btn-sm btn-primary mr-2 profileLink">Message</a>
                                                            <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                                                class="btn btn-sm btn-primary profileLink">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <a href="{{ route('grooms') }}" class="btn btn-primary float-right">All Groom</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="container-fluid gradient">
        <div class="row">
            <div class="col-md-12">
                <section class="testimony-section">
                    <div class="container mb-2">
                        <div class="row justify-content-center pt-3 pb-3 ">
                            <div class="col-md-7 heading-section ftco-animate text-center">
                                <!-- <h2 class="h3 mb-0 form-label">BD Marriage Media</h2> -->
                                <h3 class="text-center h3 form-label mb-0">Latest Bride Profile</h3>
                            </div>
                        </div>
                        <div class="row ftco-animate">
                            <div class="col-md-12 block-13 p-0 nav-direction-white">
                                <div class="nonloop-block-14 owl-carousel ">
                                    @if ($brides)
                                        @foreach ($brides as $user)
                                            <div class="media-image boxshadow-green">
                                                <div class="row p-1">
                                                    <div class="col-md-5 d-flex justify-content-center">
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
                                                                <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}"
                                                                    alt="Bride Image" class="img-fluid image-size">
                                                            @else
                                                                <img src="{{ asset('images/icons/flaticon/businessman.png') }}"
                                                                    alt="Groom Image" class="img-fluid image-size">
                                                            @endif
                                                        @endif

                                                      
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="border-bottom">
                                                            Profile ID-<a
                                                                href="{{ route('single_groom_bride', $user->u_id) }} "
                                                                class="as3_name profileLink">
                                                                {{ $user->u_id }}
                                                            </a><br>
                                                            {{-- Name-<a href="{{ route('single_groom_bride',$user->u_id) }}" class="as3_name">
            												@if (Auth::check())
            												{{ $user->first_name }}
            												@else
            												<span>Disclose later</span>
            												@endif
            												</a> --}}
                                                            <p class="mb-0 mt-0 text-dark" style=" line-height: 25px; ">
                                                                {{ $user->profession }} <br>
                                                                {{ $user->gender }},
                                                                {{ date_diff(date_create($user->birthday), date_create('now'))->y }}
                                                                yrs,
                                                                {{ $user->user_info->height }}'',
                                                                {{ $user->user_info->weight }}Kg,
                                                                {{ $user->district->name ?? '' }}
                                                            </p>
                                                        </div>

                                                        <div class="mt-1">
                                                            <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                                                class="btn btn-sm btn-primary profileLink">Details</a>
                                                            <a href="{{ route('single_groom_bride', $user->u_id) }}"
                                                                class="btn btn-sm btn-primary mr-2 profileLink">Message</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3 class="mb-1">No found Bride</h3>
                                    @endif
                                </div>
                                <a href="{{ route('brides') }}" class="btn btn-primary float-right">All Bride</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <section class="pt-5 _bg-light-green gradient-reverse" id="section-counter" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="services ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center bg-body-green">
                            <img src="{{ 'images/icons/flaticon/065-love-1.png' }}" alt="Best Matches">
                        </div>
                        <div class="text mt-4">
                            <h3 class="">Best Matches</h3>
                            <p class="form-label">Find perfect match quite easily</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="services ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center bg-body-green">
                            <img src="{{ 'images/icons/flaticon/053-padlock.png' }}" alt="100% Privacy">
                        </div>
                        <div class="text mt-4">
                            <h3 class="">100% Privacy</h3>
                            <p class="form-label">100% safe and secured informations</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="services ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center bg-body-green">
                            <img src="{{ 'images/icons/flaticon/052-shield.png' }}" alt="Verified Profiles">
                        </div>
                        <div class="text mt-4">
                            <h3 class="">Verified Profiles</h3>
                            <p class="form-label">100% human verified profiles</p>
                        </div>
                    </div>
                </div>

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
    <!-- <section class="bg-light pt-3 pb-3">
                     <div class="container">
                      <div class="row justify-content-center mb-5 pb-3">
                       <div class="col-md-7 heading-section ftco-animate text-center">
                        <h3 class="h3 mb-0 form-label">BD Marriage Media</h3>
                        <h2 class="mb-1">Price List </h2>
                        <h3 class="subheading form-label">Choose the Best Package from the List Below</h3>
                       </div>
                      </div>
                      <div class="row d-flex justify-content-center">
                       @foreach ($package_prices as $package_price)
    <div class="col-md-3 ftco-animate">
                        <div class="card p-2">
                         <div class="text-center">
                          <h4 class="h1">{{ $package_price->title }}</h4>
                          <h2 class="form-label">BDT {{ $package_price->price }}</h2>
                          <p class="p-0 m-0 text-dark">Enjoy All The Features</p>
                          <ul class="features">
                           <li class="form-label"><i class="far fa-check-circle"></i>
                            Duration {{ $package_price->duration }} Days
                           </li>
                           <li class="form-label">
                            <i class="far fa-check-circle"></i>
                            See Contact Details
                           </li>
                           <li class="form-label">
                            <i class="far fa-check-circle"></i>
                            Private Chating
                           </li>
                           <li class="form-label">
                            <i class="far fa-check-circle"></i>
                            Total {{ $package_price->proposal }} Proposals
                           </li>
                           <li class="form-label">
                            <i class="far fa-check-circle"></i>
                            Contact View Limit {{ $package_price->contact }}
                           </li>
                           <li class="form-label">
                            <i class="far fa-check-circle"></i>
                            24/7 Customer Support
                           </li>
                          </ul>
                          <p class="p-0 m-0 text-dark">Looking for additional discount?</p>

                          <a href="#" class="btn btn-primary d-block px-2 py-2">Get Started</a>
                         </div>
                        </div>
                       </div>
    @endforeach
                      </div>
                     </div>
                    </section> -->

    <!-- <section class="pt-5 pb-5 bg-light-green" id="section-counter">
                     <div class="container _bg-body-green">
                      <div class="row justify-content-center">
                       <div class="col-md-10">
                        <div class="row">
                         <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                           <div class="text">
                            <strong class="number form-label" data-number="235">0</strong>
                            <p class="text-dark">Happy Customers</p>
                           </div>
                          </div>
                         </div>
                         <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                           <div class="text">
                            <strong class="number form-label" data-number="1342">0</strong>
                            <p class="text-dark">Membes</p>
                           </div>
                          </div>
                         </div>
                         <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                           <div class="text">
                            <strong class="number form-label" data-number="3">0</strong>
                            <p class="text-dark">Years of Experience</p>
                           </div>
                          </div>
                         </div>
                         <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                           <div class="text">
                            <strong class="number form-label" data-number="137">0</strong>
                            <p class="text-dark">Success Story</p>
                           </div>
                          </div>
                         </div>
                        </div>
                       </div>
                      </div>
                     </div>
                    </section> -->

    <!-- <section class="ftco-gallery ftco-section">
                     <div class="container">
                      <div class="row justify-content-center mb-5 pb-3">
                       <div class="col-md-7 heading-section ftco-animate text-center">
                        <h4 class="h3 mb-0 form-label">BD Marriage Media</h4>
                        <h2 class="mb-1">Success Story</h2>
                        <h3 class="subheading form-label">See the latest Success Story</h3>
                       </div>
                      </div>
                      <div class="row">
                       @foreach ($success_stories as $success_story)
    <div class="col-md-3 ftco-animate">
                        <a href="{{ asset('images/successStory/' . $success_story->image) }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('{{ asset('images/successStory/' . $success_story->image) }}'">
                         <div class="icon mb-4 d-flex align-items-center justify-content-center">
                          <span class="icon-instagram"></span>
                         </div>
                        </a>
                       </div>
    @endforeach
                      </div>
                     </div>
                    </section> -->
@endsection

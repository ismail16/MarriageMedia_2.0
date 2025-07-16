@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@section('content')
    <section class="bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="mb-1">{{ __('contact_us.title') }}</h2>
            <hr>
            <div class="row mb-5 pb-3">
                @if (session()->has('message'))
                    <div class="col-lg-12 col-xl-12 d-flex justify-content-center session_message">
                        <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                            {{ session('message') }}
                            <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="col-md-5 heading-section ftco-animate">
                    <p class="text-dark text-justify">{!! __('contact_us.message') !!}</p>
                </div>
                <div class="col-md-7 heading-section ftco-animate">
                    <div class="card border-warning bg-light-green">
                        <div class="row m-2">
                            <div class="col-lg-12 p-4 bg-body-green aos-init" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('contact_us_post') }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-6 form-group">
                                            <input type="text" name="name" class="form-control p-2"
                                                placeholder="@lang('contact_us.your_name')">

                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="email" class="form-control  p-2" name="email"
                                                placeholder="@lang('contact_us.your_email')">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control  p-2" name="subject"
                                            placeholder="@lang('contact_us.subject')">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control  p-2" name="message" rows="5" placeholder="@lang('contact_us.message_placeholder')">

									</textarea>
                                    </div>
                                    <div class="text-center"><button type="submit">@lang('contact_us.send_message')

                                        </button></div>
                                </form>
                            </div>
                        </div>
                        <div class="row p-4 d-flex justify-content-center">
                            <div class="col-md-12 p-1 d-flex m-0 card text-center aos-init aos-animate bg-body-green"
                                data-aos="fade-up" data-aos-delay="100">
                                <div class="pt-2 pb-2">
                                    <i class="bx bx-envelope contact-icon"></i>
                                    <h5>@lang('contact_us.email')</h5>
                                    <p class="form-label">bdmarriagemediadotcom@gmail.com</p>
                                </div>
                                <div class="pt-2 pb-2">
                                    <i class="bx bx-phone-call contact-icon"></i>
                                    <h5>Call Us</h5>
                                    <p class="form-label">+8801329-969792 (WhatsApp)</p>
                                </div>
                                <div class="pt-2 pb-2">
                                    <i class="bx bx-map contact-icon"></i>
                                    <h5>Our Address</h5>
                                    <p class="form-label">Kollaynpur, Dhaka-1206 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

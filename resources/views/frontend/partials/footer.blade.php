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
                </a> <br>
                <div class="text-dark">
                    If You are Not registered yet, Please <a href="{{ route('profile_create') }}">Create Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="pt-5 _bg-light-green gradient">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-md-5 ftco-animate">
                <div class="ftco-footer-widget">
                    <h5 class="h1">BD Marriage Media</h5>
                    <p class="text-justify form-label">
                        bdmarriagemedia.com, Matchmaking Service, was founded with a simple objective - to help people
                        find happiness. bdmarriagemedia.com is a social networking site specialising in matchmaking and
                        not just a matrimonial service. As a leader in what is sometimes known as the matrimony
                        category. bdmarriagemedia. com has always differentiated itself from other matrimonials through
                        its innovation-led approach. By redefining the way Bangladeshi brides and grooms meet for
                        marriage, bdmarriagemedia.com has created a renowned brand that has changed the way of finding a
                        life partner.
                        <a href="{{ route('about_us') }}" class="">Learn more<span class="ico_arrow"></span></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h3>Need Help?</h3>
                <ul class="footer_link">
                    <li><a href="{{ route('login') }}" class="form-label">Member Login</a></li>
                    <li><a href="{{ route('profile_create') }}" class="form-label">Sign Up</a></li>
                    <!-- <li><a href="" class="form-label">Partner Search</a></li> -->
                    <!-- <li><a href="" class="form-label" target="_blank">How to Use bdmarriagemedia.com</a></li> -->
                    <!-- <li><a href="" class="form-label">Premium Memberships</a></li> -->
                    <li><a href="{{ route('contact_us') }}" class="form-label">user Support</a></li>
                    <li><a href="{{ route('how_use') }}" class="form-label">How To Use</a></li>
                    <!-- <li><a href="" class="form-label">Site Map</a></li> -->
                </ul>
            </div>

            <div class="col-sm-3">
                <h3>Company</h3>
                <ul class="footer_link">
                    <li><a href="{{ route('about_us') }}" class="form-label">About Us</a></li>
                    <li><a href="{{ route('contact_us') }}" class="form-label">Contact Us</a></li>
                    <!-- <li><a href="" class="form-label"  target="_blank">bdmarriagemedia Blog</a></li> -->
                    <!-- <li><a href="" rel="nofollow" target="_blank">Careers</a></li> -->
                    <!-- <li><a href="" target="_blank">Awards &amp; Recognition</a></li> -->
                </ul>
            </div>

            <div class="col-sm-3">
                <h3>Privacy &amp; You</h3>
                <ul class="footer_link">
                    <li><a href="{{ route('terms_conditions') }}" class="form-label">Terms of Use</a></li>
                    <li><a href="{{ route('privacy_policy') }}" class="form-label">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-sm-3">
                <h3>More</h3>
                <ul class="footer_link">
                    <li><a href="" class="form-label">Success Stories</a></li>
                    <li><a href="#" class="form-label">Affiliate</a></li>
                </ul>

                <div class="ftco-footer-widget mb-4">
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <li class="ftco-animate"><a href="https://www.facebook.com/bdmarriagemediadotcom"
                                target="_blank"><span class="icon-facebook text-info"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.instagram.com/bdmarriagemedia"
                                target="_blank"><span class="icon-instagram text-info"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.linkedin.com/in/bdmarriagemedia"
                                target="_blank"><span class="icon-linkedin text-info"></span></a></li>
                        <li class="ftco-animate"><a href="https://twitter.com/BDMarriageMedia" target="_blank"><span
                                    class="icon-twitter text-info"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container-fluid boxshadow-green">
    <div class="row">
        <div class="col-md-12 p-2 text-center">
            <p class="mt-2 text-dark _font-weight-bold h6">
                Copyright &copy;
                <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script> All rights reserved by <a href="/" target="_blank" class="form-label">BD
                    Marriage Media</a>
            </p>
        </div>
    </div>
</div>

<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>


<script src="{{ asset('frontend_assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery-migrate-3.0.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery.stellar.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/aos.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery.animateNumber.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/jquery.timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/scrollax.min.js') }}" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"
    type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/google-map.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend_assets/js/customs.js') }}" type="text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    $('.select2').select2();
</script>

<style type="text/css">
    .select2-container .select2-selection--single {
        height: 32px !important;
    }
</style>

<script>

    userToken = $.trim(localStorage.getItem("userToken"));
    loggedIn = $.trim(localStorage.getItem("userLoggedIn"));

    if (loggedIn != '1') {
        $(".auth-login").remove();
    } else {
        $(".without-auth-login").remove();
    }

    function logOut() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var url = "{{route('user.logout')}}";
        $.ajax({
            type: 'POST',
            url: url,
            headers: {
                'Authorization': 'Bearer ' + userToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status === 'Success') {
                    console.log(data);

                    localStorage.removeItem("userLoggedIn");
                    localStorage.removeItem("userToken");
                    localStorage.removeItem("userName");
                    localStorage.removeItem("userEmail");
                    localStorage.removeItem("userID");
                    localStorage.removeItem("userHash");
                    localStorage.removeItem("cartSession");
                    // window.location.href = "{{ route('index') }}";
                    // toastr.success(data.message);
                    toastr.success(data.message, 'Success', {
                        timeOut: 5000,
                        toastClass: 'toast-success'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }



</script>

@stack('scripts')

</body>

</html>

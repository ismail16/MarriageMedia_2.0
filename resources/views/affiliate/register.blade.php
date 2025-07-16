@extends('frontend.layouts.master')
@section('title', 'Affiliate | Sign Up')

@section('content')
    @php include(app_path().'/data/temp_data.php'); @endphp
    <section class="hero-wrap">
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">

                <div class="col-md-9 ftco-animate ml-1 mr-1 mb-3 mt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif


                    <div class="bg-light-green pl-3 pr-3 pb-3">
                        <h3 class="text-center border-bottom mb-1 mt-1">Create New Affiliate Account</h3>
                        <div class="form-row">
                            <div class="col-md-6 form-group mb-1">
                                <label class="mb-0 form-label font-weight-bold">
                                    First name<span class="text-danger">* </span>
                                </label>
                                <input type="text" name="first_name" id="first_name" class="form-control-sm w-100"
                                    placeholder="First Name">
                                <span class="invalid-feedback d-block" id="first_name_err"></span>
                            </div>
                            <div class="col-md-6 form-group mb-1">
                                <label class="mb-0 form-label font-weight-bold">
                                    Last name<span class="text-danger">* </span>
                                </label>
                                <input type="text" name="last_name" id="last_name" class="form-control-sm w-100"
                                    placeholder="Last Name">
                                <span class="invalid-feedback d-block" id="last_name_err"></span>
                            </div>
                            <div class="col-md-4 form-group mb-1">
                                <label class="mb-0 form-label font-weight-bold">
                                    Email<span class="text-danger">* </span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control-sm w-100"
                                    placeholder="Email" autocomplete="off">
                                <span class="invalid-feedback d-block" id="email_err"></span>
                            </div>
                            <div class="col-md-4 form-group mb-1">
                                <label class="mb-0 form-label font-weight-bold">
                                    Mobile<span class="text-danger">* </span>
                                </label>
                                <input type="number" name="mobile" id="mobile" class="form-control-sm w-100"
                                    placeholder="Mobile">
                                <span class="invalid-feedback d-block" id="mobile_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Gender<span class="text-danger">* </span>
                                </label>
                                <select id="gender" name="gender" class="form-control-sm w-100">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <span class="invalid-feedback d-block" id="gender_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Profession<span class="text-danger">* </span>
                                </label>
                                <select id="profession" name="profession" class="form-control-sm w-100">

                                    @foreach ($professions as $profession)
                                        <option value="{{ $profession['slug'] }}">{{ $profession['name'] }}</option>
                                    @endforeach

                                </select>
                                <span class="invalid-feedback d-block" id="profession_err"></span>
                            </div>



                            <div class="col-md-4 form-group mb-1">
                                <label class="mb-0 form-label font-weight-bold">
                                    Birthday<span class="text-danger">* </span>
                                </label>
                                <input type="date" name="birthday" id="birthday" onchange="date_of_birth_change(event)"
                                    class="form-control-sm w-100" placeholder=" ">
                                <span class="invalid-feedback d-block" id="birthday_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Country<span class="text-danger">* </span>
                                </label>
                                <select id="country_id" name="country_id" class="form-control-sm w-100">
                                    <option value="1">Bangladesh</option>
                                    <option value="200">Others</option>
                                </select>
                                <span class="invalid-feedback d-block" id="country_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Division<span class="text-danger">* </span>
                                </label>
                                <select name="division_id" id="division_id" class="form-control-sm w-100">
                                    <option selected disabled>Select Division</option>
                                    @foreach (\App\Models\Division::orderBy('name', 'asc')->get() as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback d-block" id="division_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">District<span class="text-danger">*
                                    </span></label>
                                <select name="district_id" class="form-control form-control-sm" id="district_id">
                                </select>
                                <span class="invalid-feedback d-block" id="district_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">Thana/Upazila<span class="text-danger">*
                                    </span></label>
                                <select name="upazila_id" class="form-control form-control-sm" id="upazila_id">
                                </select>
                                <span class="invalid-feedback d-block" id="upazila_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Religion<span class="text-danger">* </span>
                                </label>
                                <select class="form-control-sm w-100" id="religion" name="religion">
                                    <option value="">Religion/Community *</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Sikh">Sikh</option>
                                    <option value="Parsi">Parsi</option>
                                    <option value="Jain">Jain</option>
                                    <option value="Jewish">Jewish</option>
                                    <option value="Spiritual">Spiritual</option>
                                    <option value="No_Religion">No Religion</option>
                                </select>
                                <span class="invalid-feedback d-block" id="religion_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Create password<span class="text-danger">* </span>
                                </label>
                                <input type="password" name="password" id="password" class="form-control-sm w-100">
                                <span class="invalid-feedback d-block" id="password_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-4">
                                <label class="mb-0 form-label font-weight-bold">
                                    Re-type password<span class="text-danger">* </span>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control-sm w-100">
                                <span class="invalid-feedback d-block" id="password_confirmation_err"></span>
                            </div>

                            <div class="form-group mb-1 col-md-12">
                                <div class="float-right">
                                    <div class="form-check mt-2 mb-2">
                                        <label class="form-check-label form-label">
                                            <input type="checkbox" name="agreement" id="agreement"
                                                class="form-check-input">
                                            I agree to the
                                            <a target="_blank" href="{{ route('terms_conditions') }}">terms and
                                                conditions</a> <span class="text-danger">* </span>
                                        </label>
                                        <span class="invalid-feedback d-block" id="agreement_err"></span>
                                    </div>
                                    <button onclick="submit_form()" class="btn btn-primary btn-block"> Register </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>


    <script type="text/javascript">
        function submit_form() {

            $('#ftco-loader').addClass('show');

            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var gender = $("#gender").val();
            var gender = $("#gender").val();
            var profession = $("#profession").val();
            var birthday = $("#birthday").val();
            var country_id = $("#country_id").val();
            var division_id = $("#division_id").val();
            var district_id = $("#district_id").val();
            var upazila_id = $("#upazila_id").val();
            var religion = $("#religion").val();
            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val();
            if ($('#agreement').is(":checked")) {
                var agreement = 1;
            } else {
                var agreement = '';
            }

            $.ajax({
                url: "{{ route('affiliate_store') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    mobile: mobile,
                    gender: gender,
                    profession: profession,
                    birthday: birthday,
                    country_id: country_id,
                    division_id: division_id,
                    district_id: district_id,
                    upazila_id: upazila_id,
                    religion: religion,
                    password: password,
                    password_confirmation: password_confirmation,
                    agreement: agreement,
                    _token: '{{ csrf_token() }}'
                },

                success: function(data) {
                    console.log('success')
                    console.log(data)
                    $('#ftco-loader').removeClass('show');
                    window.location.href = "{{ route('verifying_user') }}"
                },

                error: function(response) {
                    console.log('errors')
                    $('#ftco-loader').removeClass('show');
                    console.log(response.responseJSON.errors)
                    $('#first_name_err').text(response.responseJSON.errors.first_name);
                    $('#last_name_err').text(response.responseJSON.errors.last_name);
                    $('#email_err').text(response.responseJSON.errors.email);
                    $('#mobile_err').text(response.responseJSON.errors.mobile);
                    $('#gender_err').text(response.responseJSON.errors.gender);
                    $('#profession_err').text(response.responseJSON.errors.profession);
                    $('#birthday_err').text(response.responseJSON.errors.birthday);
                    $('#country_err').text(response.responseJSON.errors.country_id);
                    $('#division_err').text(response.responseJSON.errors.division_id);
                    $('#district_err').text(response.responseJSON.errors.district_id);
                    $('#upazila_err').text(response.responseJSON.errors.upazila_id);
                    $('#religion_err').text(response.responseJSON.errors.religion);
                    $('#password_err').text(response.responseJSON.errors.password);
                    $('#password_confirmation_err').text(response.responseJSON.errors.password_confirmation);
                    $('#agreement_err').text(response.responseJSON.errors.agreement);
                }
            });



        }


        // first_name last_name email mobile gender profession marital_status birthday country district looking_for religion social_order createdby password password_confirmation agreement

        // *****************Validation******************
        function date_of_birth_change(e) {
            if (e.target.value) {
                $('#birthday_err').text('');
            } else {
                $('#birthday_err').text("The Birthday field is required.");
            }
        }
        $("#first_name").keyup(function() {
            if ($(this).val()) {
                $('#first_name_err').text('');
            } else {
                $('#first_name_err').text("The First Name is required.");
            }
        });
        $("#last_name").keyup(function() {
            if ($(this).val()) {
                $('#last_name_err').text('');
            } else {
                $('#last_name_err').text("The Last Name is required.");
            }
        });
        $("#email").keyup(function() {
            if ($(this).val()) {
                $('#email_err').text('');
            } else {
                $('#email_err').text("The Email is required.");
            }
        });
        $("#mobile").keyup(function() {
            if ($(this).val()) {
                $('#mobile_err').text('');
            } else {
                $('#mobile_err').text("The Mobile is required.");
            }
        });
        $("#gender").change(function() {
            if ($(this).val()) {
                $('#gender_err').text('');
            } else {
                $('#gender_err').text("The Gender is required.");
            }
        });
        $("#profession").change(function() {
            if ($(this).val()) {
                $('#profession_err').text('');
            } else {
                $('#profession_err').text("The Profession is required.");
            }
        });

        $("#country_id").change(function() {
            if ($(this).val()) {
                $('#country_err').text('');
            } else {
                $('#country_err').text("The Country is required.");
            }
        });

        $("#division_id").change(function() {
            if ($(this).val()) {
                $('#division_err').text('');
            } else {
                $('#division_err').text("The Division is required.");
            }
        });

        $("#district_id").change(function() {
            if ($(this).val()) {
                $('#district_err').text('');
            } else {
                $('#district_err').text("The District is required.");
            }
        });

        $("#upazila_id").change(function() {
            if ($(this).val()) {
                $('#upazila_err').text('');
            } else {
                $('#upazila_err').text("The upazila is required.");
            }
        });

        $("#religion").change(function() {
            if ($(this).val()) {
                $('#religion_err').text('');
            } else {
                $('#religion_err').text("The Religion is required.");
            }
        });

        $("#password").keyup(function() {
            if ($(this).val()) {
                $('#password_err').text('');
            } else {
                $('#password_err').text("The Password is required.");
            }
        });
        $("#password_confirmation").keyup(function() {
            if ($(this).val()) {
                $('#password_confirmation_err').text('');
            } else {
                $('#password_confirmation_err').text("The Password Confirmation is required.");
            }
        });
        $("#agreement").click(function() {
            if ($('#agreement').is(":checked")) {
                $('#agreement_err').text('');
            } else {
                $('#agreement_err').text("The Agreement is required.");
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#division_id').on('change', function() {
                var divisionId = $(this).val();

                // Clear the district and thana dropdowns
                $('#district_id').empty();
                $('#upazila_id').empty();

                // Fetch districts for the selected division
                $.ajax({
                    url: "{{ route('affiliate.get-districts-by-division') }}",
                    method: 'GET',
                    data: {
                        division_id: divisionId
                    },
                    success: function(data) {
                        $('#district_id').append(new Option('Select District', ''));
                        $.each(data, function(index, district) {
                            $('#district_id').append(new Option(district.name, district
                                .id));
                        });
                    }
                });
            });

            $('#district_id').on('change', function() {
                var districtId = $(this).val();

                // Clear the thana dropdown
                $('#upazila_id').empty();

                // Fetch thanas for the selected district
                $.ajax({
                    url: "{{ route('affiliate.get-thanas-by-district') }}",
                    method: 'GET',
                    data: {
                        district_id: districtId
                    },
                    success: function(data) {
                        $('#upazila_id').append(new Option('Select upazila', ''));
                        $.each(data, function(index, upazila) {
                            $('#upazila_id').append(new Option(upazila.name, upazila
                                .id));
                        });
                    }
                });
            });
        });
    </script>
@endpush

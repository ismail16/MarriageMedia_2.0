@extends('author.layouts.master')
@section('title', 'Author | Basic Info')
@section('content')
    <section class="content session_contect">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('author.partials.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-2 mb-2 bg-light-green">
                                        <div class="card-header pb-0 pt-2">
                                            <div class="">
                                                <a class="float-right btn btn-sm btn-primary"
                                                    href="#">
                                                    <i class="nav-icon fas fa-edit"></i> Edit
                                                </a>
                                            </div>
                                            <div>
                                                <h4>Basic Information</h4>
                                            </div>
                                        </div>
                                        {{ dd(Auth::guard('user')) }}
                                        <div class="card-body bg-body-green p-2">
                                            <div class="form-row">
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Name</label>
                                                    {{-- <input type="text" id="first_name"> --}}
                                                    <p class="border p-1 m-0 text-dark" id="first_name"></p>
                                                </div>
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Email address</label>
                                                    <p class="border p-1 m-0 text-dark" id="email"></p>
                                                </div>
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">mobile</label>
                                                    <p class="border p-1 m-0 text-dark" id="mobile"></p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Gender</label>
                                                    <p class="border p-1 m-0 text-dark" id="gender"></p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Profession</label>
                                                    <p class="border p-1 m-0 text-dark" id="profession">
                                                       </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Meretial status</label>
                                                    <p class="border p-1 m-0 text-dark" id="marital_status">
                                                        </p>
                                                </div>

                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Birthday</label>
                                                    <p class="border p-1 m-0 text-dark" id="birthday"></p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Country</label>
                                                    <p class="border p-1 m-0 text-dark" id="country">
                                                    </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Division</label>
                                                    <p class="border p-1 m-0 text-dark" id="division">
                                                       </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">City / District</label>
                                                    <p class="border p-1 m-0 text-dark" id="city">
                                                       </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Upazila/Thana</label>
                                                    <p class="border p-1 m-0 text-dark" id="thana">
                                                       </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Looking For</label>
                                                    <p class="border p-1 m-0 text-dark" id="looking_for"></p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Religion</label>
                                                    <p class="border p-1 m-0 text-dark" id="religion"></p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Caste</label>
                                                    <p class="border p-1 m-0 text-dark" id="caste">
                                                       </p>
                                                </div>

                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Profile Create By</label>
                                                    <p class="border p-1 m-0 text-dark" id="createdby"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<script>
    var userID = $.trim(localStorage.getItem("userID"));
    var userToken = $.trim(localStorage.getItem("userToken"));

    function getProfile() {

        if (!userID) {
            console.error("No user ID found in localStorage.");
            return;
        }

        let url = '/api/profile/' + userID;
        var selectElement = document.getElementById("country_id");

        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'Authorization': `Bearer ${userToken}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            success: function(data) {

                console.log(data);
                $('#first_name').text(data.data.first_name +' '+data.data.last_name);
                $('#email').text(data.data.email);
                $('#mobile').text(data.data.mobile);
                $('#gender').text(data.data.gender);
                $('#profession').text(data.data.profession);
                $('#marital_status').text(data.data.marital_status);
                $('#birthday').text(data.data.birthday);
                $('#country').text(data.data.country ?? '-');
                $('#division').text(data.data.division ?? '-');
                $('#city').text(data.data.city ?? '-');
                $('#thana').text(data.data.thana ?? '-');
                $('#looking_for').text(data.data.looking_for);
                $('#religion').text(data.data.religion);
                $('#caste').text(data.data.caste ?? '-');
                $('#createdby').text(data.data.createdby);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    getProfile();
</script>
@endpush
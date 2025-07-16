@extends('author.layouts.master')
@section('title', 'Author | Basic Info')
@section('content')
    @php include(app_path().'/data/temp_data.php'); @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('author.partials.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card mt-2 mb-2 bg-light-green">
                                <div class="">
                                    @if ($errors->any())
                                        <div class="alert">
                                            @foreach ($errors->all() as $error)
                                                <span class="badge badge-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="card-header pb-0 pt-2">
                                        <div class="">
                                            <a class="float-right btn btn-sm btn-primary"
                                                href="{{ route('member.basic-info.edit', $user->id) }}">
                                                <i class="nav-icon fas fa-edit"></i> Edit
                                            </a>
                                        </div>
                                        <div>
                                            <h4>Sent Message</h4>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 bg-light-green">
                                        <form action="{{ route('member.basic-info.update', $user->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">First name *</label>
                                                    <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                        class="form-control-sm w-100" placeholder="First Name">
                                                </div>
                                                <div class="col-md-6 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">Last name *</label>
                                                    <input type="text" name="last_name" value="{{ $user->last_name }}"
                                                        class="form-control-sm w-100" placeholder="Last Name">
                                                </div>
                                                <div class="col-md-6 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">Email address *</label>
                                                    <input type="email" name="email" value="{{ $user->email }}"
                                                        class="form-control-sm w-100" placeholder="Email"
                                                        autocomplete="off">
                                                </div>
                                                <div class="col-md-6 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">Mobile *</label>
                                                    <input type="text" name="mobile" value="{{ $user->mobile }}"
                                                        class="form-control-sm w-100" placeholder="Mobile">
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Gender *</label>
                                                    <select id="gender" name="gender" class="form-control-sm w-100">
                                                        <option value="">Select Gender *</option>
                                                        <option value="Male"
                                                            {{ $user->gender == 'Male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="Female"
                                                            {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Profession *</label>
                                                    <select id="profession" name="profession" class="form-control-sm w-100">
                                                        @foreach ($professions as $profession)
                                                            <option value="{{ $profession['slug'] }}"
                                                                {{ $user->profession == $profession['slug'] ? 'selected' : '' }}>
                                                                {{ $profession['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Meretial status</label>
                                                    <select id="marital_status" name="marital_status"
                                                        class="form-control-sm w-100">
                                                        <option value="">Select Marital Status *</option>
                                                        <option value="Never_Married"
                                                            {{ $user->marital_status == 'Never_Married' ? 'selected' : '' }}>
                                                            Never Married</option>
                                                        <option value="Legally_Separated"
                                                            {{ $user->marital_status == 'Legally_Separated' ? 'selected' : '' }}>
                                                            Legally Separated</option>
                                                        <option value="Divorced"
                                                            {{ $user->marital_status == 'Divorced' ? 'selected' : '' }}>
                                                            Divorced</option>
                                                        <option value="Widowed"
                                                            {{ $user->marital_status == 'Widowed' ? 'selected' : '' }}>
                                                            Widowed
                                                        </option>
                                                        <option value="Anulled"
                                                            {{ $user->marital_status == 'Anulled' ? 'selected' : '' }}>
                                                            Anulled
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">Birthday</label>
                                                    <input type="text" name="birthday" value="{{ $user->birthday }}"
                                                        class="form-control-sm w-100" placeholder=" ">
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Country</label>
                                                    <select id="country" name="country" class="form-control-sm w-100">
                                                        <option value="1"
                                                            {{ $user->country_id == 1 ? 'selected' : '' }}>
                                                            Bangladesh</option>
                                                        <option value="200"
                                                            {{ $user->country_id == 200 ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Division</label>
                                                    <select name="division_id" id="division_id"
                                                        class="form-control-sm w-100">
                                                        @foreach (\App\Models\Admin\Division::orderBy('name', 'asc')->get() as $division)
                                                            <option value="{{ $division->id }}"
                                                                {{ $division->id == $user->division_id ? 'selected' : '' }}>
                                                                {{ $division->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">City / District</label>
                                                    <select name="district_id" id="district_id"
                                                        class="form-control-sm w-100">
                                                        @foreach (\App\Models\Admin\District::orderBy('name', 'asc')->get() as $district)
                                                            <option value="{{ $district->id }}"
                                                                {{ $district->id == $user->district_id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label
                                                        class="mb-0 form-label font-weight-bold font-weight-bold">Upazila /
                                                        Thana</label>
                                                    <select name="upazila_id" class="form-control form-control-sm"
                                                        id="upazila_id">
                                                        @foreach (\App\Models\Admin\Upazila::orderBy('name', 'asc')->where('district_id', $user->district_id)->get() as $upazila)
                                                            <option value="{{ $district->id }}"
                                                                {{ $upazila->id == $user->upazila_id ? 'selected' : '' }}>
                                                                {{ $upazila->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback d-block" id="thana_err"></span>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Looking For</label>
                                                    <select class="form-control-sm w-100" id="looking_for"
                                                        name="looking_for">
                                                        <option value="">Looking For *</option>
                                                        <option value="Bride"
                                                            {{ $user->looking_for == 'Bride' ? 'selected' : '' }}>Bride
                                                            (Female)</option>
                                                        <option value="Groom"
                                                            {{ $user->looking_for == 'Groom' ? 'selected' : '' }}>Groom
                                                            (Male)
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Religion</label>
                                                    <select class="form-control-sm w-100" id="religion" name="religion">
                                                        <option value="">Religion/Community *</option>
                                                        <option value="Islam"
                                                            {{ $user->religion == 'Islam' ? 'selected' : '' }}>Islam
                                                        </option>
                                                        <option value="Hindu"
                                                            {{ $user->religion == 'Hindu' ? 'selected' : '' }}>Hindu
                                                        </option>
                                                        <option value="Christian"
                                                            {{ $user->religion == 'Christian' ? 'selected' : '' }}>
                                                            Christian
                                                        </option>
                                                        <option value="Buddhist"
                                                            {{ $user->religion == 'Buddhist' ? 'selected' : '' }}>Buddhist
                                                        </option>
                                                        <option value="Sikh"
                                                            {{ $user->religion == 'Sikh' ? 'selected' : '' }}>Sikh</option>
                                                        <option value="Parsi"
                                                            {{ $user->religion == 'Parsi' ? 'selected' : '' }}>Parsi
                                                        </option>
                                                        <option value="Jain"
                                                            {{ $user->religion == 'Jain' ? 'selected' : '' }}>Jain</option>
                                                        <option value="Jewish"
                                                            {{ $user->religion == 'Jewish' ? 'selected' : '' }}>Jewish
                                                        </option>
                                                        <option value="Spiritual"
                                                            {{ $user->religion == 'Spiritual' ? 'selected' : '' }}>
                                                            Spiritual
                                                        </option>
                                                        <option value="No_Religion"
                                                            {{ $user->religion == 'No_Religion' ? 'selected' : '' }}>No
                                                            Religion</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-1 col-md-3">
                                                    <label class="mb-0 form-label font-weight-bold">Caste</label>
                                                    <select class="form-control-sm w-100" id="social_order"
                                                        name="social_order">
                                                        <option value="">Social Order/Caste *</option>
                                                        <option value="Just_Muslim"
                                                            {{ $user->social_order == 'Just_Muslim' ? 'selected' : '' }}>
                                                            Just
                                                            Muslim</option>
                                                        <option value="Salafi"
                                                            {{ $user->social_order == 'Salafi' ? 'selected' : '' }}>Salafi
                                                        </option>
                                                        <option value="Sunni"
                                                            {{ $user->social_order == 'Sunni' ? 'selected' : '' }}>Sunni
                                                        </option>
                                                        <option value="Sunni_Hanafi"
                                                            {{ $user->social_order == 'Sunni_Hanafi' ? 'selected' : '' }}>
                                                            Sunni
                                                            Hanafi</option>
                                                        <option value="Sunni_Shafi"
                                                            {{ $user->social_order == 'Sunni_Shafi' ? 'selected' : '' }}>
                                                            Sunni
                                                            Shafi</option>
                                                        <option value="Sunni_Maliki"
                                                            {{ $user->social_order == 'Sunni_Maliki' ? 'selected' : '' }}>
                                                            Sunni
                                                            Maliki</option>
                                                        <option value="Sufi"
                                                            {{ $user->social_order == 'Sufi' ? 'selected' : '' }}>Sufi
                                                        </option>
                                                        <option value="Shia"
                                                            {{ $user->social_order == 'Shia' ? 'selected' : '' }}>Shia
                                                        </option>
                                                        <option value="Shia_Bohra"
                                                            {{ $user->social_order == 'Shia_Bohra' ? 'selected' : '' }}>
                                                            Shia
                                                            Bohra</option>
                                                        <option value="Shia_Zaidi"
                                                            {{ $user->social_order == 'Shia_Zaidi' ? 'selected' : '' }}>
                                                            Shia
                                                            Zaidi</option>
                                                        <option value="Brahmin"
                                                            {{ $user->social_order == 'Brahmin' ? 'selected' : '' }}>
                                                            Brahmin
                                                        </option>
                                                        <option value="Kshatriyas"
                                                            {{ $user->social_order == 'Kshatriyas' ? 'selected' : '' }}>
                                                            Kshatriyas</option>
                                                        <option value="Vaisyas"
                                                            {{ $user->social_order == 'Vaisyas' ? 'selected' : '' }}>
                                                            Vaisyas
                                                        </option>
                                                        <option value="Shudras"
                                                            {{ $user->social_order == 'Shudras' ? 'selected' : '' }}>
                                                            Shudras
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 form-group mb-1">
                                                    <label class="mb-0 form-label font-weight-bold">Profile Create
                                                        By</label>
                                                    <select class="form-control-sm w-100" id="createdby" name="createdby"
                                                        autocomplete="off">
                                                        <option value="">Profile Created By *</option>
                                                        <option value="Self"
                                                            {{ $user->createdby == 'Self' ? 'selected' : '' }}>Self
                                                        </option>
                                                        <option value="Parent"
                                                            {{ $user->createdby == 'Parent' ? 'selected' : '' }}>Parent
                                                        </option>
                                                        <option value="Guardian"
                                                            {{ $user->createdby == 'Guardian' ? 'selected' : '' }}>Guardian
                                                        </option>
                                                        <option value="Other"
                                                            {{ $user->createdby == 'Other' ? 'selected' : '' }}>Other
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1 col-md-6">
                                                    <label class="mb-0 form-label font-weight-bold">New password (If you
                                                        want to
                                                        Update Password)</label>
                                                    <input type="password" name="password" class="form-control-sm w-100"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1 col-md-6">
                                                    <div class="ml-2">
                                                        <div class="form-check mt-4 mb-2">
                                                            <label class="form-check-label ml-2">
                                                                <input type="checkbox" value="1" name="agreement"
                                                                    class="form-check-input" checked disabled>
                                                                I agree to the
                                                                <a target="_blank" href="#"
                                                                    style="color:#D52379">terms and conditions</a>
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            <i class="nav-icon fas fa-sync"></i> Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
        $(document).ready(function() {
            $('#division_id').on('change', function() {
                var divisionId = $(this).val();

                // Clear the district and thana dropdowns
                $('#district_id').empty();
                $('#upazila_id').empty();

                // Fetch districts for the selected division
                $.ajax({
                    url: "/",
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
                    url: "/",
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

<div class="tab-pane" id="settings">
    <div class="card-body">
        <form onsubmit="return submit_form1()" id="edit_user_form" action="{{ route('affiliate.basic-info.update', $affuser->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-md-6 form-group mb-1">
                    <label class="mb-0 form-label">First name *</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $affuser->first_name }}" class="form-control" placeholder="First Name">
                    <span class="invalid-feedback d-block" id="first_name_err"></span>
                </div>

                <div class="col-md-6 form-group mb-1">
                    <label class="mb-0 form-label">Last name *</label>
                    <input type="text" name="last_name" value="{{ $affuser->last_name }}" class="form-control" placeholder="Last Name">
                    <span class="invalid-feedback d-block" id="last_name_err"></span>
                </div>
                <div class="col-md-4 form-group mb-1">
                    <label class="mb-0 form-label">Email address *</label>
                    <input type="email" name="email" value="{{ $affuser->email }}" class="form-control" placeholder="Email" autocomplete="off">
                    <span class="invalid-feedback d-block" id="email_err"></span>
                </div>
                <div class="col-md-4 form-group mb-1">
                    <label class="mb-0 form-label">Mobile *</label>
                    <input type="text" name="mobile" value="{{ $affuser->mobile }}" class="form-control" placeholder="Mobile">
                    <span class="invalid-feedback d-block" id="mobile_err"></span>
                </div>

                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Gender *</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="">Select Gender *</option>
                        <option value="Male" {{ $affuser->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $affuser->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <span class="invalid-feedback d-block" id="gender_err"></span>
                </div>

                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Profession *</label>
                    <select id="profession" name="profession" class="form-control">
                        @foreach ($professions as $profession)
                        <option value="{{ $profession['slug'] }}" {{ $affuser->profession == $profession['slug'] ? 'selected' : '' }}>
                            {{ $profession['name'] }}
                        </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback d-block" id="profession_err"></span>
                </div>

                <div class="col-md-4 form-group mb-1">
                    <label class="mb-0 form-label">Birthday</label>
                    <input type="text" name="birthday" value="{{ $affuser->birthday }}" class="form-control" placeholder=" ">
                    <span class="invalid-feedback d-block" id="birthday_err"></span>
                </div>

                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Country *</label>
                    <select id="country_id" name="country_id" class="form-control-sm w-100">
                        @foreach (\App\Models\Country::orderBy('name', 'asc')->get() as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback d-block" id="country_err"></span>
                </div>



                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label font-weight-bold">Division<span class="text-danger">* </span></label>
                    <select name="division_id" id="division_id" class="form-control-sm w-100">
                        <option disabled selected value="">Select Division</option>
                        @foreach (\App\Models\Division::orderBy('name', 'asc')->get() as $division)
                        <option value="{{ $division->id }}" {{ $division->id == $affuser->division_id ? 'selected' : '' }}>
                            {{ $division->name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback d-block" id="division_err"></span>
                </div>


                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label font-weight-bold">District<span class="text-danger">* </span></label>
                    <select name="district_id" class="form-control form-control-sm" id="district_id">
                        <option disabled selected value="">Select district</option>
                        @foreach (\App\Models\District::where('division_id', $affuser->division_id)->orderBy('name', 'asc')->get() as $district)
                        <option value="{{ $district->id }}" {{ $district->id == $affuser->district_id ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback d-block" id="district_err"></span>
                </div>

                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label font-weight-bold">Upazila<span class="text-danger">* </span></label>
                    <select name="upazila_id" class="form-control form-control-sm" id="upazila_id">
                        <option disabled selected value="">Select Upazila</option>
                        @foreach (\App\Models\Upazila::where('district_id', $affuser->district_id)->orderBy('name', 'asc')->get() as $upazila)
                        <option value="{{ $upazila->id }}" {{ $upazila->id == $affuser->upazila_id ? 'selected' : '' }}>
                            {{ $upazila->name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback d-block" id="thana_err"></span>
                </div>



                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Religion</label>
                    <select class="form-control" id="religion" name="religion">
                        <option value="">Religion/Community *</option>
                        <option value="Islam" {{ $affuser->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Hindu" {{ $affuser->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Christian" {{ $affuser->religion == 'Christian' ? 'selected' : '' }}>Christian
                        </option>
                        <option value="Buddhist" {{ $affuser->religion == 'Buddhist' ? 'selected' : '' }}>Buddhist
                        </option>
                        <option value="Sikh" {{ $affuser->religion == 'Sikh' ? 'selected' : '' }}>Sikh</option>
                        <option value="Parsi" {{ $affuser->religion == 'Parsi' ? 'selected' : '' }}>Parsi</option>
                        <option value="Jain" {{ $affuser->religion == 'Jain' ? 'selected' : '' }}>Jain</option>
                        <option value="Jewish" {{ $affuser->religion == 'Jewish' ? 'selected' : '' }}>Jewish</option>
                        <option value="Spiritual" {{ $affuser->religion == 'Spiritual' ? 'selected' : '' }}>Spiritual
                        </option>
                        <option value="No_Religion" {{ $affuser->religion == 'No_Religion' ? 'selected' : '' }}>No
                            Religion</option>
                    </select>
                    <span class="invalid-feedback d-block" id="religion_err"></span>
                </div>

                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Update password (If You Want)</label>
                    <input type="text" name="password" class="form-control" autocomplete="off">
                </div>
                <div class="form-group mb-1 col-md-4">
                    <label class="mb-0 form-label">Re-type password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                    <span class="invalid-feedback d-block" id="password_confirmation_err"></span>
                </div>


                <div class="col-md-6 form-group mb-1">
                    <label class="mb-0 form-label">Profile Photo</label>
                    <input type="file" name="image" class="form-control pl-0" accept="image/*">
                    <span class="invalid-feedback d-block" id="image_err"></span>
                </div>

                <div class="form-group mb-1 col-md-6">
                    <div class="ml-2">
                        <div class="form-check mt-4 mb-2">
                            <label class="form-check-label ml-2">
                                <input type="checkbox" value="1" name="agreement" class="form-check-input" checked disabled>
                                I agree to the
                                <a target="_blank" href="#" style="color:#D52379">terms and conditions</a>
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
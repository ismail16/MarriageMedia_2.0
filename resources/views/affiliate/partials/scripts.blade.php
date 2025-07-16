@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        // Get the referral link text
        var referralLinkText = document.getElementById("referralLink").textContent.trim();

        // Create a temporary input element to copy the text
        var tempInput = document.createElement("input");
        tempInput.value = referralLinkText;
        document.body.appendChild(tempInput);

        // Select and copy the text
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        // Change the button text temporarily
        var originalButtonText = this.innerHTML;
        this.innerHTML = "Copied!";

        // Reset button text after 3 seconds
        setTimeout(function() {
            document.getElementById("copyButton").innerHTML = originalButtonText;
        }, 3000);
    });
</script>

<script>
    // Disable autocomplete for the password field
    document.getElementById("password").setAttribute("autocomplete", "");
</script>

<script type="text/javascript">
    function submit_form1() {
        clearErrors();

        var firstName = document.getElementById('first_name').value;
        var lastName = document.getElementById('last_name').value;
        var email = document.getElementById('email').value;
        var mobile = document.getElementById('mobile').value;
        var gender = document.getElementById('gender').value;
        var profession = document.getElementById('profession').value;
        var birthday = document.getElementById('birthday').value;
        var country = document.getElementById('country').value;
        var division_id = document.getElementById('division_id').value;
        var district_id = document.getElementById('district_id').value;
        var upazila_id = document.getElementById('upazila_id').value;
        var religion = document.getElementById('religion').value;
        var password = document.getElementById('password').value;
        var passwordConfirmation = document.getElementById('password_confirmation').value;
        var agreement = document.getElementById('agreement').checked;

        var isValid = true;

        if (!firstName) {
            showError('first_name_err', 'Please enter your first name');
            isValid = false;
        }

        if (!lastName) {
            showError('last_name_err', 'Please enter your last name');
            isValid = false;
        }

        if (!email) {
            showError('email_err', 'Please enter your email');
            isValid = false;
        } else if (!isValidEmail(email)) {
            showError('email_err', 'Please enter a valid email address');
            isValid = false;
        }

        if (!mobile) {
            showError('mobile_err', 'Please enter your mobile number');
            isValid = false;
        } else if (!isValidMobile(mobile)) {
            showError('mobile_err', 'Please enter a valid mobile number');
            isValid = false;
        }

        if (!gender) {
            showError('gender_err', 'Please select your gender');
            isValid = false;
        }

        if (!profession) {
            showError('profession_err', 'Please select your profession');
            isValid = false;
        }

        if (!birthday) {
            showError('birthday_err', 'Please select your birthday');
            isValid = false;
        }

        if (!country_id) {
            showError('country_err', 'Please select your country');
            isValid = false;
        }

        if (!division_id) {
            showError('division_err', 'Please select your division');
            isValid = false;
        }

        if (!district_id) {
            showError('district_err', 'Please select your district');
            isValid = false;
        }

        if (!upazila_id) {
            showError('thana_err', 'Please select your thana');
            isValid = false;
        }

        if (!religion) {
            showError('religion_err', 'Please select your religion');
            isValid = false;
        }

        if (password) {
            if (!passwordConfirmation) {
                showError('password_confirmation_err', 'Please re-type your password');
                isValid = false;
            } else if (passwordConfirmation !== password) {
                showError('password_confirmation_err', 'Password and re-typed password do not match');
                isValid = false;
            }
        }

        if (!agreement) {
            showError('agreement_err', 'Please agree to the terms and conditions');
            isValid = false;
        }

        console.log(isValid);

        if (!isValid) {
            alert('Please fill up the form correctly');
            return false; // Prevent form submission
        }

        document.getElementById('edit_user_form').submit();
    }

    function clearErrors() {
        document.querySelectorAll('.invalid-feedback').forEach(function(element) {
            element.innerHTML = '';
        });
    }

    function showError(fieldId, message) {
        document.getElementById(fieldId).innerHTML = message;
    }

    function isValidEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function isValidMobile(mobile) {
        var mobilePattern = /^\d{11}$/;
        return mobilePattern.test(mobile);
    }
</script>


<script>
    $(document).ready(function() {
        var divisionDropdown = $('#division_id');
        var districtDropdown = $('#district_id');
        var upazilaDropdown = $('#upazila_id');
        // Load districts and thanas on page load
        loadDistricts();
        LoadUpazila();
        divisionDropdown.on('change', function() {
            loadDistricts();
        });
        districtDropdown.on('change', function() {
            LoadUpazila();
        });

        function loadDistricts() {
            var divisionId = divisionDropdown.val();
            districtDropdown.empty();
            upazilaDropdown.empty();
            if (!divisionId || divisionId === "") {
                districtDropdown.append(new Option('Select District', ''));
                upazilaDropdown.append(new Option('Select Upazila', ''));
                return; // Exit the function
            }
            $.ajax({
                url: "{{ route('affiliate.district.get-districts-by-division') }}",
                method: 'GET',
                data: {
                    division_id: divisionId
                },
                success: function(data) {
                    districtDropdown.append(new Option('Select District', ''));
                    $.each(data, function(index, district) {
                        districtDropdown.append(new Option(district.name, district.id));
                    });
                    if ('{{ $existingDivisionId }}' == divisionId) {
                        districtDropdown.val('{{ $existingDistrictId }}');
                    }
                    LoadUpazila();
                }
            });
        }

        function LoadUpazila() {
            var districtId = districtDropdown.val();
            upazilaDropdown.empty();
            // If no district is selected or "Select District" is chosen
            if (!districtId || districtId === "") {
                upazilaDropdown.append(new Option('Select Upazila', ''));
                return; // Exit the function
            }
            $.ajax({
                url: "{{ route('affiliate.thana.get-thanas-by-district') }}",
                method: 'GET',
                data: {
                    district_id: districtId
                },
                success: function(data) {
                    upazilaDropdown.append(new Option('Select Upazila', ''));
                    $.each(data, function(index, thana) {
                        upazilaDropdown.append(new Option(thana.name, thana.id));
                    });
                    // Set the selected thana based on existing data

                    if ('{{ $existingDistrictId }}' == districtId) {
                        upazilaDropdown.val('{{ $existingUpazilaId }}');
                    }
                }
            });
        }
    });
</script>
@endpush
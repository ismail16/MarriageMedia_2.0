<section class="testimony-section _bg-body-green _bg-light gradient">
    <div class="container">
        <div class="row no-gutters slider-text  align-items-end justify-content-start">
            <div class="col-md-12 mb-5 pt-4 ftco-animate">
                <h1 class="text-center h3 form-label mb-0">BD Marriage Media</h1>
                <p class="text-center form-label mb-1">Preferred and Trusted Service for Finding a Life-Partner</p>

                <div class="row  mb-3 d-flex justify-content-center border">
                    @if (!Auth::check())
                        <div class="col-md-2 m-2">
                            <a href="{{ route('profile_create') }}" class="btn btn-sm btn-block btn-success">
                                Create New Profile
                            </a>
                        </div>
                        <div class="col-md-2 m-2">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-block btn-success">
                                Login
                            </a>
                        </div>

                        <div class="col-md-12 m-2">
                            @include('author.partials.restriction_message')
                        </div>
                    @endif
                </div>


                <h2 class="text-center h3 form-label mb-0">Search Groom/Bride</h2>

                <form class="" action="{{ route('search_groom_bride') }}" method="post"
                    enctype="multipart/form-data" id="searchForm">

                    @csrf
                    <div class="row bg-body-green p-2 search_option_div">
                        <div class="col-sm-6 col-md-2 col-lg-2 mb-1 search_option">
                            <h6 class="mb-0 form-label">Looking</h6>
                            <select class="form-control-sm w-100" name="looking_for">
                                <option value="Bride">Groom(Male)</option>
                                <option value="Groom">Bride(Female)</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 mb-1 search_option">
                            <h6 class="mb-0 form-label">Marital Status</h6>
                            <select class="form-control-sm w-100" name="marital_status">
                                <option value="Never_Married">Never Married</option>
                                <option value="Legally_Separated">Legally Separated</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Anulled">Anulled</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3 mb-1 search_option">
                            <h6 class="mb-0 form-label">Age (MIN - MAX)</h6>
                            <div class="row">
                                <div class="col-6 _pr-2">
                                    <select class="form-control-sm age_limit w-100" name="minAge">
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                                <div class="col-6 _pl-2">
                                    <select class="form-control-sm age_limit w-100" name="maxAge"
                                        style="float: right;">
                                        <option value="50">Max Age</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2 mb-1 search_option">
                            <h6 class="mb-0 form-label">Relegion</h6>
                            <select class="form-control-sm w-100" name="relegion">
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Sikh">Sikh</option>
                                <option value="Parsi">Parsi</option>
                                <option value="Jain">Jain</option>
                                <option value="Jewish">Jewish</option>
                                <option value="Spiritual">Spiritual</option>
                                <option value="No Religion">No Religion</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 mb-1 search_option">
                            <h6 class="mb-0 form-label">Profession</h6>
                            <select class="form-control-sm w-100" name="profession">
                                <option value="">Select Profession *</option>
                                <option value="Acting professional">Acting professional</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Administration professional">Administration professional</option>
                                <option value="Advertising professional">Advertising professional</option>
                                <option value="Air Hostess">Air Hostess</option>
                                <option value="Airline">Airline</option>
                                <option value="Architect">Architect</option>
                                <option value="Artisan">Artisan</option>
                                <option value="Audiologist">Audiologist</option>
                                <option value="Biologist\Botanist">Biologist\Botanist</option>
                                <option value="Business Person">Business Person</option>
                                <option value="Beautician">Beautician</option>
                                <option value="Banker">Banker</option>
                                <option value="Business">Business</option>
                                <option value="Computer professional">Computer professional</option>
                                <option value="Contractor">Contractor</option>
                                <option value="Creative person">Creative person</option>
                                <option value="Chartered Accountant">Chartered Accountant</option>
                                <option value="Customer Support">Customer Support</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Dentist">Dentist</option>
                                <option value="Defense">Defense (Officer)</option>
                                <option value="Defense">Defense (Soldier)</option>
                                <option value="Designer">Designer</option>
                                <option value="EngineerSoftware">Software Engineer</option>
                                <option value="EngineerMechanical">Engineer (Mechanical)</option>
                                <option value="EngineerTextail">Engineer (Textail)</option>
                                <option value="EngineerProject">Engineer (Project)</option>
                                <option value="EngineerCivil">Engineer (Civil)</option>
                                <option value="EngineerCivil">Engineer (Others)</option>
                                <option value="Event Manager">Event Manager</option>
                                <option value="Executive">Executive</option>
                                <option value="Economist">Economist</option>
                                <option value="Fashion Designer">Fashion Designer</option>
                                <option value="Finance Professional">Finance Professional</option>
                                <option value="Factory Worker">Factory Worker</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Flight Attendant">Flight Attendant</option>
                                <option value="government">Government service</option>
                                <option value="Government Employee">Government Employee</option>
                                <option value="Health Care Professional">Health Care Professional</option>
                                <option value="Home Maker">Home Maker</option>
                                <option value="Hotel &amp; Restaurant Professional">Hotel &amp; Restaurant Professional
                                </option>
                                <option value="HR Professional">HR Professional</option>
                                <option value="Interior Designer">Interior Designer</option>
                                <option value="IT/Telecom Profession">IT/Telecom Profession</option>
                                <option value="Investment Professional">Investment Professional</option>
                                <option value="Journalist">Journalist</option>
                                <option value="Legal Professional">Legal Professional</option>
                                <option value="Lawyer">Lawyer</option>
                                <option value="Lecturer">Lecturer</option>
                                <option value="Manager">Manager</option>
                                <option value="Marketing Professional">Marketing Professional</option>
                                <option value="Media Professional">Media Professional</option>
                                <option value="Medical Professional">Medical Professional</option>
                                <option value="Merchandiser">Merchandiser</option>
                                <option value="Merchant Naval Officer">Merchant Naval Officer</option>
                                <option value="Medical Transcriptionist">Medical Transcriptionist</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Not Working">Not Working</option>
                                <option value="Non-mainstream professional">Non-mainstream professional</option>
                                <option value="Occupational Therapist">Occupational Therapist</option>
                                <option value="Others">Others</option>
                                <option value="Pharmacist">Pharmacist</option>
                                <option value="Physician Assistant">Physician Assistant</option>
                                <option value="Private Service">Private Service</option>
                                <option value="Production Professional">Production Professional</option>
                                <option value="Professor">Professor</option>
                                <option value="Public Relations Professional">Public Relations Professional</option>
                                <option value="Physiotherapist">Physiotherapist</option>
                                <option value="Politician">Politician</option>
                                <option value="Physicist">Physicist</option>
                                <option value="Pilot">Pilot</option>
                                <option value="Real Estate Professional">Real Estate Professional</option>
                                <option value="Research Scholar">Research Scholar</option>
                                <option value="Retail Professional">Retail Professional</option>
                                <option value="Retired Person">Retired Person</option>
                                <option value="Scientist">Scientist</option>
                                <option value="Sales Professional">Sales Professional</option>
                                <option value="Software Consuitant">Software Consuitant</option>
                                <option value="Sports Man">Sports Man</option>
                                <option value="Self-employed person">Self-employed person</option>
                                <option value="Social Worker">Social Worker</option>
                                <option value="Student">Student</option>
                                <option value="Technician">Technician</option>
                                <option value="Training Professional">Training Professional</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Transportation">Transportation professional</option>
                                <option value="Voiunteer">Voiunteer</option>
                                <option value="Veterinary Doctor">Veterinary Doctor</option>
                                <option value="Working Abroad">Working Abroad</option>
                                <option value="Writer">Writer</option>
                                <option value="Zoologist">Zoologist</option>
                            </select>
                        </div>
                        <div
                            class="col-sm-6 col-md-6 col-lg-1 d-flex align-items-center d-flex justify-content-center">
                            <button class="btn btn-sm btn-block btn-primary" id="searchButton">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById("searchForm");
        const searchButton = document.getElementById("searchButton");

        searchForm.addEventListener("submit", function(event) {
            event.preventDefault();

            @if (Auth::check())
                // User is authenticated, allow the form submission
                this.submit();
            @else
                // User is not authenticated, show the login modal
                $("#myModal").modal("show");
            @endif
        });
    });
</script>

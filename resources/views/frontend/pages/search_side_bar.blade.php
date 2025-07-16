<div class="card">
	<form class="" action="{{ route('search_groom_bride')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="card-body p-2" style="background-color: #91d2ab3b;">
		<div class="refine-search-section shadow p-2" >
			<div >                            
				<span >Search Profile</span>
			</div>
			<div >
				<div class="row">
				<div class="col-md-6">
					<div>
						<label class="search-label text-dark mb-0">Looking for :</label>
					</div>
					<div>
						<select class="form-control-sm w-100" name="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>

					<div class="col-md-6">
						<div>
							<label class="search-label text-dark mb-0">Marital Status</label>
						</div>
						<select class="form-control-sm w-100" name="marital_status">
							<option value="Never_Married">Never Married</option>
                            <option value="Legally_Separated">Legally Separated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Anulled">Anulled</option>
						</select>
					</div>

				</div>
				<div style="margin-top: 10px;">
					<div>
						<label class="search-label text-dark mb-0">Age (MIN - MAX) :</label>
					</div>
					<div>
						<select class="form-control-sm age_limit w-50" name="minAge">
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
						<select class="form-control-sm age_limit w-50" name="maxAge" style="float: right;">
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
				
				<div style="margin-top: 10px;">
					<div>
						<label class="search-label text-dark mb-0">Religion :</label>
					</div>
					<div>
						<select class="form-control-sm w-100" name="relegion">
							<option value="">Select Religion </option>
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
				</div>
				<div style="margin-top: 10px;">
					<div>
						<label class="search-label text-dark mb-0">Profession:</label>
					</div>
					<div>
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
                            <option value="Hotel &amp; Restaurant Professional">Hotel &amp; Restaurant Professional</option>
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
				</div>
				<div style="margin-top: 10px;">
					<div>
						<button id="btnSearch" ng-click="search()" class="btn btn-success">Search</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
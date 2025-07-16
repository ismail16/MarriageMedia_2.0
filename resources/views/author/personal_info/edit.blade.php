@extends('author.layouts.master')
@section('title','Edit Personal Info')
@section('content')
@php include(app_path().'/data/temp_data.php'); @endphp
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9 pl-0">
                <div class="card mt-2 mb-2 bg-light-green">
                    @if ($errors->any())
                    <div class="alert">
                        @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{ $error }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="card-header pb-0 pt-2">
                        <h4>Edit Personal Info</h4>
                    </div>
                    <form method="post" action="{{ route('member.personal-info.update',$PersonalInfo->id ) }}" class="">
                        @method('PUT')
                        @csrf
                        <input type="hidden" value="{{ $PersonalInfo->user_id }}" name="user_id">
                        <div class="card-body pt-2 pb-1">
                            <h5 class="border-bottom">About Me and My Family(short)*</h5>
                            <div class="row bg-body-green">
                                <div class="col-md-12 pt-2">
                                    <div class="other-area">
                                        <textarea class="form-control-sm w-100" name="about_me_family" required>{{ $PersonalInfo->about_me_family }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <h5 class="border-bottom">Education and Profession</h5>
                            <div class="row bg-body-green">
                                <div class="col-md-4">
                                    <div class="other-area">
                                        <div class="form-group ">
                                            <label class="form-label mb-0" for="education_level">Education Level *</label>
                                            <select class="form-control-sm w-100" name="education_level">
                                                <option value="M_A" {{ $PersonalInfo->education_level=='M_A'?'selected':'' }}>M A</option>
                                                <option class="High_School_pass" {{ $PersonalInfo->education_level=='High_School_pass'?'selected':'' }}>High School pass</option>
                                                <option value="SSC" {{ $PersonalInfo->education_level=='SSC'?'selected':'' }}>SSC</option>
                                                <option value="HSC" {{ $PersonalInfo->education_level=='HSC'?'selected':'' }}>HSC</option>
                                                <option value="BA" {{ $PersonalInfo->education_level=='BA'?'selected':'' }}>BA</option>
                                                <option value="Dakhil" {{ $PersonalInfo->education_level=='Dakhil'?'selected':'' }}>Dakhil</option>
                                                <option value="Alim" {{ $PersonalInfo->education_level=='Alim'?'selected':'' }}>Alim</option>
                                                <option value="BSc" {{ $PersonalInfo->education_level=='BSc'?'selected':'' }}>BSc</option>
                                                <option value="MBBS" {{ $PersonalInfo->education_level=='MBBS'?'selected':'' }}>MBBS</option>
                                                <option value="Msc" {{ $PersonalInfo->education_level=='Msc'?'selected':'' }}>Msc</option>
                                                <option value="EEE" {{ $PersonalInfo->education_level=='EEE'?'selected':'' }}>EEE</option>
                                                <option value="BBA" {{ $PersonalInfo->education_level=='BBA'?'selected':'' }}>BBA</option>
                                                <option value="MBA" {{ $PersonalInfo->education_level=='MBA'?'selected':'' }}>MBA</option>
                                                <option value="Others" {{ $PersonalInfo->education_level=='Others'?'selected':'' }}>Others</option>
                                                <option value="Associates_Degree" {{ $PersonalInfo->education_level=='Associates_Degree'?'selected':'' }}>Associates Degree</option>
                                                <option value="Bachelor" {{ $PersonalInfo->education_level=='Bachelor'?'selected':'' }}>Bachelor</option>
                                                <option value="Diploma" {{ $PersonalInfo->education_level=='Diploma'?'selected':'' }}>Diploma</option>
                                                <option value="Doctorate" {{ $PersonalInfo->education_level=='Doctorate'?'selected':'' }}>Doctorate</option>
                                                <option value="Less_Than_High_School" {{ $PersonalInfo->education_level=='Less_Than_High_School'?'selected':'' }}>Less Than High School</option>
                                                <option value="Masters" {{ $PersonalInfo->education_level=='Masters'?'selected':'' }}>Masters</option>
                                                <option value="M_Phil" {{ $PersonalInfo->education_level=='M_Phil'?'selected':'' }}>M.Phil</option>
                                                <option value="Trade_School" {{ $PersonalInfo->education_level=='Trade_School'?'selected':'' }}>Trade School</option>
                                                <option value="Undergraduate" {{ $PersonalInfo->education_level=='Undergraduate'?'selected':'' }}>Undergraduate</option>
                                                <option value="Graduate" {{ $PersonalInfo->education_level=='Graduate'?'selected':'' }}>Graduate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="major_subject">Major Subject *</label>
                                        <select class="form-control-sm w-100" name="major_subject">
                                            <option value="IT" {{ $PersonalInfo->major_subject=='IT'?'selected':'' }}>IT</option>
                                            <option value="Accounting" {{ $PersonalInfo->major_subject=='Accounting'?'selected':'' }}>Accounting</option>
                                            <option value="English" {{ $PersonalInfo->major_subject=='English'?'selected':'' }}>English</option>
                                            <option value="Physics" {{ $PersonalInfo->major_subject=='Physics'?'selected':'' }}>Physics</option>
                                            <option value="Bangla" {{ $PersonalInfo->major_subject=='Bangla'?'selected':'' }}>Bangla</option>
                                            <option value="Management" {{ $PersonalInfo->major_subject=='Management'?'selected':'' }}>Management</option>
                                            <option value="Finance" {{ $PersonalInfo->major_subject=='Finance'?'selected':'' }}>Finance</option>
                                            <option value="Science" {{ $PersonalInfo->major_subject=='Science'?'selected':'' }}>Science</option>
                                            <option value="Accounting_Information_System" {{ $PersonalInfo->major_subject=='Accounting_Information_System'?'selected':'' }}>Accounting &amp; Information System</option>
                                            <option value="Advertising" {{ $PersonalInfo->major_subject=='Advertising'?'selected':'' }}>Advertising</option>
                                            <option value="Administrative_Service" {{ $PersonalInfo->major_subject=='Administrative_Service'?'selected':'' }}>Administrative Service</option>
                                            <option value="Agriculture" {{ $PersonalInfo->major_subject=='Agriculture'?'selected':'' }}>Agriculture</option>
                                            <option value="Marketing" {{ $PersonalInfo->major_subject=='Marketing'?'selected':'' }}>Marketing</option>
                                            <option value="Applied_Physics" {{ $PersonalInfo->major_subject=='Applied_Physics'?'selected':'' }}>Applied Physics</option>
                                            <option value="Arabic" {{ $PersonalInfo->major_subject=='Arabic'?'selected':'' }}>Arabic</option>
                                            <option value="Anthropology" {{ $PersonalInfo->major_subject=='Anthropology'?'selected':'' }}>Anthropology</option>
                                            <option value="Applied_Chemistry_Chemical_Engineering" {{ $PersonalInfo->major_subject=='Applied_Chemistry_Chemical_Engineering'?'selected':'' }}>Applied Chemistry &amp; Chemical Engineering</option>
                                            <option value="Anesthesia" {{ $PersonalInfo->major_subject=='Anesthesia'?'selected':'' }}>Anesthesia</option>
                                            <option value="Architecture" {{ $PersonalInfo->major_subject=='Architecture'?'selected':'' }}>Architecture</option>
                                            <option value="Armed_Forces" {{ $PersonalInfo->major_subject=='Armed_Forces'?'selected':'' }}>Armed Forces</option>
                                            <option value="Arts" {{ $PersonalInfo->major_subject=='Arts'?'selected':'' }}>Arts</option>
                                            <option value="Audit" {{ $PersonalInfo->major_subject=='Audit'?'selected':'' }}>Audit</option>
                                            <option value="Architecture_Interior_Design_Technology" {{ $PersonalInfo->major_subject=='Architecture_Interior_Design_Technology'?'selected':'' }}>Architecture &amp; Interior Design Technology</option>
                                            <option value="Architecture" {{ $PersonalInfo->major_subject=='Architecture'?'selected':'' }}>Architecture</option>
                                            <option value="Auto_Mobile_Technology" {{ $PersonalInfo->major_subject=='Auto_Mobile_Technology'?'selected':'' }}>Auto Mobile Technology</option>
                                            <option value="Aircraft_Maintenance_(Avionics)_Technology" {{ $PersonalInfo->major_subject=='Aircraft_Maintenance_(Avionics)_Technology'?'selected':'' }}>Aircraft Maintenance (Avionics)Technology</option>
                                            <option value="Aircraft_Maintenance_(Aerospace)_Technology" {{ $PersonalInfo->major_subject=='Aircraft_Maintenance_(Aerospace)_Technology'?'selected':'' }}>Aircraft Maintenance (Aerospace)Technology</option>
                                            <option value="Bengali_Literature" {{ $PersonalInfo->major_subject=='Bengali_Literature'?'selected':'' }}>Bengali Literature</option>
                                            <option value="Biomedical_Physics_Technology" {{ $PersonalInfo->major_subject=='Biomedical_Physics_Technology'?'selected':'' }}>Biomedical Physics Technology</option>
                                            <option value="Banking" {{ $PersonalInfo->major_subject=='Banking'?'selected':'' }}>Banking</option>
                                            <option value="Botany" {{ $PersonalInfo->major_subject=='Botany'?'selected':'' }}>Botany</option>
                                            <option value="Bio_Chemistry_Technology" {{ $PersonalInfo->major_subject=='Bio_Chemistry_Technology'?'selected':'' }}>Bio-Chemistry Technology</option>
                                            <option value="Bio_Technology" {{ $PersonalInfo->major_subject=='Bio_Technology'?'selected':'' }}>Bio- Technology</option>
                                            <option value="Business_Studies" {{ $PersonalInfo->major_subject=='Business_Studies'?'selected':'' }}>Business Studies</option>
                                            <option value="Ceramic_Technology" {{ $PersonalInfo->major_subject=='Ceramic_Technology'?'selected':'' }}>Ceramic Technology</option>
                                            <option value="Crafts" {{ $PersonalInfo->major_subject=='Crafts'?'selected':'' }}>Crafts</option>
                                            <option value="Chartered_Accountant" {{ $PersonalInfo->major_subject=='Chartered_Accountant'?'selected':'' }}>Chartered Accountant</option>
                                            <option value="Commerce" {{ $PersonalInfo->major_subject=='Commerce'?'selected':'' }}>Commerce</option>
                                            <option value="Computer/IT" {{ $PersonalInfo->major_subject=='Computer/IT'?'selected':'' }}>Computer/ IT</option>
                                            <option value="Computer_Science_Engineer" {{ $PersonalInfo->major_subject=='Computer_Science_Engineer'?'selected':'' }}>Computer Science &amp; Engineer</option>
                                            <option value="Compute_Science_Technology" {{ $PersonalInfo->major_subject=='Compute_Science_Technology'?'selected':'' }}>Computer Science &amp; Technology</option>
                                            <option value="Construction_Technology" {{ $PersonalInfo->major_subject=='Construction_Technology'?'selected':'' }}>Construction Technology</option>
                                            <option value="Clinical_Psychology" {{ $PersonalInfo->major_subject=='Clinical_Psychology'?'selected':'' }}>Clinical Psychology</option>
                                            <option value="Criminology_Criminal_Justice" {{ $PersonalInfo->major_subject=='Criminology_Criminal_Justice'?'selected':'' }}>Criminology &amp; Criminal Justice</option>
                                            <option value="Cost_Accounting" {{ $PersonalInfo->major_subject=='Cost_Accounting'?'selected':'' }}>Cost Accounting</option>
                                            <option value="Civil_Technology" {{ $PersonalInfo->major_subject=='Civil_Technology'?'selected':'' }}>Civil Technology</option>
                                            <option value="ental_Surgery" {{ $PersonalInfo->major_subject=='ental_Surgery'?'selected':'' }}>Dental Surgery</option>
                                            <option value="Data_Telecommunication_Networking" {{ $PersonalInfo->major_subject=='Data_Telecommunication_Networking'?'selected':'' }}>Data Telecommunication &amp; Networking</option>
                                            <option value="Development_Studies" {{ $PersonalInfo->major_subject=='Development_Studies'?'selected':'' }}>Development Studies</option>
                                            <option value="Drawing_Painting" {{ $PersonalInfo->major_subject=='Drawing_Painting'?'selected':'' }}>Drawing &amp; Painting</option>
                                            <option value="Disaster_Science_Management" {{ $PersonalInfo->major_subject=='Disaster_Science_Management'?'selected':'' }}>Disaster Science &amp; Management</option>
                                            <option value="Education" {{ $PersonalInfo->major_subject=='Education'?'selected':'' }}>Education</option>
                                            <option value="Engineering/Technology" {{ $PersonalInfo->major_subject=='Engineering/Technology'?'selected':'' }}>Engineering/Technology</option>
                                            <option value="English_Lecture" {{ $PersonalInfo->major_subject=='English_Lecture'?'selected':'' }}>English Lecture</option>
                                            <option value="EWT" {{ $PersonalInfo->major_subject=='EWT'?'selected':'' }}>EWT</option>
                                            <option value="Economics" {{ $PersonalInfo->major_subject=='Economics'?'selected':'' }}>Economics</option>
                                            <option value="Environment_Technology" {{ $PersonalInfo->major_subject=='Environment_Technology'?'selected':'' }}>Environment Technology</option>
                                            <option value="Electrical_Technology" {{ $PersonalInfo->major_subject=='Electrical_Technology'?'selected':'' }}>Electrical Technology</option>
                                            <option value="Electronic_Technology" {{ $PersonalInfo->major_subject=='Electronic_Technology'?'selected':'' }}>Electronic Technology</option>
                                            <option value="Electra_Medical_Technology" {{ $PersonalInfo->major_subject=='Electra_Medical_Technology'?'selected':'' }}>Electra-Medical Technology</option>
                                            <option value="Fashion" {{ $PersonalInfo->major_subject=='Fashion'?'selected':'' }}>Fashion</option>
                                            <option value="Fine_Arts" {{ $PersonalInfo->major_subject=='Fine_Arts'?'selected':'' }}>Fine Arts</option>
                                            <option value="Forestry" {{ $PersonalInfo->major_subject=='Forestry'?'selected':'' }}>Forestry</option>
                                            <option value="Food_Technology" {{ $PersonalInfo->major_subject=='Food_Technology'?'selected':'' }}>Food Technology</option>
                                            <option value="Fisheries" {{ $PersonalInfo->major_subject=='Fisheries'?'selected':'' }}>Fisheries</option>
                                            <option value="Geography_Environment" {{ $PersonalInfo->major_subject=='Geography_Environment'?'selected':'' }}>Geography &amp; Environment</option>
                                            <option value="Geology" {{ $PersonalInfo->major_subject=='major_subject'?'selected':'' }}>Geology</option>
                                            <option value="Graphic_Design" {{ $PersonalInfo->major_subject=='Graphic_Design'?'selected':'' }}>Graphic Design</option>
                                            <option value="Genetic_Engineer_Bio-Technology" {{ $PersonalInfo->major_subject=='Genetic_Engineer_Bio'?'selected':'' }}>Genetic Engineer &amp; Bio-Technology</option>
                                            <option value="Glass_Technology" {{ $PersonalInfo->major_subject=='Glass_Technology'?'selected':'' }}>Glass Technology</option>
                                            <option value="Garments_Design_Pattern Making" {{ $PersonalInfo->major_subject=='Garments_Design_Pattern'?'selected':'' }}>Garments Design &amp; Pattern Making</option>
                                            <option value="Graphics_Reproduction_Printing_Technology" {{ $PersonalInfo->major_subject=='Graphics_Reproduction_Printing_Technology'?'selected':'' }}>Graphics Reproduction Printing Technology</option>
                                            <option value="Home_Science" {{ $PersonalInfo->major_subject=='Home_Science'?'selected':'' }}>Home Science</option>
                                            <option value="Human_Resource" {{ $PersonalInfo->major_subject=='Human_Resource'?'selected':'' }}>Human Resource</option>
                                            <option value="Hotel_Management" {{ $PersonalInfo->major_subject=='Hotel_Management'?'selected':'' }}>Hotel Management</option>
                                            <option value="Health_Technology_(Laboratory)" {{ $PersonalInfo->major_subject=='Health_Technology_(Laboratory)'?'selected':'' }}>Health Technology (Laboratory)</option>
                                            <option value="Health_Technology_(Dental)" {{ $PersonalInfo->major_subject=='Health_Technology_(Dental)'?'selected':'' }}>Health Technology (Dental)</option>
                                            <option value="History" {{ $PersonalInfo->major_subject=='History'?'selected':'' }}>History</option>
                                            <option value="International_Business" {{ $PersonalInfo->major_subject=='International_Business'?'selected':'' }}>International Business</option>
                                            <option value="Internal_Relations" {{ $PersonalInfo->major_subject=='Internal_Relations'?'selected':'' }}>Internal Relations</option>
                                            <option value="Islamic_Studies" {{ $PersonalInfo->major_subject=='Islamic_Studies'?'selected':'' }}>Islamic Studies</option>
                                            <option value="Islamic_History_Culture" {{ $PersonalInfo->major_subject=='Islamic_History_Culture'?'selected':'' }}>Islamic History &amp; Culture</option>
                                            <option value="Jute_Technology" {{ $PersonalInfo->major_subject=='Jute_Technology'?'selected':'' }}>Jute Technology</option>
                                            <option value="Law" {{ $PersonalInfo->major_subject=='Law'?'selected':'' }}>Law</option>
                                            <option value="Library" {{ $PersonalInfo->major_subject=='Library'?'selected':'' }}>Library</option>
                                            <option value="Linguistics" {{ $PersonalInfo->major_subject=='Linguistics'?'selected':'' }}>Linguistics</option>
                                            <option value="Mathematics" {{ $PersonalInfo->major_subject=='Mathematics'?'selected':'' }}>Mathematics</option>
                                            <option value="Marine_Technology" {{ $PersonalInfo->major_subject=='Marine_Technology'?'selected':'' }}>Marine Technology</option>
                                            <option value="Management_Information_System" {{ $PersonalInfo->major_subject=='Management_Information_System'?'selected':'' }}>Management Information System</option>
                                            <option value="Mass_Communication_Journalism" {{ $PersonalInfo->major_subject=='Mass_Communication_Journalism'?'selected':'' }}>Mass Communication &amp; Journalism</option>
                                            <option value="Mechanization_Technology" {{ $PersonalInfo->major_subject=='Mechanization_Technology'?'selected':'' }}>Mechanization Technology</option>
                                            <option value="Medical_Ultra_Sound" {{ $PersonalInfo->major_subject=='Medical_Ultra_Sound'?'selected':'' }}>Medical Ultra Sound</option>
                                            <option value="Medical_Education" {{ $PersonalInfo->major_subject=='Medical_Education'?'selected':'' }}>Medical Education</option>
                                            <option value="Mining_Mine_Survey_Technology" {{ $PersonalInfo->major_subject=='Mining_Mine_Survey_Technology'?'selected':'' }}>Mining &amp; Mine Survey Technology</option>
                                            <option value="Music" {{ $PersonalInfo->major_subject=='Music'?'selected':'' }}>Music</option>
                                            <option value="Nursing/Health_Science" {{ $PersonalInfo->major_subject=='Nursing/Health_Science'?'selected':'' }}>Nursing/Health Science</option>
                                            <option value="Oriental_Arts" {{ $PersonalInfo->major_subject=='Oriental_Arts'?'selected':'' }}>Oriental Arts</option>
                                            <option value="Occupation_Therapy" {{ $PersonalInfo->major_subject=='Occupation_Therapy'?'selected':'' }}>Occupation Therapy</option>
                                            <option value="Others" {{ $PersonalInfo->major_subject=='Others'?'selected':'' }}>Others</option>
                                            <option value="Travel_Tourism" {{ $PersonalInfo->major_subject=='Travel_Tourism'?'selected':'' }}>Travel &amp; Tourism</option>
                                            <option value="Zoology" {{ $PersonalInfo->major_subject=='Zoology'?'selected':'' }}>Zoology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="my_profession">My Profession *</label>
                                        <select class="form-control-sm w-100" name="my_profession">
                                            @foreach ($professions as $profession)
                                            <option value="{{ $profession['slug'] }}" {{ Auth::user()->profession ==  $profession['slug'] ?'selected':''}}>{{ $profession['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="job_title">Job Title (if any) </label>
                                        <input type="text" id="job_title" name="job_title" value="{{ $PersonalInfo->job_title }}" class="form-control-sm w-100" placeholder="Job Title...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="job_company_name">Job Company Name (if any)</label>
                                        <input type="text" id="job_company_name" name="job_company_name" value="{{ $PersonalInfo->job_company_name }}" class="form-control-sm w-100" placeholder="Company Name...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="income">My Income *</label>
                                        <select class="form-control-sm w-100" name="income">
                                            <option value="0_to_20K" {{ $PersonalInfo->income=='0_to_20K'?'selected':'' }}>Less than 20k</option>
                                            <option value="20k_to_30K" {{ $PersonalInfo->income=='20k_to_30K'?'selected':'' }}>20k to 30k</option>
                                            <option value="30k_to_50K" {{ $PersonalInfo->income=='30k_to_50K'?'selected':'' }}>30k to 50k</option>
                                            <option value="50k_to_70K" {{ $PersonalInfo->income=='50k_to_70K'?'selected':'' }}>50k to 70k</option>
                                            <option value="70k_to_90K" {{ $PersonalInfo->income=='70k_to_90K'?'selected':'' }}>70k to 90k</option>
                                            <option value="1_to_2_lac" {{ $PersonalInfo->income=='1_to_2_lac'?'selected':'' }}>1 to 2 Lacs</option>
                                            <option value="2_to_3_lacs" {{ $PersonalInfo->income=='2_to_3_lacs'?'selected':'' }}>2 to 5 Lacs</option>
                                            <option value="3_to_5_lacs" {{ $PersonalInfo->income=='3_to_5_lacs'?'selected':'' }}>5 to 10 Lacs</option>
                                            <option value="5_to_10_lacs" {{ $PersonalInfo->income=='5_to_10_lacs'?'selected':'' }}>5 to 10 Lacs</option>
                                            <option value="above_10_Lacs" {{ $PersonalInfo->income=='above_10_Lacs'?'selected':'' }}>More than 10 Lacs</option>
                                            <option value="No_Income" {{ $PersonalInfo->income=='No_Income'?'selected':'' }}>No Income</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="border-bottom pt-2">Present Address</h5>
                            <div class="row bg-off-pink bg-body-green">
                                <!-- <div class="col-sm-4">
                            <div class="form-group ">
                                <label class="form-label mb-0" for="district">Home District *</label>
                                <select class="form-control-sm w-100" name="district">
                                    <option value="Tangail" {{ $PersonalInfo->district=='Tangail'?'selected':'' }}>Tangail</option>
                                    <option value="Bagerhat" {{ $PersonalInfo->district=='Bagerhat'?'selected':'' }}>Bagerhat</option>
                                    <option value="Bandarban" {{ $PersonalInfo->district=='Bandarban'?'selected':'' }}>Bandarban</option>
                                    <option value="Barguna" {{ $PersonalInfo->district=='Barguna'?'selected':'' }}>Barguna</option>
                                    <option value="Barisal" {{ $PersonalInfo->district=='Barisal'?'selected':'' }}>Barisal</option>
                                    <option value="Bhola" {{ $PersonalInfo->district=='Bhola'?'selected':'' }}>Bhola</option>
                                    <option value="Bogra" {{ $PersonalInfo->district=='Bogra'?'selected':'' }}>Bogra</option>
                                    <option value="Brahmanbaria" {{ $PersonalInfo->district=='Brahmanbaria'?'selected':'' }}>Brahmanbaria</option>
                                    <option value="Chandpur" {{ $PersonalInfo->district=='Chandpur'?'selected':'' }}>Chandpur</option>
                                    <option value="Chittagong" {{ $PersonalInfo->district=='Chittagong'?'selected':'' }}>Chittagong</option>
                                    <option value="Chuadanga" {{ $PersonalInfo->district=='Chuadanga'?'selected':'' }}>Chuadanga</option>
                                    <option value="Comilla" {{ $PersonalInfo->district=='Comilla'?'selected':'' }}>Comilla</option>
                                    <option value="Coxs_Bazar" {{ $PersonalInfo->district=='Coxs_Bazar'?'selected':'' }}>Cox's Bazar</option>
                                    <option value="Dhaka" {{ $PersonalInfo->district=='Dhaka'?'selected':'' }}>Dhaka</option>
                                    <option value="Dinajpur" {{ $PersonalInfo->district=='Dinajpur'?'selected':'' }}>Dinajpur</option>
                                    <option value="Faridpur" {{ $PersonalInfo->district=='Faridpur'?'selected':'' }}>Faridpur</option>
                                    <option value="Feni" {{ $PersonalInfo->district=='Feni'?'selected':'' }}>Feni</option>
                                    <option value="Gaibandha" {{ $PersonalInfo->district=='Gaibandha'?'selected':'' }}>Gaibandha</option>
                                    <option value="Gazipur" {{ $PersonalInfo->district=='Gazipur'?'selected':'' }}>Gazipur</option>
                                    <option value="Gopalganj" {{ $PersonalInfo->district=='Gopalganj'?'selected':'' }}>Gopalganj</option>
                                    <option value="Habiganj" {{ $PersonalInfo->district=='Habiganj'?'selected':'' }}>Habiganj</option>
                                    <option value="Jamalpur" {{ $PersonalInfo->district=='Jamalpur'?'selected':'' }}>Jamalpur</option>
                                    <option value="Jessore" {{ $PersonalInfo->district=='Jessore'?'selected':'' }}>Jessore</option>
                                    <option value="Jhalokati" {{ $PersonalInfo->district=='Jhalokati'?'selected':'' }}>Jhalokati</option>
                                    <option value="Jhenaidah" {{ $PersonalInfo->district=='Jhenaidah'?'selected':'' }}>Jhenaidah</option>
                                    <option value="Joypurhat" {{ $PersonalInfo->district=='Joypurhat'?'selected':'' }}>Joypurhat</option>
                                    <option value="Khagrachari" {{ $PersonalInfo->district=='Khagrachari'?'selected':'' }}>Khagrachari</option>
                                    <option value="Khulna" {{ $PersonalInfo->district=='Khulna'?'selected':'' }}>Khulna</option>
                                    <option value="Kishoreganj" {{ $PersonalInfo->district=='Kishoreganj'?'selected':'' }}>Kishoreganj</option>
                                    <option value="Kurigram" {{ $PersonalInfo->district=='Kurigram'?'selected':'' }}>Kurigram</option>
                                    <option value="Kushtia" {{ $PersonalInfo->district=='Kushtia'?'selected':'' }}>Kushtia</option>
                                    <option value="Lakshmipur" {{ $PersonalInfo->district=='Lakshmipur'?'selected':'' }}>Lakshmipur</option>
                                    <option value="Lalmonirhat" {{ $PersonalInfo->district=='Lalmonirhat'?'selected':'' }}>Lalmonirhat</option>
                                    <option value="Madaripur" {{ $PersonalInfo->district=='Madaripur'?'selected':'' }}>Madaripur</option>
                                    <option value="Magura" {{ $PersonalInfo->district=='Magura'?'selected':'' }}>Magura</option>
                                    <option value="Manikganj" {{ $PersonalInfo->district=='Manikganj'?'selected':'' }}>Manikganj</option>
                                    <option value="Maulvibazar" {{ $PersonalInfo->district=='Maulvibazar'?'selected':'' }}>Maulvibazar</option>
                                    <option value="Meherpur" {{ $PersonalInfo->district=='Meherpur'?'selected':'' }}>Meherpur</option>
                                    <option value="Munshiganj" {{ $PersonalInfo->district=='Munshiganj'?'selected':'' }}>Munshiganj</option>
                                    <option value="Mymensingh" {{ $PersonalInfo->district=='Mymensingh'?'selected':'' }}>Mymensingh</option>
                                    <option value="Naogaon" {{ $PersonalInfo->district=='Naogaon'?'selected':'' }}>Naogaon</option>
                                    <option value="Narail" {{ $PersonalInfo->district=='Narail'?'selected':'' }}>Narail</option>
                                    <option value="Narayanganj" {{ $PersonalInfo->district=='Narayanganj'?'selected':'' }}>Narayanganj</option>
                                    <option value="Narsingdi" {{ $PersonalInfo->district=='Narsingdi'?'selected':'' }}>Narsingdi</option>
                                    <option value="Natore" {{ $PersonalInfo->district=='Natore'?'selected':'' }}>Natore</option>
                                    <option value="Nawabganj" {{ $PersonalInfo->district=='Nawabganj'?'selected':'' }}>Nawabganj</option>
                                    <option value="Netrokona" {{ $PersonalInfo->district=='Netrokona'?'selected':'' }}>Netrokona</option>
                                    <option value="Nilphamari" {{ $PersonalInfo->district=='Nilphamari'?'selected':'' }}>Nilphamari</option>
                                    <option value="Noakhali" {{ $PersonalInfo->district=='Noakhali'?'selected':'' }}>Noakhali</option>
                                    <option value="Pabna" {{ $PersonalInfo->district=='Pabna'?'selected':'' }}>Pabna</option>
                                    <option value="Panchagarh" {{ $PersonalInfo->district=='Panchagarh'?'selected':'' }}>Panchagarh</option>
                                    <option value="Patuakhali" {{ $PersonalInfo->district=='Patuakhali'?'selected':'' }}>Patuakhali</option>
                                    <option value="Pirojpur" {{ $PersonalInfo->district=='Pirojpur'?'selected':'' }}>Pirojpur</option>
                                    <option value="Rajbari" {{ $PersonalInfo->district=='Rajbari'?'selected':'' }}>Rajbari</option>
                                    <option value="Rajshahi" {{ $PersonalInfo->district=='Rajshahi'?'selected':'' }}>Rajshahi</option>
                                    <option value="Rangamati" {{ $PersonalInfo->district=='Rangamati'?'selected':'' }}>Rangamati</option>
                                    <option value="Rangpur" {{ $PersonalInfo->district=='Rangpur'?'selected':'' }}>Rangpur</option>
                                    <option value="Satkhira" {{ $PersonalInfo->district=='Satkhira'?'selected':'' }}>Satkhira</option>
                                    <option value="Shariatpur" {{ $PersonalInfo->district=='Shariatpur'?'selected':'' }}>Shariatpur</option>
                                    <option value="Sherpur" {{ $PersonalInfo->district=='Sherpur'?'selected':'' }}>Sherpur</option>
                                    <option value="Sirajgonj" {{ $PersonalInfo->district=='Sirajgonj'?'selected':'' }}>Sirajgonj</option>
                                    <option value="Sunamganj" {{ $PersonalInfo->district=='Sunamganj'?'selected':'' }}>Sunamganj</option>
                                    <option value="Sylhet" {{ $PersonalInfo->district=='Sylhet'?'selected':'' }}>Sylhet</option>
                                    <option value="Thakurgaon" {{ $PersonalInfo->district=='Thakurgaon'?'selected':'' }}>Thakurgaon</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label class="form-label mb-0" for="thana">Thana *</label>
                                <input type="text" id="thana" class="form-control-sm w-100" name="thana" value="{{ $PersonalInfo->thana }}" placeholder="Thana Name...">
                            </div>
                        </div> -->


                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="country_of_residence">Country of Residence *</label>
                                        <select class="form-control-sm w-100" name="country_of_residence">
                                            <option value="Bangladesh" {{ $PersonalInfo->district=='Bangladesh'?'selected':'' }}>Bangladesh</option>
                                            <option value="UK" {{ $PersonalInfo->district=='UK'?'selected':'' }}>United Kingdom</option>
                                            <option value="USA" {{ $PersonalInfo->district=='USA'?'selected':'' }}>United States</option>
                                            <option value="Canada" {{ $PersonalInfo->district=='Canada'?'selected':'' }}>Canada</option>
                                            <option value="Australia" {{ $PersonalInfo->district=='Australia'?'selected':'' }}>Australia</option>
                                            <option value="Spain" {{ $PersonalInfo->district=='Spain'?'selected':'' }}>Spain</option>
                                            <option value="Sweden" {{ $PersonalInfo->district=='Sweden'?'selected':'' }}>Sweden</option>
                                            <option value="Austria" {{ $PersonalInfo->district=='Austria'?'selected':'' }}>Austria</option>
                                            <option value="India" {{ $PersonalInfo->district=='India'?'selected':'' }}>India</option>
                                            <option value="Pakistan" {{ $PersonalInfo->district=='Pakistan'?'selected':'' }}>Pakistan</option>
                                            <option value="Cyprus" {{ $PersonalInfo->district=='Cyprus'?'selected':'' }}>Cyprus</option>
                                            <option value="Denmark" {{ $PersonalInfo->district=='Denmark'?'selected':'' }}>Denmark</option>
                                            <option value="Finland" {{ $PersonalInfo->district=='Finland'?'selected':'' }}>Finland</option>
                                            <option value="France" {{ $PersonalInfo->district=='France'?'selected':'' }}>France</option>
                                            <option value="Germany" {{ $PersonalInfo->district=='Germany'?'selected':'' }}>Germany</option>
                                            <option value="Greece" {{ $PersonalInfo->district=='Greece'?'selected':'' }}>Greece</option>
                                            <option value="Ireland" {{ $PersonalInfo->district=='Ireland'?'selected':'' }}>Ireland</option>
                                            <option value="Italy" {{ $PersonalInfo->district=='Italy'?'selected':'' }}>Italy</option>
                                            <option value="Japan" {{ $PersonalInfo->district=='Japan'?'selected':'' }}>Japan</option>
                                            <option value="Kuwait" {{ $PersonalInfo->district=='Kuwait'?'selected':'' }}>Kuwait</option>
                                            <option value="Malaysia" {{ $PersonalInfo->district=='Malaysia'?'selected':'' }}>Malaysia</option>
                                            <option value="Maldives" {{ $PersonalInfo->district=='Maldives'?'selected':'' }}>Maldives</option>
                                            <option value="New_Zealand" {{ $PersonalInfo->district=='New_Zealand'?'selected':'' }}>New Zealand</option>
                                            <option value="Nigeria" {{ $PersonalInfo->district=='Nigeria'?'selected':'' }}>Nigeria</option>
                                            <option value="Oman" {{ $PersonalInfo->district=='Oman'?'selected':'' }}>Oman</option>
                                            <option value="Poland" {{ $PersonalInfo->district=='Poland'?'selected':'' }}>Poland</option>
                                            <option value="Qatar" {{ $PersonalInfo->district=='Qatar'?'selected':'' }}>Qatar</option>
                                            <option value="Saudi_Arabia" {{ $PersonalInfo->district=='Saudi_Arabia'?'selected':'' }}>Saudi Arabia</option>
                                            <option value="Singapore" {{ $PersonalInfo->district=='Singapore'?'selected':'' }}>Singapore</option>
                                            <option value="South_Africa" {{ $PersonalInfo->district=='South_Africa'?'selected':'' }}>South Africa</option>
                                            <option value="South_Korea" {{ $PersonalInfo->district=='South_Korea'?'selected':'' }}>South Korea</option>
                                            <option value="Thailand" {{ $PersonalInfo->district=='Thailand'?'selected':'' }}>Thailand</option>
                                            <option value="United_Arab_Emirates" {{ $PersonalInfo->district=='United_Arab_Emirates'?'selected':'' }}>United Arab Emirates</option>
                                            <option value="Bahrain" {{ $PersonalInfo->district=='Bahrain'?'selected':'' }}>Bahrain</option>
                                            <option value="Brazil" {{ $PersonalInfo->district=='Brazil'?'selected':'' }}>Brazil</option>
                                            <option value="Other" {{ $PersonalInfo->district=='Other'?'selected':'' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="height">State / City / Division of Residence *</label>
                                        <input type="text" id="state_of_residence" class="form-control-sm w-100" name="state_of_residence" value="{{ $PersonalInfo->state_of_residence }}" placeholder="State / Division...">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="citizenship">Citizenship *</label>
                                        <select class="form-control-sm w-100" name="citizenship">
                                            <option value="Bangladeshi" {{ $PersonalInfo->citizenship=='Bangladeshi'?'selected':'' }}>Bangladeshi</option>
                                            <option value="Indian" {{ $PersonalInfo->citizenship=='Indian'?'selected':'' }}>Indian</option>
                                            <option value="Canada" {{ $PersonalInfo->citizenship=='Canada'?'selected':'' }}>Canada</option>
                                            <option value="USA" {{ $PersonalInfo->citizenship=='USA'?'selected':'' }}>USA</option>
                                            <option value="UK" {{ $PersonalInfo->citizenship=='UK'?'selected':'' }}>UK</option>
                                            <option value="Germany" {{ $PersonalInfo->citizenship=='Germany'?'selected':'' }}>Germany</option>
                                            <option value="Italy" {{ $PersonalInfo->citizenship=='Italy'?'selected':'' }}>Italy</option>
                                            <option value="Spain" {{ $PersonalInfo->citizenship=='Spain'?'selected':'' }}>Spain</option>
                                            <option value="Sweden" {{ $PersonalInfo->citizenship=='Sweden'?'selected':'' }}>Sweden</option>
                                            <option value="France" {{ $PersonalInfo->citizenship=='France'?'selected':'' }}>France</option>
                                            <option value="Cyprus" {{ $PersonalInfo->citizenship=='Cyprus'?'selected':'' }}>Cyprus</option>
                                            <option value="Denmark" {{ $PersonalInfo->citizenship=='Denmark'?'selected':'' }}>Denmark</option>
                                            <option value="Finland" {{ $PersonalInfo->citizenship=='Finland'?'selected':'' }}>Finland</option>
                                            <option value="Greece" {{ $PersonalInfo->citizenship=='Greece'?'selected':'' }}>Greece</option>
                                            <option value="Ireland" {{ $PersonalInfo->citizenship=='Ireland'?'selected':'' }}>Ireland</option>
                                            <option value="Japan" {{ $PersonalInfo->citizenship=='Japan'?'selected':'' }}>Japan</option>
                                            <option value="Kuwait" {{ $PersonalInfo->citizenship=='Kuwait'?'selected':'' }}>Kuwait</option>
                                            <option value="Malaysia" {{ $PersonalInfo->citizenship=='Malaysia'?'selected':'' }}>Malaysia</option>
                                            <option value="Maldives" {{ $PersonalInfo->citizenship=='Maldives'?'selected':'' }}>Maldives</option>
                                            <option value="NewZealand" {{ $PersonalInfo->citizenship=='NewZealand'?'selected':'' }}>New Zealand</option>
                                            <option value="Nigeria" {{ $PersonalInfo->citizenship=='Nigeria'?'selected':'' }}>Nigeria</option>
                                            <option value="Oman" {{ $PersonalInfo->citizenship=='Oman'?'selected':'' }}>Oman</option>
                                            <option value="Poland" {{ $PersonalInfo->citizenship=='Poland'?'selected':'' }}>Poland</option>
                                            <option value="Qatar" {{ $PersonalInfo->citizenship=='Qatar'?'selected':'' }}>Qatar</option>
                                            <option value="SaudiArabia" {{ $PersonalInfo->citizenship=='SaudiArabia'?'selected':'' }}>Saudi Arabia</option>
                                            <option value="Singapore" {{ $PersonalInfo->citizenship=='Singapore'?'selected':'' }}>Singapore</option>
                                            <option value="Other" {{ $PersonalInfo->citizenship=='Other'?'selected':'' }}>Other</option>
                                            <option value="SouthAfrica" {{ $PersonalInfo->citizenship=='SouthAfrica'?'selected':'' }}>South Africa</option>
                                            <option value="SouthKorea" {{ $PersonalInfo->citizenship=='SouthKorea'?'selected':'' }}>South Korea</option>
                                            <option value="Thailand" {{ $PersonalInfo->citizenship=='Thailand'?'selected':'' }}>Thailand</option>
                                            <option value="UnitedArabEmirates" {{ $PersonalInfo->citizenship=='UnitedArabEmirates'?'selected':'' }}>United Arab Emirates</option>
                                            <option value="Pakistan" {{ $PersonalInfo->citizenship=='Pakistan'?'selected':'' }}>Pakistan</option>
                                            <option value="Australia" {{ $PersonalInfo->citizenship=='Australia'?'selected':'' }}>Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="zip_code">Zip Code</label>
                                        <input type="number" id="zip_code" class="form-control-sm w-100" name="zip_code" value="{{ $PersonalInfo->zip_code }}" placeholder="Zip Code...">
                                    </div>
                                </div>

                            </div>
                            <h5 class="border-bottom pt-2">Family Information</h5>
                            <div class="row bg-off-pink bg-body-green">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="father_name">Father's Name *</label>
                                        <input type="text" id="father_name" class="form-control-sm w-100" name="father_name" value="{{ $PersonalInfo->father_name }}" placeholder="Father's Name..." required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="father_occupation">Father's Occupation *</label>
                                        <select class="form-control-sm w-100" name="father_occupation">
                                            <option value="Business_man" {{ $PersonalInfo->father_occupation=='Business_man'?'selected':'' }}>Business man</option>
                                            <option value="Doctor" {{ $PersonalInfo->father_occupation=='Doctor'?'selected':'' }}>Doctor</option>
                                            <option value="Engineer" {{ $PersonalInfo->father_occupation=='Engineer'?'selected':'' }}>Engineer</option>
                                            <option value="Farmer" {{ $PersonalInfo->father_occupation=='Farmer'?'selected':'' }}>Farmer</option>
                                            <option value="Private_job_holder" {{ $PersonalInfo->father_occupation=='Private_job_holder'?'selected':'' }}>Private job holder</option>
                                            <option value="Government_job_holder" {{ $PersonalInfo->father_occupation=='Government_job_holder'?'selected':'' }}>Government job holder</option>
                                            <option value="Retired" {{ $PersonalInfo->father_occupation=='Retired'?'selected':'' }}>Retired</option>
                                            <option value="late" {{ $PersonalInfo->father_occupation=='late'?'selected':'' }}>Passed away (Died)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="mother_name">Mother's Name *</label>
                                        <input type="text" id="mother_name" class="form-control-sm w-100" name="mother_name" value="{{ $PersonalInfo->mother_name }}" placeholder="Mother's Name..." required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="mother_occupation">Mother's Occupation *</label>
                                        <select class="form-control-sm w-100" name="mother_occupation">
                                            <option value="Housewife" {{ $PersonalInfo->mother_occupation=='Housewife'?'selected':'' }}>Housewife</option>
                                            <option value="Business" {{ $PersonalInfo->mother_occupation=='Business'?'selected':'' }}>Business</option>
                                            <option value="Doctor" {{ $PersonalInfo->mother_occupation=='Doctor'?'selected':'' }}>Doctor</option>
                                            <option value="Engineer" {{ $PersonalInfo->mother_occupation=='Engineer'?'selected':'' }}>Engineer</option>
                                            <option value="Farmer" {{ $PersonalInfo->mother_occupation=='Farmer'?'selected':'' }}>Farmer</option>
                                            <option value="Private_job_holder" {{ $PersonalInfo->mother_occupation=='Private_job_holder'?'selected':'' }}>Private job holder</option>
                                            <option value="Government_job_holder" {{ $PersonalInfo->mother_occupation=='Government_job_holder'?'selected':'' }}>Government job holder</option>
                                            <option value="Retired" {{ $PersonalInfo->mother_occupation=='Retired'?'selected':'' }}>Retired</option>
                                            <option value="late" {{ $PersonalInfo->mother_occupation=='late'?'selected':'' }}>Passed away (Died)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="number_of_brother">Number of Brother(Without me) *</label>
                                        <select class="form-control-sm w-100" name="number_of_brother">
                                            <option value="0" {{ $PersonalInfo->number_of_brother=='0'?'selected':'' }}>0</option>
                                            <option value="1" {{ $PersonalInfo->number_of_brother=='1'?'selected':'' }}>1</option>
                                            <option value="2" {{ $PersonalInfo->number_of_brother=='2'?'selected':'' }}>2</option>
                                            <option value="3" {{ $PersonalInfo->number_of_brother=='3'?'selected':'' }}>3</option>
                                            <option value="4" {{ $PersonalInfo->number_of_brother=='4'?'selected':'' }}>4</option>
                                            <option value="5" {{ $PersonalInfo->number_of_brother=='5'?'selected':'' }}>5</option>
                                            <option value="6" {{ $PersonalInfo->number_of_brother=='6'?'selected':'' }}>6</option>
                                            <option value="7" {{ $PersonalInfo->number_of_brother=='7'?'selected':'' }}>7</option>
                                            <option value="8" {{ $PersonalInfo->number_of_brother=='8'?'selected':'' }}>8</option>
                                            <option value="9" {{ $PersonalInfo->number_of_brother=='8'?'selected':'' }}>9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="how_many_brother_married">How many brother Married? *</label>
                                        <select class="form-control-sm w-100" name="how_many_brother_married">
                                            <option value="0" {{ $PersonalInfo->how_many_brother_married=='0'?'selected':'' }}>0</option>
                                            <option value="1" {{ $PersonalInfo->how_many_brother_married=='1'?'selected':'' }}>1</option>
                                            <option value="2" {{ $PersonalInfo->how_many_brother_married=='2'?'selected':'' }}>2</option>
                                            <option value="3" {{ $PersonalInfo->how_many_brother_married=='3'?'selected':'' }}>3</option>
                                            <option value="4" {{ $PersonalInfo->how_many_brother_married=='4'?'selected':'' }}>4</option>
                                            <option value="5" {{ $PersonalInfo->how_many_brother_married=='5'?'selected':'' }}>5</option>
                                            <option value="6" {{ $PersonalInfo->how_many_brother_married=='6'?'selected':'' }}>6</option>
                                            <option value="7" {{ $PersonalInfo->how_many_brother_married=='7'?'selected':'' }}>7</option>
                                            <option value="8" {{ $PersonalInfo->how_many_brother_married=='8'?'selected':'' }}>8</option>
                                            <option value="9" {{ $PersonalInfo->how_many_brother_married=='8'?'selected':'' }}>9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="number_of_sister">Number of Sister(Without me) *</label>
                                        <select class="form-control-sm w-100" name="number_of_sister">
                                            <option value="0" {{ $PersonalInfo->number_of_sister=='0'?'selected':'' }}>0</option>
                                            <option value="1" {{ $PersonalInfo->number_of_sister=='1'?'selected':'' }}>1</option>
                                            <option value="2" {{ $PersonalInfo->number_of_sister=='2'?'selected':'' }}>2</option>
                                            <option value="3" {{ $PersonalInfo->number_of_sister=='3'?'selected':'' }}>3</option>
                                            <option value="4" {{ $PersonalInfo->number_of_sister=='4'?'selected':'' }}>4</option>
                                            <option value="5" {{ $PersonalInfo->number_of_sister=='5'?'selected':'' }}>5</option>
                                            <option value="6" {{ $PersonalInfo->number_of_sister=='6'?'selected':'' }}>6</option>
                                            <option value="7" {{ $PersonalInfo->number_of_sister=='7'?'selected':'' }}>7</option>
                                            <option value="8" {{ $PersonalInfo->number_of_sister=='8'?'selected':'' }}>8</option>
                                            <option value="9" {{ $PersonalInfo->number_of_sister=='8'?'selected':'' }}>9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="how_many_sister_married">How many sister Married? *</label>
                                        <select class="form-control-sm w-100" name="how_many_sister_married">
                                            <option value="0" {{ $PersonalInfo->how_many_sister_married=='0'?'selected':'' }}>0</option>
                                            <option value="1" {{ $PersonalInfo->how_many_sister_married=='1'?'selected':'' }}>1</option>
                                            <option value="2" {{ $PersonalInfo->how_many_sister_married=='2'?'selected':'' }}>2</option>
                                            <option value="3" {{ $PersonalInfo->how_many_sister_married=='3'?'selected':'' }}>3</option>
                                            <option value="4" {{ $PersonalInfo->how_many_sister_married=='4'?'selected':'' }}>4</option>
                                            <option value="5" {{ $PersonalInfo->how_many_sister_married=='5'?'selected':'' }}>5</option>
                                            <option value="6" {{ $PersonalInfo->how_many_sister_married=='6'?'selected':'' }}>6</option>
                                            <option value="7" {{ $PersonalInfo->how_many_sister_married=='7'?'selected':'' }}>7</option>
                                            <option value="8" {{ $PersonalInfo->how_many_sister_married=='8'?'selected':'' }}>8</option>
                                            <option value="9" {{ $PersonalInfo->how_many_sister_married=='8'?'selected':'' }}>9</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="border-bottom pt-2">Physical Information</h5>
                            <div class="row bg-off-pink bg-body-green">
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="height">My Height *</label>
                                        <select class="form-control-sm w-100" name="height">
                                            <option value="4.0" {{ $PersonalInfo->height=='4.0'?'selected':'' }}>4 Feet</option>
                                            <option value="4.1" {{ $PersonalInfo->height=='4.1'?'selected':'' }}>4 Feet 1 Inch</option>
                                            <option value="4.2" {{ $PersonalInfo->height=='4.2'?'selected':'' }}>4 Feet 2 Inch</option>
                                            <option value="4.3" {{ $PersonalInfo->height=='4.3'?'selected':'' }}>4 Feet 3 Inch</option>
                                            <option value="4.4" {{ $PersonalInfo->height=='4.4'?'selected':'' }}>4 Feet 4 Inch</option>
                                            <option value="4.5" {{ $PersonalInfo->height=='4.5'?'selected':'' }}>4 Feet 5 Inch</option>
                                            <option value="4.6" {{ $PersonalInfo->height=='4.6'?'selected':'' }}>4 Feet 6 Inch</option>
                                            <option value="4.7" {{ $PersonalInfo->height=='4.7'?'selected':'' }}>4 Feet 7 Inch</option>
                                            <option value="4.8" {{ $PersonalInfo->height=='4.8'?'selected':'' }}>4 Feet 8 Inch</option>
                                            <option value="4.9" {{ $PersonalInfo->height=='4.9'?'selected':'' }}>4 Feet 9 Inch</option>
                                            <option value="4.10" {{ $PersonalInfo->height=='4.10'?'selected':'' }}>4 Feet 10 Inch</option>
                                            <option value="4.11" {{ $PersonalInfo->height=='4.11'?'selected':'' }}>4 Feet 11 Inch</option>
                                            <option value="5.0" {{ $PersonalInfo->height=='5.0'?'selected':'' }}>5 Feet</option>
                                            <option value="5.1" {{ $PersonalInfo->height=='5.1'?'selected':'' }}>5 Feet 1 Inch</option>
                                            <option value="5.2" {{ $PersonalInfo->height=='5.2'?'selected':'' }}>5 Feet 2 Inch</option>
                                            <option value="5.3" {{ $PersonalInfo->height=='5.3'?'selected':'' }}>5 Feet 3 Inch</option>
                                            <option value="5.4" {{ $PersonalInfo->height=='5.4'?'selected':'' }}>5 Feet 4 Inch</option>
                                            <option value="5.5" {{ $PersonalInfo->height=='5.5'?'selected':'' }}>5 Feet 5 Inch</option>
                                            <option value="5.6" {{ $PersonalInfo->height=='5.6'?'selected':'' }}>5 Feet 6 Inch</option>
                                            <option value="5.7" {{ $PersonalInfo->height=='5.7'?'selected':'' }}>5 Feet 7 Inch</option>
                                            <option value="5.8" {{ $PersonalInfo->height=='5.8'?'selected':'' }}>5 Feet 8 Inch</option>
                                            <option value="5.9" {{ $PersonalInfo->height=='5.9'?'selected':'' }}>5 Feet 9 Inch</option>
                                            <option value="5.10" {{ $PersonalInfo->height=='5.10'?'selected':'' }}>5 Feet 10 Inch</option>
                                            <option value="5.11" {{ $PersonalInfo->height=='5.11'?'selected':'' }}>5 Feet 11 Inch</option>
                                            <option value="6.0" {{ $PersonalInfo->height=='6.0'?'selected':'' }}>6 Feet</option>
                                            <option value="6.1" {{ $PersonalInfo->height=='6.1'?'selected':'' }}>6 Feet 1 Inch</option>
                                            <option value="6.2" {{ $PersonalInfo->height=='6.2'?'selected':'' }}>6 Feet 2 Inch</option>
                                            <option value="6.3" {{ $PersonalInfo->height=='6.3'?'selected':'' }}>6 Feet 3 Inch</option>
                                            <option value="6.4" {{ $PersonalInfo->height=='6.4'?'selected':'' }}>6 Feet 4 Inch</option>
                                            <option value="6.5" {{ $PersonalInfo->height=='6.5'?'selected':'' }}>6 Feet 5 Inch</option>
                                            <option value="6.6" {{ $PersonalInfo->height=='6.6'?'selected':'' }}>6 Feet 6 Inch</option>
                                            <option value="6.7" {{ $PersonalInfo->height=='6.7'?'selected':'' }}>6 Feet 7 Inch</option>
                                            <option value="6.8" {{ $PersonalInfo->height=='6.8'?'selected':'' }}>6 Feet 8 Inch</option>
                                            <option value="6.9" {{ $PersonalInfo->height=='6.9'?'selected':'' }}>6 Feet 9 Inch</option>
                                            <option value="6.10" {{ $PersonalInfo->height=='6.10'?'selected':'' }}>6 Feet 10 Inch</option>
                                            <option value="6.11" {{ $PersonalInfo->height=='6.11'?'selected':'' }}>6 Feet 11 Inch</option>
                                            <option value="7.0" {{ $PersonalInfo->height=='7.0'?'selected':'' }}>7 Feet</option>
                                            <option value="7+" {{ $PersonalInfo->height=='7+'?'selected':'' }}>More than 7 Feet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="body_build">Weight(kg) *</label>
                                        <input type="number" id="weight" class="form-control-sm w-100" name="weight" value="{{ $PersonalInfo->weight }}" placeholder="Ex. 65">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="blood_group">Blood Group *</label>
                                        <select class="form-control-sm w-100" name="blood_group">
                                            <option value="B+" {{ $PersonalInfo->blood_group=='B+'?'selected':'' }}>B (+)ve</option>
                                            <option value="B-" {{ $PersonalInfo->blood_group=='B-'?'selected':'' }}>B (-)ve</option>
                                            <option value="A+" {{ $PersonalInfo->blood_group=='A+'?'selected':'' }}>A (+)ve</option>
                                            <option value="A-" {{ $PersonalInfo->blood_group=='A-'?'selected':'' }}>A (-)ve</option>
                                            <option value="AB+" {{ $PersonalInfo->blood_group=='AB+'?'selected':'' }}>AB (+)ve</option>
                                            <option value="AB-" {{ $PersonalInfo->blood_group=='AB-'?'selected':'' }}>AB (-)ve</option>
                                            <option value="O+" {{ $PersonalInfo->blood_group=='O+'?'selected':'' }}>O (+)ve</option>
                                            <option value="O-" {{ $PersonalInfo->blood_group=='O-'?'selected':'' }}>O (-)ve</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="other-area">
                                        <div class="form-group ">
                                            <label class="form-label mb-0" for="hair_color">My Hair Color *</label>
                                            <select class="form-control-sm w-100" name="hair_color">
                                                <option value="Black" {{ $PersonalInfo->hair_color=='Black'?'selected':'' }}>Black</option>
                                                <option value="Brown" {{ $PersonalInfo->hair_color=='Brown'?'selected':'' }}>Brown</option>
                                                <option value="White" {{ $PersonalInfo->hair_color=='White'?'selected':'' }}>White</option>
                                                <option value="Others" {{ $PersonalInfo->hair_color=='Others'?'selected':'' }}>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="other-area">
                                        <div class="form-group ">
                                            <label class="form-label mb-0" for="eye_color">My Eye Color *</label>
                                            <select class="form-control-sm w-100 change-with-other" name="eye_color">
                                                <option value="Black" {{ $PersonalInfo->eye_color=='Black'?'selected':'' }}>Black</option>
                                                <option value="Brown" {{ $PersonalInfo->eye_color=='Brown'?'selected':'' }}>Brown</option>
                                                <option value="White" {{ $PersonalInfo->eye_color=='White'?'selected':'' }}>White</option>
                                                <option value="Others" {{ $PersonalInfo->eye_color=='Others'?'selected':'' }}>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="other-area">
                                        <div class="form-group ">
                                            <label class="form-label mb-0" for="skin_color">My Skin Color *</label>
                                            <select class="form-control-sm w-100 change-with-other" name="skin_color">
                                                <option value="Fair" {{ $PersonalInfo->skin_color=='Fair'?'selected':'' }}>Fair</option>
                                                <option value="Black" {{ $PersonalInfo->skin_color=='Black'?'selected':'' }}>Black</option>
                                                <option value="Brown" {{ $PersonalInfo->skin_color=='Brown'?'selected':'' }}>Brown</option>
                                                <option value="Others" {{ $PersonalInfo->skin_color=='Others'?'selected':'' }}>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="border-bottom pt-2">Others</h5>
                            <div class="row bg-off-pink bg-body-green">
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="smoke_status">Do I smoke? *</label>
                                        <select class="form-control-sm w-100" name="smoke_status">
                                            <option value="No" {{ $PersonalInfo->smoke_status=='No'?'selected':'' }}="">No</option>
                                            <option value="Yes" {{ $PersonalInfo->smoke_status=='Yes'?'selected':'' }}>Yes</option>
                                            <option value="Sometimes" {{ $PersonalInfo->smoke_status=='Sometimes'?'selected':'' }}>Sometimes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="do_u_have_children">Do I addicted to alcohol? *</label>
                                        <select class="form-control-sm w-100" name="alcohol_status">
                                            <option value="No" {{ $PersonalInfo->alcohol_status=='No'?'selected':'' }}="">No</option>
                                            <option value="Yes" {{ $PersonalInfo->alcohol_status=='Yes'?'selected':'' }}>Yes</option>
                                            <option value="Sometimes" {{ $PersonalInfo->alcohol_status=='Sometimes'?'selected':'' }}>Sometimes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="other-area">
                                        <div class="form-group ">
                                            <label class="form-label mb-0" for="disabilities_status">Do I have any disabilities? *</label>
                                            <select class="form-control-sm w-100 change-with-other" name="disabilities_status">
                                                <option value="No" {{ $PersonalInfo->disabilities_status=='No'?'selected':'' }}="">No</option>
                                                <option value="Yes" {{ $PersonalInfo->disabilities_status=='Yes'?'selected':'' }}>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="do_u_have_children">Do you have children?</label>
                                        <select class="form-control-sm w-100" name="do_u_have_children">
                                            <option value="No" {{ $PersonalInfo->do_u_have_children=='No'?'selected':'' }}="">No</option>
                                            <option value="Yes" {{ $PersonalInfo->do_u_have_children=='Yes'?'selected':'' }}>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="hear_about_us">How did you know about us? *</label>
                                        <select class="form-control-sm w-100" name="hear_about_us">
                                            <option value="Google" {{ $PersonalInfo->hear_about_us=='Google'?'selected':'' }}>Google</option>
                                            <option value="Facebook" {{ $PersonalInfo->hear_about_us=='Facebook'?'selected':'' }}>Facebook</option>
                                            <option value="LinkedIn" {{ $PersonalInfo->hear_about_us=='LinkedIn'?'selected':'' }}>LinkedIn</option>
                                            <option value="Twitter" {{ $PersonalInfo->hear_about_us=='Twitter'?'selected':'' }}>Twitter</option>
                                            <option value="Newspaper" {{ $PersonalInfo->hear_about_us=='Newspaper'?'selected':'' }}>Newspaper</option>
                                            <option value="Blog" {{ $PersonalInfo->hear_about_us=='Blog'?'selected':'' }}>Blog</option>
                                            <option value="Friend" {{ $PersonalInfo->hear_about_us=='Friend'?'selected':'' }}>Friend</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="diat_status">Diet Status *</label>
                                        <select class="form-control-sm w-100" name="diat_status">
                                            <option value="Not_to_say" {{ $PersonalInfo->diat_status=='Not_to_say'?'selected':'' }}>Not to say</option>
                                            <option value="Vag" {{ $PersonalInfo->diat_status=='Vag'?'selected':'' }}>Vag</option>
                                            <option value="Non_Vag" {{ $PersonalInfo->diat_status=='Non_Vag'?'selected':'' }}>Non Vag</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-off-pink bg-body-green">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label mb-0" for="mother_tongue">Mother Tongue *</label>
                                        <select class="form-control-sm w-100" name="mother_tongue">
                                            <option value="Bangla" {{ $PersonalInfo->mother_tongue=='Bangla'?'selected':'' }}>Bangla</option>
                                            <option value="English" {{ $PersonalInfo->mother_tongue=='English'?'selected':'' }}>English</option>
                                            <option value="Hindi" {{ $PersonalInfo->mother_tongue=='Hindi'?'selected':'' }}>Hindi</option>
                                            <option value="Urdu" {{ $PersonalInfo->mother_tongue=='Urdu'?'selected':'' }}>Urdu</option>
                                            <option value="Arabic" {{ $PersonalInfo->mother_tongue=='Arabic'?'selected':'' }}>Arabic</option>
                                            <option value="German" {{ $PersonalInfo->mother_tongue=='German'?'selected':'' }}>German</option>
                                            <option value="Frence" {{ $PersonalInfo->mother_tongue=='Frence'?'selected':'' }}>Frence</option>
                                            <option value="Spanish" {{ $PersonalInfo->mother_tongue=='Spanish'?'selected':'' }}>Spanish</option>
                                            <option value="Others" {{ $PersonalInfo->mother_tongue=='Others'?'selected':'' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label mb-0" for="hear_about_us">Others Language i know *</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Bangla', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Bangla"> Bangla
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('English', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="English" checked=""> English
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Hindi', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Hindi"> Hindi
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Arabic', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Arabic"> Arabic
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Spanish', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Spanish"> Spanish
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('German', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="German"> German
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Italian', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Italian"> Italian
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Russian', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Russian"> Russian
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Urdu', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Urdu"> Urdu
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Dutch', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Dutch"> Dutch
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Persian', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Persian"> Persian
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Malay_based', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Malay_based"> Malay based
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Chinese', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Chinese"> Chinese
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('French', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="French"> French
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="can_speak[]" <?php if (in_array('Tamil', json_decode($PersonalInfo->can_speak))) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> value="Tamil"> Tamil
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-off-pink"> Back</button>
                            <button type="submit" class="btn btn-primary bg-off-pink float-right"><i class="fa fa-sync"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
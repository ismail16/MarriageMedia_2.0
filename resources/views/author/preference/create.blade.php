@extends('author.layouts.master')
@section('title','Set Preference')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9">
            <div class="card mt-2">
            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                    <span class="badge badge-danger">{{ $error }}</span>
                    @endforeach
                </div>
                @endif
            <form method="post" action="{{ route('member.preference.store') }}" class="">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">        
                <div class="card-body pt-2 bg-light-green">
                    <h5 class="border-bottom font-italic font-weight-bold pt-2">Basic Information</h5>
                    <div class="row bg-off-pink">
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Minimum Age *</label>
                                <input type="number" id="minAge" class="form-control-sm w-100" name="minAge" placeholder="Ex. 22" required>
                            </div>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Maximum Age *</label>
                                <input type="number" id="maxAge" class="form-control-sm w-100" name="maxAge" placeholder="Ex. 30" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="mb-0 form-label">Religion *</label>
                            <select class="form-control-sm w-100"  id="religion" name="religion" required>
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
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Family status *</label>
                                <select class="form-control-sm w-100 change-with-other" id="family_status" name="family_status[]" multiple required>
                                    <option value="Middle_class" selected>Middle Class</option>
                                    <option value="Upper_middle_class">Upper middle class</option>
                                    <option value="Lower_middle_class">Lower middle class</option>
                                    <option value="Upper_class">Upper Class</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="mb-0 form-label">Marital status *</label>
                            <select class="form-control-sm w-100 change-with-other" id="marital_status" name="marital_status[]" multiple required>
                                <option value="Never_Married" selected>Never Married</option>
                                <option value="Legally_Separated">Legally Separated</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Anulled">Anulled</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Allow Children?</label>
                                <select class="form-control-sm w-100" name="allow_children">
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Details you preferance(short)</label>
                                <textarea class="form-control-sm w-100" rows="2" cols="50" name="details_you_prefer">I am looking some one who should be Practicing Muslim, Loyal, Family oriented....(Specific Criteria that you want) </textarea>
                            </div>
                        </div>


                    </div>


                    <h5 class="border-bottom font-italic font-weight-bold pt-2">Physical Information</h5>
                    <div class="row bg-off-pink">
                        <div class="col-sm-3">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Min Height *</label>
                                <select class="form-control-sm w-100" name="minHeight" required>
                                    <option value="4.0">4 Feet</option>
                                    <option value="4.1">4 Feet 1 Inch</option>
                                    <option value="4.2">4 Feet 2 Inch</option>
                                    <option value="4.3">4 Feet 3 Inch</option>
                                    <option value="4.4">4 Feet 4 Inch</option>
                                    <option value="4.5">4 Feet 5 Inch</option>
                                    <option value="4.6">4 Feet 6 Inch</option>
                                    <option value="4.7">4 Feet 7 Inch</option>
                                    <option value="4.8">4 Feet 8 Inch</option>
                                    <option value="4.9">4 Feet 9 Inch</option>
                                    <option value="4.10">4 Feet 10 Inch</option>
                                    <option value="4.11">4 Feet 11 Inch</option>
                                    <option value="5.0">5 Feet</option>
                                    <option value="5.1">5 Feet 1 Inch</option>
                                    <option value="5.2">5 Feet 2 Inch</option>
                                    <option value="5.3" selected>5 Feet 3 Inch</option>
                                    <option value="5.4">5 Feet 4 Inch</option>
                                    <option value="5.5">5 Feet 5 Inch</option>
                                    <option value="5.6">5 Feet 6 Inch</option>
                                    <option value="5.7">5 Feet 7 Inch</option>
                                    <option value="5.8">5 Feet 8 Inch</option>
                                    <option value="5.9">5 Feet 9 Inch</option>
                                    <option value="5.10">5 Feet 10 Inch</option>
                                    <option value="5.11">5 Feet 11 Inch</option>
                                    <option value="6.0">6 Feet</option>
                                    <option value="6.1">6 Feet 1 Inch</option>
                                    <option value="6.2">6 Feet 2 Inch</option>
                                    <option value="6.3">6 Feet 3 Inch</option>
                                    <option value="6.4">6 Feet 4 Inch</option>
                                    <option value="6.5">6 Feet 5 Inch</option>
                                    <option value="6.6">6 Feet 6 Inch</option>
                                    <option value="6.7">6 Feet 7 Inch</option>
                                    <option value="6.8">6 Feet 8 Inch</option>
                                    <option value="6.9">6 Feet 9 Inch</option>
                                    <option value="6.10">6 Feet 10 Inch</option>
                                    <option value="7.0">6 Feet 10 Inch</option>
                                    <option value="7+">More than 7 Feet</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Max Height *</label>
                                <select class="form-control-sm w-100" name="maxHeight" required>
                                    <option value="4.0">4 Feet</option>
                                    <option value="4.1">4 Feet 1 Inch</option>
                                    <option value="4.2">4 Feet 2 Inch</option>
                                    <option value="4.3">4 Feet 3 Inch</option>
                                    <option value="4.4">4 Feet 4 Inch</option>
                                    <option value="4.5">4 Feet 5 Inch</option>
                                    <option value="4.6">4 Feet 6 Inch</option>
                                    <option value="4.7">4 Feet 7 Inch</option>
                                    <option value="4.8">4 Feet 8 Inch</option>
                                    <option value="4.9">4 Feet 9 Inch</option>
                                    <option value="4.10">4 Feet 10 Inch</option>
                                    <option value="4.11">4 Feet 11 Inch</option>
                                    <option value="5.0">5 Feet</option>
                                    <option value="5.1">5 Feet 1 Inch</option>
                                    <option value="5.2">5 Feet 2 Inch</option>
                                    <option value="5.3">5 Feet 3 Inch</option>
                                    <option value="5.4">5 Feet 4 Inch</option>
                                    <option value="5.5">5 Feet 5 Inch</option>
                                    <option value="5.6">5 Feet 6 Inch</option>
                                    <option value="5.7" selected>5 Feet 7 Inch</option>
                                    <option value="5.8">5 Feet 8 Inch</option>
                                    <option value="5.9">5 Feet 9 Inch</option>
                                    <option value="5.10">5 Feet 10 Inch</option>
                                    <option value="5.11">5 Feet 11 Inch</option>
                                    <option value="6.0">6 Feet</option>
                                    <option value="6.1">6 Feet 1 Inch</option>
                                    <option value="6.2">6 Feet 2 Inch</option>
                                    <option value="6.3">6 Feet 3 Inch</option>
                                    <option value="6.4">6 Feet 4 Inch</option>
                                    <option value="6.5">6 Feet 5 Inch</option>
                                    <option value="6.6">6 Feet 6 Inch</option>
                                    <option value="6.7">6 Feet 7 Inch</option>
                                    <option value="6.8">6 Feet 8 Inch</option>
                                    <option value="6.9">6 Feet 9 Inch</option>
                                    <option value="6.10">6 Feet 10 Inch</option>
                                    <option value="7.0">6 Feet 10 Inch</option>
                                    <option value="7+">More than 7 Feet</option>
                                </select >
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Min Weight(kg) *</label>
                                <input type="number" class="form-control-sm w-100" name="minWeight" placeholder="Ex. 50" required>
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Max Weight(kg) *</label>
                                <input type="number" class="form-control-sm w-100" name="maxWeight" placeholder="Ex. 65" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Blood Group *</label>
                                <select class="form-control-sm w-100 change-with-other" id="blood_group" name="blood_group[]" multiple required>
                                    <option value="Any" selected>Any</option>
                                    <option value="B+">B (+)ve</option>
                                    <option value="A+">A (+)ve</option>
                                    <option value="A-">A (-)ve</option>
                                    <option value="B-">B (-)ve</option>
                                    <option value="AB+">AB (+)ve</option>
                                    <option value="AB-">AB (-)ve</option>
                                    <option value="O+">O (+)ve</option>
                                    <option value="O-">O (-)ve</option>
                                </select>
                            </div>   
                        </div>
                        <div class="col-sm-6">              
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Skin Color *</label>
                                    <select class="form-control-sm w-100 change-with-other" id="skin_color" name="skin_color[]" multiple required>
                                       <option value="Very_Fair">Very Fair</option>
                                       <option value="Fair" selected>Fair</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Dark">Dark</option>
                                        <option value="Any">Any</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Hair Color *</label>
                                    <select class="form-control-sm w-100" name="hair_color" required>
                                        <option value="Black" selected>Black</option>
                                        <option value="Brown">Brown</option>
                                        <option value="White">White</option>
                                        <option value="Any">Any</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Eye Color *</label>
                                    <select class="form-control-sm w-100 change-with-other" name="eye_color" required>
                                        <option value="Black" selected>Black</option>
                                        <option value="Brown">Brown</option>
                                        <option value="White">White</option>
                                        <option value="Any">Any</option>
                                    </select>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Disabilities? *</label>
                                    <select class="form-control-sm w-100 change-with-other" name="disabilities_status" required>
                                        <option value="No" selected="">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="border-bottom font-italic font-weight-bold">Education and Profession</h5>
                    <div class="row bg-off-pink">
                        <div class="col-md-4">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Education Level *</label>
                                    <select class="form-control-sm w-100 change-with-other" id="education_level" name="education_level[]" multiple required>
                                        <option value="Any" selected>Any</option>
                                        <option value="M_A">M A</option>
                                        <option class="High_School_pass">High School pass</option>
                                        <option value="SSC">SSC</option>
                                        <option value="HSC">HSC</option>
                                        <option value="BA">BA</option>
                                        <option value="Dakhil">Dakhil</option>
                                        <option value="Alim">Alim</option>
                                        <option value="BSc">BSc</option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="Msc">Msc</option>
                                        <option value="EEE">EEE</option>
                                        <option value="BBA">BBA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="Others">Others</option>
                                        <option value="Associates_Degree">Associates Degree</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Doctorate">Doctorate</option>
                                        <option value="Less_Than_High_School">Less Than High School</option>
                                        <option value="Masters">Masters</option>
                                        <option value="MBA">MBA</option>
                                        <option value="M_Phil">M.Phil</option>
                                        <option value="Trade_School">Trade School</option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Graduate">Graduate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Major Subject *</label>
                                <select class="form-control-sm w-100 change-with-other" id="subject" name="subject[]" multiple required>
                                    <option value="Any" selected>Any</option>
                                    <option value="IT">IT</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="English">English</option>
                                    <option value="Physics">Physics</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="Management">Management</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Science">Science</option>
                                    <option value="Accounting_Information_System">Accounting &amp; Information System</option>
                                    <option value="Advertising">Advertising</option>
                                    <option value="Administrative_Service">Administrative Service</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Applied_Physics">Applied Physics</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Anthropology">Anthropology</option>
                                    <option value="Applied_Chemistry_Chemical_Engineering">Applied Chemistry &amp; Chemical Engineering</option>
                                    <option value="Anesthesia">Anesthesia</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Armed_Forces">Armed Forces</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Audit">Audit</option>
                                    <option value="Architecture_Interior_Design_Technology">Architecture &amp; Interior Design Technology</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Auto_Mobile_Technology">Auto Mobile  Technology</option>
                                    <option value="Aircraft_Maintenance_(Avionics)_Technology">Aircraft Maintenance (Avionics)Technology</option>
                                    <option value="Aircraft_Maintenance_(Aerospace)_Technology">Aircraft Maintenance (Aerospace)Technology</option>
                                    <option value="Bengali_Literature">Bengali Literature</option>
                                    <option value="Biomedical_Physics_Technology">Biomedical Physics Technology</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Botany">Botany</option>
                                    <option value="Bio_Chemistry_Technology">Bio-Chemistry Technology</option>
                                    <option value="Bio_Technology">Bio- Technology</option>
                                    <option value="Business_Studies">Business Studies</option>
                                    <option value="Ceramic_Technology">Ceramic Technology</option>
                                    <option value="Crafts">Crafts</option>
                                    <option value="Chartered_Accountant">Chartered Accountant</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Computer/IT">Computer/ IT</option>
                                    <option value="Computer_Science_Engineer">Computer Science &amp; Engineer</option>
                                    <option value="Compute_Science_Technology">Computer Science &amp; Technology</option>
                                    <option value="Construction_Technology">Construction Technology</option>
                                    <option value="Clinical_Psychology">Clinical Psychology</option>
                                    <option value="Criminology_Criminal_Justice">Criminology &amp; Criminal Justice</option>
                                    <option value="Cost_Accounting">Cost Accounting</option>
                                    <option value="Civil_Technology">Civil Technology</option>
                                    <option value="ental_Surgery">Dental Surgery</option>
                                    <option value="Data_Telecommunication_Networking">Data Telecommunication &amp; Networking</option>
                                    <option value="Development_Studies">Development Studies</option>
                                    <option value="Drawing_Painting">Drawing &amp; Painting</option>
                                    <option value="Disaster_Science_Management">Disaster Science &amp; Management</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering/Technology">Engineering/Technology</option>
                                    <option value="English_Lecture">English Lecture</option>
                                    <option value="EWT">EWT</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Environment_Technology">Environment Technology</option>
                                    <option value="Electrical_Technology">Electrical Technology</option>
                                    <option value="Electronic_Technology">Electronic Technology</option>
                                    <option value="Electra_Medical_Technology">Electra-Medical  Technology</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Fine_Arts">Fine Arts</option>
                                    <option value="Forestry">Forestry</option>
                                    <option value="Food_Technology">Food Technology</option>
                                    <option value="Fisheries">Fisheries</option>
                                    <option value="Geography_Environment">Geography &amp; Environment</option>
                                    <option value="Geology">Geology</option>
                                    <option value="Graphic_Design">Graphic Design</option>
                                    <option value="Genetic_Engineer_Bio-Technology">Genetic Engineer &amp; Bio-Technology</option>
                                    <option value="Glass_Technology">Glass Technology</option>
                                    <option value="Garments_Design_Pattern Making">Garments Design &amp; Pattern Making</option>
                                    <option value="Graphics_Reproduction_Printing_Technology">Graphics Reproduction Printing Technology</option>
                                    <option value="Home_Science">Home Science</option>
                                    <option value="Human_Resource">Human Resource</option>
                                    <option value="Hotel_Management">Hotel Management</option>
                                    <option value="Health_Technology_(Laboratory)">Health Technology (Laboratory)</option>
                                    <option value="Health_Technology_(Dental)">Health Technology (Dental)</option>
                                    <option value="History">History</option>
                                    <option value="International_Business">International Business</option>
                                    <option value="Internal_Relations">Internal Relations</option>
                                    <option value="Islamic_Studies">Islamic Studies</option>
                                    <option value="Islamic_History_Culture">Islamic History &amp; Culture</option>
                                    <option value="Jute_Technology">Jute Technology</option>
                                    <option value="Law">Law</option>
                                    <option value="Library">Library</option>
                                    <option value="Linguistics">Linguistics</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Marine_Technology">Marine Technology</option>
                                    <option value="Management_Information_System">Management Information System</option>
                                    <option value="Mass_Communication_Journalism">Mass Communication &amp; Journalism</option>
                                    <option value="Mechanization_Technology">Mechanization Technology</option>
                                    <option value="Medical_Ultra_Sound">Medical Ultra Sound</option>
                                    <option value="Medical_Education">Medical Education</option>
                                    <option value="Mining_Mine_Survey_Technology">Mining &amp; Mine Survey Technology</option>
                                    <option value="Music">Music</option>
                                    <option value="Nursing/Health_Science">Nursing/Health Science</option>
                                    <option value="Oriental_Arts">Oriental Arts</option>
                                    <option value="Occupation_Therapy">Occupation Therapy</option>
                                    <option value="Others">Others</option>
                                    <option value="Travel_Tourism">Travel &amp; Tourism</option>
                                    <option value="Zoology">Zoology</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Profession *</label>
                                <select class="form-control-sm w-100 change-with-other" id="profession" name="profession[]" multiple required>
                                    <option value="Any" selected>Any</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Banker">Banker</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Others">Others</option>
                                    <option value="government_service">government service</option>
                                    <option value="Customer_Support_Professional">Customer Support Professional</option>
                                    <option value="Defense_Employee">Defense Employee</option>
                                    <option value="Designer">Designer</option>
                                    <option value="Engineer_(Mechanical)">Engineer (Mechanical)</option>
                                    <option value="Engineer_(Textail)">Engineer (Textail)</option>
                                    <option value="Engineer_(Project)">Engineer (Project)</option>
                                    <option value="Civil_Engineer_(Diploma)">Civil Engineer (Diploma)</option>
                                    <option value="Civil_Engineer_(Bsc)">Civil Engineer (Bsc)</option>
                                    <option value="Event_Manager">Event Manager</option>
                                    <option value="Executive">Executive</option>
                                    <option value="Fashion_Designer">Fashion Designer</option>
                                    <option value="Finance_Professional">Finance Professional</option>
                                    <option value="Health_Care_Professional">Health Care Professional</option>
                                    <option value="Home_Maker">Home Maker</option>
                                    <option value="Hotel_Restaurant_Professional">Hotel &amp; Restaurant Professional</option>
                                    <option value="Human Resources Professional">Human Resources Professional</option>
                                    <option value="IT/Telecom_Profession">IT / Telecom Profession</option>
                                    <option value="Interior_Designer">Interior Designer</option>
                                    <option value="Investment_Professional">Investment Professional</option>
                                    <option value="Journalist">Journalist</option>
                                    <option value="Lawyer">Lawyer</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Legal_Professional">Legal Professional</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Marketing_Professional">Marketing Professional</option>
                                    <option value="Media_Professional">Media Professional</option>
                                    <option value="Medical_Professional">Medical Professional</option>
                                    <option value="Merchandiser">Merchandiser</option>
                                    <option value="Merchant_Naval_Officer">Merchant Naval Officer</option>
                                    <option value="Not_Working">Not Working</option>
                                    <option value="Occupational_Therapist">Occupational Therapist</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Physician_Assistant">Physician Assistant</option>
                                    <option value="Private_Service">Private Service</option>
                                    <option value="Production_Professional">Production Professional</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Public_Relations_Professional">Public Relations Professional</option>
                                    <option value="Real_Estate_Professional">Real Estate Professional</option>
                                    <option value="Research_Scholar">Research Scholar</option>
                                    <option value="Retail_Professional">Retail Professional</option>
                                    <option value="Retired_Person">Retired Person</option>
                                    <option value="Sales_Professional">Sales Professional</option>
                                    <option value="Student">Student</option>
                                    <option value="Technician">Technician</option>
                                    <option value="Training_Professional">Training Professional</option>
                                    <option value="Veterinary Doctor">Veterinary Doctor</option>
                                    <option value="Working_Abroad">Working Abroad</option>
                                    <option value="Writer">Writer</option>
                                    <option value="Business">Business</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Not_working">Not working</option>
                                    <option value="Clerical_official">Clerical official</option>
                                    <option value="Commercial_pilot">Commercial pilot</option>
                                    <option value="Company_secretary">Company secretary</option>
                                    <option value="Computer_professional">Computer professional</option>
                                    <option value="Contractor">Contractor</option>
                                    <option value="Cost_accountant">Cost accountant</option>
                                    <option value="Creative_person">Creative person</option>
                                    <option value="Economist">Economist</option>
                                    <option value="Entertainment_professional">Entertainment professional</option>
                                    <option value="Medical_Transcriptionist">Medical Transcriptionist</option>
                                    <option value="Optician">Optician</option>
                                    <option value="Physicist">Physicist</option>
                                    <option value="Pilot">Pilot</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Acting_professional">Acting professional</option>
                                    <option value="Actor">Actor</option>
                                    <option value="Administration_professional">Administration professional</option>
                                    <option value="Advertising_professional">Advertising professional</option>
                                    <option value="Air_Hostess">Air Hostess</option>
                                    <option value="Airline">Airline</option>
                                    <option value="Architect">Architect</option>
                                    <option value="Artisan">Artisan</option>
                                    <option value="Audiologist">Audiologist</option>
                                    <option value="Beautician">Beautician</option>
                                    <option value="Biologist\Botanist">Biologist\Botanist</option>
                                    <option value="Business_Person">Business Person</option>
                                    <option value="Chartered_Accountant">Chartered Accountant</option>
                                    <option value="Factory_Worker">Factory Worker</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Flight_Attendant">Flight Attendant</option>
                                    <option value="Government_Employee">Government Employee</option>
                                    <option value="Investment_professional">Investment professional</option>
                                    <option value="Physiotherapist">Physiotherapist</option>
                                    <option value="Politician">Politician</option>
                                    <option value="Scientist">Scientist</option>
                                    <option value="Software_Consuitant">Software Consuitant</option>
                                    <option value="Sports_Man">Sports Man</option>
                                    <option value="Self_employed_person">Self-employed person</option>
                                    <option value="Social_Worker">Social Worker</option>
                                    <option value="Software_Engineer">Software Engineer</option>
                                    <option value="Transportation_professional">Transportation professional</option>
                                    <option value="Voiunteer">Voiunteer</option>
                                    <option value="Zoologist">Zoologist</option>
                                </select>                                
                            </div>
                        </div>
                    </div>


                    <h5 class="border-bottom font-italic font-weight-bold pt-2">Address</h5>
                    <div class="row bg-off-pink">
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Country of Residence *</label>
                                <select class="form-control-sm w-100 change-with-other" id="country" name="country[]" multiple required>
                                    <option value="Bangladesh" selected>Bangladesh</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="USA">United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Austria">Austria</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Other">Other</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">District *</label>
                                <select class="form-control-sm w-100 change-with-other" id="district" name="district[]" multiple required>
                                    <option value="Any">Any</option>
                                    <option value="Tangail">Tangail</option>
                                    <option value="Bagerhat">Bagerhat</option>
                                    <option value="Bandarban">Bandarban</option>
                                    <option value="Barguna">Barguna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Bhola">Bhola</option>
                                    <option value="Bogra">Bogra</option>
                                    <option value="Brahmanbaria">Brahmanbaria</option>
                                    <option value="Chandpur">Chandpur</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Chuadanga">Chuadanga</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Cox's Bazar">Cox's Bazar</option>
                                    <option value="Dhaka" selected>Dhaka</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Faridpur">Faridpur</option>
                                    <option value="Feni">Feni</option>
                                    <option value="Gaibandha">Gaibandha</option>
                                    <option value="Gazipur">Gazipur</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Habiganj">Habiganj</option>
                                    <option value="Jamalpur">Jamalpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Jhalokati">Jhalokati</option>
                                    <option value="Jhenaidah">Jhenaidah</option>
                                    <option value="Joypurhat">Joypurhat</option>
                                    <option value="Khagrachari">Khagrachari</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Kishoreganj">Kishoreganj</option>
                                    <option value="Kurigram">Kurigram</option>
                                    <option value="Kushtia">Kushtia</option>
                                    <option value="Lakshmipur">Lakshmipur</option>
                                    <option value="Lalmonirhat">Lalmonirhat</option>
                                    <option value="Madaripur">Madaripur</option>
                                    <option value="Magura">Magura</option>
                                    <option value="Manikganj">Manikganj</option>
                                    <option value="Maulvibazar">Maulvibazar</option>
                                    <option value="Meherpur">Meherpur</option>
                                    <option value="Munshiganj">Munshiganj</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Naogaon">Naogaon</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Narayanganj">Narayanganj</option>
                                    <option value="Narsingdi">Narsingdi</option>
                                    <option value="Natore">Natore</option>
                                    <option value="Nawabganj">Nawabganj</option>
                                    <option value="Netrokona">Netrokona</option>
                                    <option value="Nilphamari">Nilphamari</option>
                                    <option value="Noakhali">Noakhali</option>
                                    <option value="Pabna">Pabna</option>
                                    <option value="Panchagarh">Panchagarh</option>
                                    <option value="Patuakhali">Patuakhali</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                    <option value="Rajbari">Rajbari</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangamati">Rangamati</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Satkhira">Satkhira</option>
                                    <option value="Shariatpur">Shariatpur</option>
                                    <option value="Sherpur">Sherpur</option>
                                    <option value="Sirajgonj">Sirajgonj</option>
                                    <option value="Sunamganj">Sunamganj</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Thakurgaon">Thakurgaon</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Citizenship *</label>
                                <select class="form-control-sm w-100 change-with-other" id="citizenship" name="citizenship[]" multiple required>
                                    <option value="Bangladeshi" selected>Bangladeshi</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Canada">Canada</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">UK</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="France">France</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Finland">Finland</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="NewZealand">New Zealand</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="SaudiArabia">Saudi Arabia</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Other">Other</option>
                                    <option value="SouthAfrica">South Africa</option>
                                    <option value="SouthKorea">South Korea</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="UnitedArabEmirates">United Arab Emirates</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Australia">Australia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    <h5 class="border-bottom font-italic font-weight-bold pt-2">Others</h5>
                    <div class="row bg-off-pink">
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Smoke? *</label>
                                <select class="form-control-sm w-100" name="smoke_status" required>
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="Sometimes">Sometimes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Addicted to alcohol? *</label>
                                <select class="form-control-sm w-100" name="alcohol_status" required>
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="Sometimes">Sometimes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Diat Status *</label>
                                <select class="form-control-sm w-100" name="diat_status" required>
                                    <option value="Not_to_say" selected>Not to say</option>
                                    <option value="Vag">Vag</option>
                                    <option value="Non_Vag">Non Vag</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-off-pink">
                        <div class="col-md-12">
                            <label class="mb-0 form-label">Language preferance *</label>
                            <select class="form-control-sm w-100 change-with-other" id="language" name="language[]" multiple required>
                              <option value="Afrikaans">Afrikaans</option>
                              <option value="Albanian">Albanian</option>
                              <option value="Arabic">Arabic</option>
                              <option value="Armenian">Armenian</option>
                              <option value="Basque">Basque</option>
                              <option value="Bangla" selected>Bangla</option>
                              <option value="Bulgarian">Bulgarian</option>
                              <option value="Catalan">Catalan</option>
                              <option value="Cambodian">Cambodian</option>
                              <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                              <option value="Croatian">Croatian</option>
                              <option value="Czech">Czech</option>
                              <option value="Danish">Danish</option>
                              <option value="Dutch">Dutch</option>
                              <option value="English">English</option>
                              <option value="Estonian">Estonian</option>
                              <option value="Fiji">Fiji</option>
                              <option value="Finnish">Finnish</option>
                              <option value="French">French</option>
                              <option value="Georgian">Georgian</option>
                              <option value="German">German</option>
                              <option value="Greek">Greek</option>
                              <option value="Gujarati">Gujarati</option>
                              <option value="Hebrew">Hebrew</option>
                              <option value="Hindi">Hindi</option>
                              <option value="Hungarian">Hungarian</option>
                              <option value="Icelandic">Icelandic</option>
                              <option value="Indonesian">Indonesian</option>
                              <option value="Irish">Irish</option>
                              <option value="Italian">Italian</option>
                              <option value="Japanese">Japanese</option>
                              <option value="Javanese">Javanese</option>
                              <option value="Korean">Korean</option>
                              <option value="Latin">Latin</option>
                              <option value="Latvian">Latvian</option>
                              <option value="Lithuanian">Lithuanian</option>
                              <option value="Macedonian">Macedonian</option>
                              <option value="Malay">Malay</option>
                              <option value="Malayalam">Malayalam</option>
                              <option value="Maltese">Maltese</option>
                              <option value="Maori">Maori</option>
                              <option value="Marathi">Marathi</option>
                              <option value="Mongolian">Mongolian</option>
                              <option value="Nepali">Nepali</option>
                              <option value="Norwegian">Norwegian</option>
                              <option value="Persian">Persian</option>
                              <option value="Polish">Polish</option>
                              <option value="Portuguese">Portuguese</option>
                              <option value="Punjabi">Punjabi</option>
                              <option value="Quechua">Quechua</option>
                              <option value="Romanian">Romanian</option>
                              <option value="Russian">Russian</option>
                              <option value="Samoan">Samoan</option>
                              <option value="Serbian">Serbian</option>
                              <option value="Slovak">Slovak</option>
                              <option value="Slovenian">Slovenian</option>
                              <option value="Spanish">Spanish</option>
                              <option value="Swahili">Swahili</option>
                              <option value="Swedish ">Swedish </option>
                              <option value="Tamil">Tamil</option>
                              <option value="Tatar">Tatar</option>
                              <option value="Telugu">Telugu</option>
                              <option value="Thai">Thai</option>
                              <option value="Tibetan">Tibetan</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Turkish">Turkish</option>
                              <option value="Ukrainian">Ukrainian</option>
                              <option value="Urdu">Urdu</option>
                              <option value="Uzbek">Uzbek</option>
                              <option value="Vietnamese">Vietnamese</option>
                              <option value="Welsh">Welsh</option>
                              <option value="Xhosa">Xhosa</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary bg-off-pink">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">

    // ============marital_status==============
    var marital_status = new SlimSelect({
      select: '#marital_status'
    })
    // ============family_status==============
    var family_status = new SlimSelect({
      select: '#family_status'
    })
    // ============skin_color==============
    var skin_color = new SlimSelect({
      select: '#skin_color'
    })
    // ============skin_color==============
    var blood_group = new SlimSelect({
      select: '#blood_group'
    })
    // ============education_level==============
    var education_level = new SlimSelect({
      select: '#education_level'
    })
    // ============subject==============
    var subject = new SlimSelect({
      select: '#subject'
    })
    // ============profession==============
    var profession = new SlimSelect({
      select: '#profession'
    })
    // ============district==============
    var country = new SlimSelect({
      select: '#country'
    })
    // ============district==============
    var district = new SlimSelect({
      select: '#district'
    }) 
    // ============district==============
    var citizenship = new SlimSelect({
      select: '#citizenship'
    })
    // ============language==============
    var language = new SlimSelect({
      select: '#language'
    })



    // complextion, bodytype, country, district, residency,Partner Knows, 

    // My Hobbies, Interests & More, Favorite Music,Favorite Reads,Preferred Movies,Favourite Cooking,Dress Style

    // Religious View,

    var url = "{{URL('member/preference/store')}}";
    function EditPrefference() {

        $.ajax({
            url: url,
            type: "PATCH",
            cache: false,
            data:{
                _token:'{{ csrf_token() }}',
                minAge: $("#minAge").val(),
                maxAge : $("#maxAge").val(),
                religion : $("#religion").val(),
                family_status : family_status.selected(),
                marital_status : marital_status.selected(),
                allow_children : $("#allow_children").val(),
                details_you_prefer : $("#details_you_prefer").val(),
                minHeight : $("#minHeight").val(),
                maxHeight : $("#maxHeight").val(),
                minWeight : $("#minWeight").val(),
                maxWeight : $("#maxWeight").val(),
                blood_group : $("#blood_group").val(),
                hair_color : $("#hair_color").val(),
                eye_color : $("#eye_color").val(),
                skin_color : skin_color.selected(),
                disabilities_status : $("#disabilities_status").val(),
                education_level : education_level.selected(),
                subject : subject.selected(),
                profession : profession.selected(),
                country : $("#country").val(),
                district : $("#district").val(),
                citizenship : $("#citizenship").val(),
                smoke_status : $("#smoke_status").val(),
                alcohol_status : $("#alcohol_status").val(),
                diat_status : $("#diat_status").val(),
                language : language.selected()
            },
            success:function(data) {
                Toast.fire({
                  icon: 'success',
                  title: 'Save preference successfully'
                })
            },
            error: function(request,status,errorThrown) {
                Toast.fire({
                  icon: 'error',
                  title: 'Something went wrong!'
                })
            }
            
        });
    }
    
  </script>
@endpush
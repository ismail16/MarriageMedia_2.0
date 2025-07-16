@extends('author.layouts.master')
@section('title','Edit Preference')

@push('css')
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9 pl-0">
            <div class="card bg-light-green mt-2 mb-2">
                @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                    <span class="badge badge-danger">{{ $error }}</span>
                    @endforeach
                </div>
                @endif     
                <div class="card-header pb-0 pt-2">
                    <h5>Edit Preference</h5>
                </div>   
            <div class="card-body pt-2 bg-light-green">
                <h5 class="border-bottom pt-2">Basic preference</h5>
                <div class="row bg-off-pink bg-body-green">
                    <div class="col-sm-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Minimum Age *</label>
                            <input type="number" class="form-control-sm w-100" required value="{{ $preference->minAge }}" id="minAge" name="minAge" placeholder="Ex. 22">
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Maximum Age *</label>
                            <input type="number" value="{{ $preference->maxAge }}" required id="maxAge" name="maxAge" class="form-control-sm w-100" placeholder="Ex. 30">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="mb-0 form-label">Religion *</label>
                        <select class="form-control-sm w-100"  id="religion" name="religion">
                            <option value="">Religion/Community *</option>
                            <option value="Islam" {{ $preference->religion == 'Islam'?'selected':''}}>Islam</option>
                            <option value="Hindu" {{ $preference->religion == 'Hindu'?'selected':''}}>Hindu</option>
                            <option value="Christian" {{ $preference->religion == 'Christian'?'selected':''}}>Christian</option>
                            <option value="Buddhist" {{ $preference->religion == 'Buddhist'?'selected':''}}>Buddhist</option>
                            <option value="Sikh" {{ $preference->religion == 'Sikh'?'selected':''}}>Sikh</option>
                            <option value="Parsi" {{ $preference->religion == 'Parsi'?'selected':''}}>Parsi</option>
                            <option value="Jain" {{ $preference->religion == 'Jain'?'selected':''}}>Jain</option>
                            <option value="Jewish" {{ $preference->religion == 'Jewish'?'selected':''}}>Jewish</option>
                            <option value="Spiritual" {{ $preference->religion == 'Spiritual'?'selected':''}}>Spiritual</option>
                            <option value="No_Religion" {{ $preference->religion == 'No_Religion'?'selected':''}}>No Religion</option>
                        </select>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Family status *</label>
                            <select class="form-control-sm w-100 change-with-other" id="family_status" name="family_status[]" multiple>
                                <option value="Middle_class">Middle Class</option>
                                <option value="Upper_middle_class">Upper middle class</option>
                                <option value="Lower_middle_class">Lower middle class</option>
                                <option value="Upper_class">Upper Class</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="mb-0 form-label">Marital status *</label>
                        <select id="marital_status" name="marital_status[]"  class="form-control-sm w-100" multiple>
                            <option value="Never_Married">Never Married</option>
                            <option value="Legally_Separated">Legally Separated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Anulled">Anulled</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Allow Children?</label>
                            <select class="form-control-sm w-100" id="allow_children" name="allow_children">
                                <option value="No" {{ $preference->allow_children == 'No'?'selected':''}}>No</option>
                                <option value="Yes" {{ $preference->allow_children == 'Yes'?'selected':''}}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Details you preferance(short)</label>
                            <textarea class="form-control-sm w-100" id="details_you_prefer" rows="2" cols="50" name="details_you_prefer" required>{{ $preference->details_you_prefer }}</textarea>
                        </div>
                    </div>
                </div>

                <h5 class="border-bottom pt-2">Physical Information</h5>
                <div class="row bg-off-pink bg-body-green">
                    <div class="col-sm-3">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Min Height *</label>
                            <select class="form-control-sm w-100" id="minHeight" name="minHeight">
                                <option value="4.0" {{ $preference->minHeight=='4.0'?'selected':'' }}>4 Feet</option>
                                <option value="4.1" {{ $preference->minHeight=='4.1'?'selected':'' }}>4 Feet 1 Inch</option>
                                <option value="4.2" {{ $preference->minHeight=='4.2'?'selected':'' }}>4 Feet 2 Inch</option>
                                <option value="4.3" {{ $preference->minHeight=='4.3'?'selected':'' }}>4 Feet 3 Inch</option>
                                <option value="4.4" {{ $preference->minHeight=='4.4'?'selected':'' }}>4 Feet 4 Inch</option>
                                <option value="4.5" {{ $preference->minHeight=='4.5'?'selected':'' }}>4 Feet 5 Inch</option>
                                <option value="4.6" {{ $preference->minHeight=='4.6'?'selected':'' }}>4 Feet 6 Inch</option>
                                <option value="4.7" {{ $preference->minHeight=='4.7'?'selected':'' }}>4 Feet 7 Inch</option>
                                <option value="4.8" {{ $preference->minHeight=='4.8'?'selected':'' }}>4 Feet 8 Inch</option>
                                <option value="4.9" {{ $preference->minHeight=='4.9'?'selected':'' }}>4 Feet 9 Inch</option>
                                <option value="4.10" {{ $preference->minHeight=='4.10'?'selected':'' }}>4 Feet 10 Inch</option>
                                <option value="4.11" {{ $preference->minHeight=='4.11'?'selected':'' }}>4 Feet 11 Inch</option>
                                <option value="5.0" {{ $preference->minHeight=='5.0'?'selected':'' }}>5 Feet</option>
                                <option value="5.1" {{ $preference->minHeight=='5.1'?'selected':'' }}>5 Feet 1 Inch</option>
                                <option value="5.2" {{ $preference->minHeight=='5.2'?'selected':'' }}>5 Feet 2 Inch</option>
                                <option value="5.3" {{ $preference->minHeight=='5.3'?'selected':'' }}>5 Feet 3 Inch</option>
                                <option value="5.4" {{ $preference->minHeight=='5.4'?'selected':'' }}>5 Feet 4 Inch</option>
                                <option value="5.5" {{ $preference->minHeight=='5.5'?'selected':'' }}>5 Feet 5 Inch</option>
                                <option value="5.6" {{ $preference->minHeight=='5.6'?'selected':'' }}>5 Feet 6 Inch</option>
                                <option value="5.7" {{ $preference->minHeight=='5.7'?'selected':'' }}>5 Feet 7 Inch</option>
                                <option value="5.8" {{ $preference->minHeight=='5.8'?'selected':'' }}>5 Feet 8 Inch</option>
                                <option value="5.9" {{ $preference->minHeight=='5.9'?'selected':'' }}>5 Feet 9 Inch</option>
                                <option value="5.10" {{ $preference->minHeight=='5.10'?'selected':'' }}>5 Feet 10 Inch</option>
                                <option value="5.11" {{ $preference->minHeight=='5.11'?'selected':'' }}>5 Feet 11 Inch</option>
                                <option value="6.0" {{ $preference->minHeight=='6.0'?'selected':'' }}>6 Feet</option>
                                <option value="6.1" {{ $preference->minHeight=='6.1'?'selected':'' }}>6 Feet 1 Inch</option>
                                <option value="6.2" {{ $preference->minHeight=='6.2'?'selected':'' }}>6 Feet 2 Inch</option>
                                <option value="6.3" {{ $preference->minHeight=='6.3'?'selected':'' }}>6 Feet 3 Inch</option>
                                <option value="6.4" {{ $preference->minHeight=='6.4'?'selected':'' }}>6 Feet 4 Inch</option>
                                <option value="6.5" {{ $preference->minHeight=='6.5'?'selected':'' }}>6 Feet 5 Inch</option>
                                <option value="6.6" {{ $preference->minHeight=='6.6'?'selected':'' }}>6 Feet 6 Inch</option>
                                <option value="6.7" {{ $preference->minHeight=='6.7'?'selected':'' }}>6 Feet 7 Inch</option>
                                <option value="6.8" {{ $preference->minHeight=='6.8'?'selected':'' }}>6 Feet 8 Inch</option>
                                <option value="6.9" {{ $preference->minHeight=='6.9'?'selected':'' }}>6 Feet 9 Inch</option>
                                <option value="6.10" {{ $preference->minHeight=='6.10'?'selected':'' }}>6 Feet 10 Inch</option>
                                <option value="6.11" {{ $preference->minHeight=='6.11'?'selected':'' }}>6 Feet 11 Inch</option>
                                <option value="7.0" {{ $preference->minHeight=='7.0'?'selected':'' }}>7 Feet</option>
                                <option value="7+" {{ $preference->minHeight=='7+'?'selected':'' }}>More than 7 Feet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Max Height *</label>
                            <select class="form-control-sm w-100" id="maxHeight" name="maxHeight">
                                <option value="4.0" {{ $preference->maxHeight=='4.0'?'selected':'' }}>4 Feet</option>
                                <option value="4.1" {{ $preference->maxHeight=='4.1'?'selected':'' }}>4 Feet 1 Inch</option>
                                <option value="4.2" {{ $preference->maxHeight=='4.2'?'selected':'' }}>4 Feet 2 Inch</option>
                                <option value="4.3" {{ $preference->maxHeight=='4.3'?'selected':'' }}>4 Feet 3 Inch</option>
                                <option value="4.4" {{ $preference->maxHeight=='4.4'?'selected':'' }}>4 Feet 4 Inch</option>
                                <option value="4.5" {{ $preference->maxHeight=='4.5'?'selected':'' }}>4 Feet 5 Inch</option>
                                <option value="4.6" {{ $preference->maxHeight=='4.6'?'selected':'' }}>4 Feet 6 Inch</option>
                                <option value="4.7" {{ $preference->maxHeight=='4.7'?'selected':'' }}>4 Feet 7 Inch</option>
                                <option value="4.8" {{ $preference->maxHeight=='4.8'?'selected':'' }}>4 Feet 8 Inch</option>
                                <option value="4.9" {{ $preference->maxHeight=='4.9'?'selected':'' }}>4 Feet 9 Inch</option>
                                <option value="4.10" {{ $preference->maxHeight=='4.10'?'selected':'' }}>4 Feet 10 Inch</option>
                                <option value="4.11" {{ $preference->maxHeight=='4.11'?'selected':'' }}>4 Feet 11 Inch</option>
                                <option value="5.0" {{ $preference->maxHeight=='5.0'?'selected':'' }}>5 Feet</option>
                                <option value="5.1" {{ $preference->maxHeight=='5.1'?'selected':'' }}>5 Feet 1 Inch</option>
                                <option value="5.2" {{ $preference->maxHeight=='5.2'?'selected':'' }}>5 Feet 2 Inch</option>
                                <option value="5.3" {{ $preference->maxHeight=='5.3'?'selected':'' }}>5 Feet 3 Inch</option>
                                <option value="5.4" {{ $preference->maxHeight=='5.4'?'selected':'' }}>5 Feet 4 Inch</option>
                                <option value="5.5" {{ $preference->maxHeight=='5.5'?'selected':'' }}>5 Feet 5 Inch</option>
                                <option value="5.6" {{ $preference->maxHeight=='5.6'?'selected':'' }}>5 Feet 6 Inch</option>
                                <option value="5.7" {{ $preference->maxHeight=='5.7'?'selected':'' }}>5 Feet 7 Inch</option>
                                <option value="5.8" {{ $preference->maxHeight=='5.8'?'selected':'' }}>5 Feet 8 Inch</option>
                                <option value="5.9" {{ $preference->maxHeight=='5.9'?'selected':'' }}>5 Feet 9 Inch</option>
                                <option value="5.10" {{ $preference->maxHeight=='5.10'?'selected':'' }}>5 Feet 10 Inch</option>
                                <option value="5.11" {{ $preference->maxHeight=='5.11'?'selected':'' }}>5 Feet 11 Inch</option>
                                <option value="6.0" {{ $preference->maxHeight=='6.0'?'selected':'' }}>6 Feet</option>
                                <option value="6.1" {{ $preference->maxHeight=='6.1'?'selected':'' }}>6 Feet 1 Inch</option>
                                <option value="6.2" {{ $preference->maxHeight=='6.2'?'selected':'' }}>6 Feet 2 Inch</option>
                                <option value="6.3" {{ $preference->maxHeight=='6.3'?'selected':'' }}>6 Feet 3 Inch</option>
                                <option value="6.4" {{ $preference->maxHeight=='6.4'?'selected':'' }}>6 Feet 4 Inch</option>
                                <option value="6.5" {{ $preference->maxHeight=='6.5'?'selected':'' }}>6 Feet 5 Inch</option>
                                <option value="6.6" {{ $preference->maxHeight=='6.6'?'selected':'' }}>6 Feet 6 Inch</option>
                                <option value="6.7" {{ $preference->maxHeight=='6.7'?'selected':'' }}>6 Feet 7 Inch</option>
                                <option value="6.8" {{ $preference->maxHeight=='6.8'?'selected':'' }}>6 Feet 8 Inch</option>
                                <option value="6.9" {{ $preference->maxHeight=='6.9'?'selected':'' }}>6 Feet 9 Inch</option>
                                <option value="6.10" {{ $preference->maxHeight=='6.10'?'selected':'' }}>6 Feet 10 Inch</option>
                                <option value="6.11" {{ $preference->maxHeight=='6.11'?'selected':'' }}>6 Feet 11 Inch</option>
                                <option value="7.0" {{ $preference->maxHeight=='7.0'?'selected':'' }}>7 Feet</option>
                                <option value="7+" {{ $preference->maxHeight=='7+'?'selected':'' }}>More than 7 Feet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3"> 
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Min Weight(kg) *</label>
                            <input type="number" value="{{ $preference->minWeight }}" class="form-control-sm w-100" id="minWeight" name="minWeight" required placeholder="Ex. 50">
                        </div>
                    </div>
                    <div class="col-sm-3"> 
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Max Weight(kg) *</label>
                            <input type="number" value="{{ $preference->maxWeight }}" class="form-control-sm w-100" id="maxWeight" name="maxWeight" required placeholder="Ex. 65">
                        </div>
                    </div>
                    <div class="col-sm-6">              
                        <div class="other-area">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Skin Color *</label>
                                <select class="form-control-sm w-100 change-with-other" id="skin_color" name="skin_color[]" multiple>
                                   <option value="Very_Fair">Very Fair</option>
                                   <option value="Fair">Fair</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Dark">Dark</option>
                                    <option value="Any">Any</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Blood Group *</label>
                            <select class="form-control-sm w-100" id="blood_group" name="blood_group[]" multiple>
                                <option value="Any">Any</option>
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
                    <div class="col-sm-3">
                        <div class="other-area">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Hair Color *</label>
                                <select class="form-control-sm w-100" id="hair_color" name="hair_color">
                                    <option value="Black" {{ $preference->hair_color=='Black'?'selected':'' }}>Black</option>
                                    <option value="Brown" {{ $preference->hair_color=='Brown'?'selected':'' }}>Brown</option>
                                    <option value="White" {{ $preference->hair_color=='White'?'selected':'' }}>White</option>
                                    <option value="Others" {{ $preference->hair_color=='Others'?'selected':'' }}>Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="other-area">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Eye Color *</label>
                                <select class="form-control-sm w-100 change-with-other" id="eye_color" name="eye_color">
                                    <option value="Black" {{ $preference->eye_color=='Black'?'selected':'' }}>Black</option>
                                    <option value="Brown" {{ $preference->eye_color=='Brown'?'selected':'' }}>Brown</option>
                                    <option value="White" {{ $preference->eye_color=='White'?'selected':'' }}>White</option>
                                    <option value="Others" {{ $preference->eye_color=='Others'?'selected':'' }}>Others</option>
                                </select>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="other-area">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Disabilities? *</label>
                                <select class="form-control-sm w-100 change-with-other" id="disabilities_status" name="disabilities_status">
                                    <option value="No" {{ $preference->disabilities_status=='No'?'selected':'' }}="">No</option>
                                    <option value="Yes" {{ $preference->disabilities_status=='Yes'?'selected':'' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="border-bottom pt-2">Education and Profession</h5>
                <div class="row bg-off-pink bg-body-green">
                    <div class="col-md-4">
                        <div class="other-area">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Education Level *</label>
                                <select class="form-control-sm w-100" id="education_level" name="education_level[]" multiple>
                                    <option value="Any">Any</option>
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
                            <select class="form-control-sm w-100" id="subject" name="subject[]" multiple>
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
                            <select class="form-control-sm w-100" id="profession" name="profession[]" multiple>
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

                <h5 class="border-bottom pt-2">Address</h5>
                <div class="row bg-off-pink bg-body-green">
                    <div class="col-md-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Country of Residence *</label>
                            <select class="form-control-sm w-100 change-with-other" id="country" name="country[]" multiple>
                                <option value="Bangladesh">Bangladesh</option>
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
                            <select class="form-control-sm w-100" id="district" name="district[]" multiple>
                                <option value="Any" {{ $preference->district=='Any'?'selected':'' }}>Any</option>
                                <option value="Tangail" {{ $preference->district=='Tangail'?'selected':'' }}>Tangail</option>
                                <option value="Bagerhat" {{ $preference->district=='Bagerhat'?'selected':'' }}>Bagerhat</option>
                                <option value="Bandarban" {{ $preference->district=='Bandarban'?'selected':'' }}>Bandarban</option>
                                <option value="Barguna" {{ $preference->district=='Barguna'?'selected':'' }}>Barguna</option>
                                <option value="Barisal" {{ $preference->district=='Barisal'?'selected':'' }}>Barisal</option>
                                <option value="Bhola" {{ $preference->district=='Bhola'?'selected':'' }}>Bhola</option>
                                <option value="Bogra" {{ $preference->district=='Bogra'?'selected':'' }}>Bogra</option>
                                <option value="Brahmanbaria" {{ $preference->district=='Brahmanbaria'?'selected':'' }}>Brahmanbaria</option>
                                <option value="Chandpur" {{ $preference->district=='Chandpur'?'selected':'' }}>Chandpur</option>
                                <option value="Chittagong" {{ $preference->district=='Chittagong'?'selected':'' }}>Chittagong</option>
                                <option value="Chuadanga" {{ $preference->district=='Chuadanga'?'selected':'' }}>Chuadanga</option>
                                <option value="Comilla" {{ $preference->district=='Comilla'?'selected':'' }}>Comilla</option>
                                <option value="Coxs_Bazar" {{ $preference->district=='Coxs_Bazar'?'selected':'' }}>Cox's Bazar</option>
                                <option value="Dhaka" {{ $preference->district=='Dhaka'?'selected':'' }}>Dhaka</option>
                                <option value="Dinajpur" {{ $preference->district=='Dinajpur'?'selected':'' }}>Dinajpur</option>
                                <option value="Faridpur" {{ $preference->district=='Faridpur'?'selected':'' }}>Faridpur</option>
                                <option value="Feni" {{ $preference->district=='Feni'?'selected':'' }}>Feni</option>
                                <option value="Gaibandha" {{ $preference->district=='Gaibandha'?'selected':'' }}>Gaibandha</option>
                                <option value="Gazipur" {{ $preference->district=='Gazipur'?'selected':'' }}>Gazipur</option>
                                <option value="Gopalganj" {{ $preference->district=='Gopalganj'?'selected':'' }}>Gopalganj</option>
                                <option value="Habiganj" {{ $preference->district=='Habiganj'?'selected':'' }}>Habiganj</option>
                                <option value="Jamalpur" {{ $preference->district=='Jamalpur'?'selected':'' }}>Jamalpur</option>
                                <option value="Jessore" {{ $preference->district=='Jessore'?'selected':'' }}>Jessore</option>
                                <option value="Jhalokati" {{ $preference->district=='Jhalokati'?'selected':'' }}>Jhalokati</option>
                                <option value="Jhenaidah" {{ $preference->district=='Jhenaidah'?'selected':'' }}>Jhenaidah</option>
                                <option value="Joypurhat" {{ $preference->district=='Joypurhat'?'selected':'' }}>Joypurhat</option>
                                <option value="Khagrachari" {{ $preference->district=='Khagrachari'?'selected':'' }}>Khagrachari</option>
                                <option value="Khulna" {{ $preference->district=='Khulna'?'selected':'' }}>Khulna</option>
                                <option value="Kishoreganj" {{ $preference->district=='Kishoreganj'?'selected':'' }}>Kishoreganj</option>
                                <option value="Kurigram" {{ $preference->district=='Kurigram'?'selected':'' }}>Kurigram</option>
                                <option value="Kushtia" {{ $preference->district=='Kushtia'?'selected':'' }}>Kushtia</option>
                                <option value="Lakshmipur" {{ $preference->district=='Lakshmipur'?'selected':'' }}>Lakshmipur</option>
                                <option value="Lalmonirhat" {{ $preference->district=='Lalmonirhat'?'selected':'' }}>Lalmonirhat</option>
                                <option value="Madaripur" {{ $preference->district=='Madaripur'?'selected':'' }}>Madaripur</option>
                                <option value="Magura" {{ $preference->district=='Magura'?'selected':'' }}>Magura</option>
                                <option value="Manikganj" {{ $preference->district=='Manikganj'?'selected':'' }}>Manikganj</option>
                                <option value="Maulvibazar" {{ $preference->district=='Maulvibazar'?'selected':'' }}>Maulvibazar</option>
                                <option value="Meherpur" {{ $preference->district=='Meherpur'?'selected':'' }}>Meherpur</option>
                                <option value="Munshiganj" {{ $preference->district=='Munshiganj'?'selected':'' }}>Munshiganj</option>
                                <option value="Mymensingh" {{ $preference->district=='Mymensingh'?'selected':'' }}>Mymensingh</option>
                                <option value="Naogaon" {{ $preference->district=='Naogaon'?'selected':'' }}>Naogaon</option>
                                <option value="Narail" {{ $preference->district=='Narail'?'selected':'' }}>Narail</option>
                                <option value="Narayanganj" {{ $preference->district=='Narayanganj'?'selected':'' }}>Narayanganj</option>
                                <option value="Narsingdi" {{ $preference->district=='Narsingdi'?'selected':'' }}>Narsingdi</option>
                                <option value="Natore" {{ $preference->district=='Natore'?'selected':'' }}>Natore</option>
                                <option value="Nawabganj" {{ $preference->district=='Nawabganj'?'selected':'' }}>Nawabganj</option>
                                <option value="Netrokona" {{ $preference->district=='Netrokona'?'selected':'' }}>Netrokona</option>
                                <option value="Nilphamari" {{ $preference->district=='Nilphamari'?'selected':'' }}>Nilphamari</option>
                                <option value="Noakhali" {{ $preference->district=='Noakhali'?'selected':'' }}>Noakhali</option>
                                <option value="Pabna" {{ $preference->district=='Pabna'?'selected':'' }}>Pabna</option>
                                <option value="Panchagarh" {{ $preference->district=='Panchagarh'?'selected':'' }}>Panchagarh</option>
                                <option value="Patuakhali" {{ $preference->district=='Patuakhali'?'selected':'' }}>Patuakhali</option>
                                <option value="Pirojpur" {{ $preference->district=='Pirojpur'?'selected':'' }}>Pirojpur</option>
                                <option value="Rajbari" {{ $preference->district=='Rajbari'?'selected':'' }}>Rajbari</option>
                                <option value="Rajshahi" {{ $preference->district=='Rajshahi'?'selected':'' }}>Rajshahi</option>
                                <option value="Rangamati" {{ $preference->district=='Rangamati'?'selected':'' }}>Rangamati</option>
                                <option value="Rangpur" {{ $preference->district=='Rangpur'?'selected':'' }}>Rangpur</option>
                                <option value="Satkhira" {{ $preference->district=='Satkhira'?'selected':'' }}>Satkhira</option>
                                <option value="Shariatpur" {{ $preference->district=='Shariatpur'?'selected':'' }}>Shariatpur</option>
                                <option value="Sherpur" {{ $preference->district=='Sherpur'?'selected':'' }}>Sherpur</option>
                                <option value="Sirajgonj" {{ $preference->district=='Sirajgonj'?'selected':'' }}>Sirajgonj</option>
                                <option value="Sunamganj" {{ $preference->district=='Sunamganj'?'selected':'' }}>Sunamganj</option>
                                <option value="Sylhet" {{ $preference->district=='Sylhet'?'selected':'' }}>Sylhet</option>
                                <option value="Thakurgaon" {{ $preference->district=='Thakurgaon'?'selected':'' }}>Thakurgaon</option>
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
                                    
                <h5 class="border-bottom pt-2">Others</h5>
                <div class="row bg-off-pink bg-body-green">
                    <div class="col-sm-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Smoke? *</label>
                            <select class="form-control-sm w-100" id="smoke_status" name="smoke_status">
                                <option value="No" {{ $preference->smoke_status=='No'?'selected':'' }}="">No</option>
                                <option value="Yes" {{ $preference->smoke_status=='Yes'?'selected':'' }}>Yes</option>
                                <option value="Sometimes" {{ $preference->smoke_status=='Sometimes'?'selected':'' }}>Sometimes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Addicted to alcohol? *</label>
                            <select class="form-control-sm w-100" id="alcohol_status" name="alcohol_status">
                                <option value="No" {{ $preference->alcohol_status=='No'?'selected':'' }}="">No</option>
                                <option value="Yes" {{ $preference->alcohol_status=='Yes'?'selected':'' }}>Yes</option>
                                <option value="Sometimes" {{ $preference->alcohol_status=='Sometimes'?'selected':'' }}>Sometimes</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group mb-1">
                            <label class="mb-0 form-label">Diat Status *</label>
                            <select class="form-control-sm w-100" id="diat_status" name="diat_status">
                                <option value="Not_to_say" {{ $preference->diat_status=='Not_to_say'?'selected':'' }}>Not to say</option>
                                <option value="Vag" {{ $preference->diat_status=='Vag'?'selected':'' }}>Vag</option>
                                <option value="Non_Vag" {{ $preference->diat_status=='Non_Vag'?'selected':'' }}>Non Vag</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group mb-1">
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
            </div>

            <div class="card-footer">
                <a href="{{ route('member.preference.index') }}" class="btn btn-primary bg-off-pink">Back</a>
                <button type="submit" onclick="EditPrefference()" class="btn btn-primary float-right">Update</button>
            </div>
        </div>
    </div>
</section>
<?php $m_s = json_decode($preference->marital_status) ?>
@endsection

@push('scripts')
<script type="text/javascript">

    // ============marital_status==============
    var marital_status = new SlimSelect({
      select: '#marital_status'
    })
    var x_ms = '<?php echo json_encode(json_decode($preference->marital_status)) ?>';
    var x_ms_arr = JSON.parse(x_ms);
    marital_status.set(x_ms_arr)

    // ============family_status==============
    var family_status = new SlimSelect({
      select: '#family_status'
    })
    var x_fs = '<?php echo json_encode(json_decode($preference->family_status)) ?>';
    var x_fs_arr = JSON.parse(x_fs);
    family_status.set(x_fs_arr)

    // ============skin_color==============
    var skin_color = new SlimSelect({
      select: '#skin_color'
    })
    var x_sc = '<?php echo json_encode(json_decode($preference->skin_color)) ?>';
    var x_sc_arr = JSON.parse(x_sc);
    skin_color.set(x_sc_arr)

    // ============skin_color==============
    var blood_group = new SlimSelect({
      select: '#blood_group'
    })
    var x_bg = '<?php echo json_encode(json_decode($preference->blood_group)) ?>';
    var x_bg_arr = JSON.parse(x_bg);
    blood_group.set(x_bg_arr)

    // ============education_level==============
    var education_level = new SlimSelect({
      select: '#education_level'
    })
    var x_el = '<?php echo json_encode(json_decode($preference->education_level)) ?>';
    var x_el_arr = JSON.parse(x_el);
    education_level.set(x_el_arr)


    // ============education_level==============
    var subject = new SlimSelect({
      select: '#subject'
    })
    var x_s = '<?php echo json_encode(json_decode($preference->subject)) ?>';
    var x_s_arr = JSON.parse(x_s);
    subject.set(x_s_arr)


    // ============education_level==============
    var profession = new SlimSelect({
      select: '#profession'
    })
    var x_p = '<?php echo json_encode(json_decode($preference->profession)) ?>';
    var x_p_arr = JSON.parse(x_p);
    profession.set(x_p_arr) 

    // ============country==============
    var country = new SlimSelect({
      select: '#country'
    })
    var x_c = '<?php echo json_encode(json_decode($preference->country)) ?>';
    var x_c_arr = JSON.parse(x_c);
    country.set(x_c_arr)

    // ============country==============
    var district  = new SlimSelect({
      select: '#district'
    })
    var x_d = '<?php echo json_encode(json_decode($preference->district)) ?>';
    var x_d_arr = JSON.parse(x_d);
    district.set(x_d_arr)

    // ============citizenship==============
    var citizenship = new SlimSelect({
      select: '#citizenship'
    })
    var x_ct = '<?php echo json_encode(json_decode($preference->citizenship)) ?>';
    var x_ct_arr = JSON.parse(x_ct);
    citizenship.set(x_ct_arr)

    // ============language==============
    var language = new SlimSelect({
      select: '#language'
    })
    var x_l = '<?php echo json_encode(json_decode($preference->language)) ?>';
    var x_l_arr = JSON.parse(x_l);
    language.set(x_l_arr)
    var user_id = '{{ $preference->user_id }}'

    var url = "{{URL('member/preference/'.$preference->id)}}";
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

                // console.log(data)
                window.location.href = "{{ route('member.preference.index') }}"
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


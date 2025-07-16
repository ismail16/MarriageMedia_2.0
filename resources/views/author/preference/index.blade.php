@extends('author.layouts.master')
@section('title','Set Preference')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            @if($preference)
            <div class="col-md-9">
                @include('author.partials.progress_message')
                <div class="card mt-2">
                    @if ($errors->any())
                    <div class="alert">
                        @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{ $error }}</span>
                        @endforeach
                    </div>
                    @endif  
                    <div class="card-header pb-0 pt-2">
                        <div id="verifiedItems" class="float-right">
                            <a class="float-right btn btn-sm btn-primary" href="{{route('member.preference.edit', $preference->id)}}">
                                <i class="nav-icon fas fa-edit"></i> Edit
                            </a>
                        </div>
                        <div >
                            <h3>Preference</h3>
                        </div>
                    </div>        
                    <div class="card-body pt-2">
                        <h5 class="border-bottom font-italic font-weight-bold pt-2">Basic Information</h5>
                        <div class="row bg-off-pink">
                            <div class="col-sm-3">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Minimum Age *</label>
                                    <h6 class="text-dark">{{  $preference->minAge }}</h6>
                                </div>
                            </div>
                            <div class="col-sm-3"> 
                                <div class="form-group mb-1">
                                    <label class="mb-0">Maximum Age *</label>
                                    <h6 class="text-dark">{{  $preference->maxAge}}</h6>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="mb-0">Religion *</label>
                                <h6 class="text-dark">{{  $preference->religion}}</h6>
                            </div>
                            <div class="col-sm-3"> 
                                <div class="form-group mb-1">
                                    <label class="mb-0">Family status *</label>
                                    <h6 class="text-dark">{{str_replace('_', ' ',   $preference->family_status)}}</h6>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label class="mb-0">Meretial status *</label>
                                <h6 class="text-dark">{{str_replace('_', ' ', $preference->marital_status)}}</h6>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Children?</label>
                                    <h6 class="text-dark">{{  $preference->do_u_have_children}}</h6>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Details you preferance(short)</label>
                                    <h6 class="text-dark">{!! $preference->details_you_prefer !!}</h6>
                                </div>
                            </div>


                        </div>


                        <h5 class="border-bottom font-italic font-weight-bold pt-2">Physical Information</h5>
                        <div class="row bg-off-pink">
                            <div class="col-sm-3">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Min Height *</label>
                                    <h6 class="text-dark">{{  $preference->minHeight}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Max Height *</label>
                                    <h6 class="text-dark">{{  $preference->maxHeight}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-3"> 
                                <div class="form-group mb-1">
                                    <label class="mb-0">Min Weight(kg) *</label>
                                    <h6 class="text-dark">{{  $preference->minWeight}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-3"> 
                                <div class="form-group mb-1">
                                    <label class="mb-0">Max Weight(kg) *</label>
                                    <h6 class="text-dark">{{  $preference->maxWeight}}</h6>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Blood Group *</label>
                                    <h6 class="text-dark">{{  $preference->blood_group}}</h6>
                                </div>   
                            </div>
                            <div class="col-sm-3">
                                <div class="other-area">
                                    <div class="form-group mb-1">
                                        <label class="mb-0">Hair Color *</label>
                                        <h6 class="text-dark">{{  $preference->hair_color}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="other-area">
                                    <div class="form-group mb-1">
                                        <label class="mb-0">Eye Color *</label>
                                        <h6 class="text-dark">{{  $preference->eye_color}}</h6>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-3">              
                                <div class="other-area">
                                    <div class="form-group mb-1">
                                        <label class="mb-0">Skin Color *</label>
                                        <h6 class="text-dark">{{  $preference->skin_color}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="other-area">
                                    <div class="form-group mb-1">
                                        <label class="mb-0">Disabilities? *</label>
                                        <h6 class="text-dark">{{  $preference->disabilities_status}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="border-bottom font-italic font-weight-bold">Education and Profession</h5>
                        <div class="row bg-off-pink">
                            <div class="col-md-4">
                                <div class="other-area">
                                    <div class="form-group mb-1">
                                        <label class="mb-0">Education Level *</label>
                                        <h6 class="text-dark">{{  $preference->education_level}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Major Subject *</label>
                                    <h6 class="text-dark">{{  $preference->subject}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">My Profession *</label>
                                    <h6 class="text-dark">{{  $preference->profession}}</h6>
                                </div>
                            </div>
                        </div>


                        <h5 class="border-bottom font-italic font-weight-bold pt-2">Address</h5>
                        <div class="row bg-off-pink">
                            <div class="col-md-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Country of Residence *</label>
                                    <h6 class="text-dark">{{  $preference->country}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">District *</label>
                                    <h6 class="text-dark">{{  $preference->district}}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Citizenship *</label>
                                    <h6 class="text-dark">{{  $preference->citizenship}}</h6>
                                </div>
                            </div>
                        </div>


                        <h5 class="border-bottom font-italic font-weight-bold pt-2">Others</h5>
                        <div class="row bg-off-pink">
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Smoke? *</label>
                                    <h6 class="text-dark">{{  $preference->smoke_status}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Addicted to alcohol? *</label>
                                    <h6 class="text-dark">{{  $preference->alcohol_status}}</h6>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-1">
                                    <label class="mb-0">Diat Status *</label>
                                    <h6 class="text-dark">{{str_replace('_', ' ',   $preference->diat_status)}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-off-pink">
                            <div class="col-md-12">
                                <label class="mb-0">Language preferance *</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input  type="checkbox"  onclick="return false;"  <?php if (in_array('Bangla',json_decode($preference->language))){ echo "checked";} ?> value="Bangla"> Bangla
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('English',json_decode($preference->language))){ echo "checked";} ?> value="English" checked=""> English
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Hindi',json_decode($preference->language))){ echo "checked";} ?> value="Hindi"> Hindi
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Arabic',json_decode($preference->language))){ echo "checked";} ?> value="Arabic"> Arabic
                                                
                                            </span>
                                        </div>     
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Chinese',json_decode($preference->language))){ echo "checked";} ?> value="Chinese"> Chinese
                                                
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Spanish',json_decode($preference->language))){ echo "checked";} ?> value="Spanish"> Spanish
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('German',json_decode($preference->language))){ echo "checked";} ?> value="German"> German
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Italian',json_decode($preference->language))){ echo "checked";} ?> value="Italian"> Italian
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Russian',json_decode($preference->language))){ echo "checked";} ?> value="Russian"> Russian
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('French',json_decode($preference->language))){ echo "checked";} ?> value="French"> French
                                                
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Urdu',json_decode($preference->language))){ echo "checked";} ?> value="Urdu"> Urdu
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Dutch',json_decode($preference->language))){ echo "checked";} ?> value="Dutch"> Dutch
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Persian',json_decode($preference->language))){ echo "checked";} ?> value="Persian"> Persian
                                                
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Malay_based',json_decode($preference->language))){ echo "checked";} ?> value="Malay_based"> Malay based
                                                
                                            </span>
                                        </div> 
                                        <div class="form-check">
                                            <span class="form-check-label">
                                                <input type="checkbox"  onclick="return false;"  <?php if (in_array('Tamil',json_decode($preference->language))){ echo "checked";} ?> value="Tamil"> Tamil
                                                
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-9 d-flex justify-content-center d-flex align-items-center">
               <a class="btn btn-lg btn-primary" href="{{route('member.preference.create')}}">
                    <i class="nav-icon fas fa-plus"></i> Set Preference
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
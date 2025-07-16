@extends('author.layouts.master')
@section('title','Set Preference')

@push('css')
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9">
            @include('author.partials.progress_message')
            @if($preference)
            <div class="card bg-light-green mt-2 mb-2">
                <div class="card-header pb-0 pt-2">
                    <div id="verifiedItems" class="float-right">
                        <a class="float-right btn btn-sm btn-primary" href="{{route('member.preference.edit', $preference->id)}}">
                            <i class="nav-icon fas fa-edit"></i> Edit
                        </a>
                    </div>
                    <div >
                        <h5>Preference</h5>
                    </div>
                </div>    
                <div class="card-body pt-2 bg-light-green">
                    <h5 class="border-bottom pt-2">Basic preference</h5>
                    <div class="row bg-off-pink bg-body-green">
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Minimum Age</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->minAge}} years
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Maximum Age</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->maxAge}} years
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="mb-0 form-label">Religion</label>
                            <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                {{ $preference->religion}}
                            </p>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Family status</label>
                                <?php 
                                $family_statuss = json_decode($preference->family_status) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($family_statuss as $family_status)
                                        {{str_replace('_', ' ', $family_status) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="mb-0 form-label">Meretial status</label>
                            <?php 
                            $marital_statuss = json_decode($preference->marital_status) ;
                            ?>
                            <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                @foreach($marital_statuss as $marital_status)
                                    {{str_replace('_', ' ', $marital_status) }},
                                @endforeach
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Children?</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->allow_children}}
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Details you preferance(short)</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->details_you_prefer}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <h5 class="border-bottom pt-2">Physical Information</h5>
                    <div class="row bg-off-pink bg-body-green">
                        <div class="col-sm-3">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Min Height</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->minHeight}}" 
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Max Height</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->maxHeight}}" 
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Min Weight(kg)</label> 
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->minWeight }} Kg 
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Max Weight(kg)</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->maxWeight}} Kg 
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">              
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Skin Color</label>
                                    <?php 
                                    $skin_colors = json_decode($preference->skin_color) ;
                                    ?>
                                    <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                        @foreach($skin_colors as $skin_color)
                                            {{str_replace('_', ' ', $skin_color) }},
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Blood Group</label>
                                <?php 
                                $blood_groups = json_decode($preference->blood_group) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($blood_groups as $blood_group)
                                        {{str_replace('_', ' ', $blood_group) }},
                                    @endforeach
                                </p>
                            </div>   
                        </div>
                        <div class="col-sm-4">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Hair Color</label>
                                    <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $preference->hair_color}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Eye Color</label>
                                    <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $preference->eye_color}}
                                    </p>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Disabilities?</label>
                                    <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                        {{ $preference->disabilities_status}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="border-bottom pt-2">Education and Profession</h5>
                    <div class="row bg-off-pink bg-body-green">
                        <div class="col-md-4">
                            <div class="other-area">
                                <div class="form-group mb-1">
                                    <label class="mb-0 form-label">Education Level</label>
                                    <?php 
                                    $education_levels = json_decode($preference->education_level) ;
                                    ?>
                                    <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                        @foreach($education_levels as $education_level)
                                            {{str_replace('_', ' ', $education_level) }},
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Major Subject</label>
                                <?php 
                                $subjects = json_decode($preference->subject) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($subjects as $subject)
                                        {{str_replace('_', ' ', $subject) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">My Profession</label>
                                <?php 
                                $professions = json_decode($preference->profession) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($professions as $profession)
                                        {{str_replace('_', ' ', $profession) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>

                    <h5 class="border-bottom pt-2">Address</h5>
                    <div class="row bg-off-pink bg-body-green">
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Country of Residence</label>
                                <?php 
                                $countries = json_decode($preference->country) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($countries as $country)
                                        {{str_replace('_', ' ', $country) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">District</label>
                                <?php 
                                $districts = json_decode($preference->district) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($districts as $district)
                                        {{str_replace('_', ' ', $district) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Citizenship</label>
                                <?php 
                                $citizenships = json_decode($preference->citizenship) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($citizenships as $citizenship)
                                        {{str_replace('_', ' ', $citizenship) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                                        
                    <h5 class="border-bottom pt-2">Others</h5>
                    <div class="row bg-off-pink bg-body-green">
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Smoke?</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->smoke_status}}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Addicted to alcohol?</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{ $preference->alcohol_status}}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Diat Status</label>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    {{str_replace('_', ' ', $preference->diat_status) }}
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-1">
                                <label class="mb-0 form-label">Language preferance</label>
                                <?php 
                                $languages = json_decode($preference->language) ;
                                ?>
                                <p class="pl-2 m-0 bg-light text-dark font-weight-bold">
                                    @foreach($languages as $language)
                                        {{str_replace('_', ' ', $language) }},
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-9 d-flex justify-content-center d-flex align-items-center">
               <a class="btn btn-lg mt-2 btn-primary" href="{{route('member.preference.create')}}">
                    <i class="nav-icon fas fa-plus"></i> Set Preference
                </a>
            </div>
            @endif

        </div>
    </div>
    </div>
</section>
@endsection

@push('scripts')
@endpush


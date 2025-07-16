@extends('author.layouts.master')
@section('title','Author | Dashboard')
<style type="text/css">
    .circle-tile {
    margin-bottom: 15px;
    text-align: center;
    }
    .circle-tile-heading {
        border: 3px solid rgb(148 184 122);
        border-radius: 100%;
        color: #cf51a480;
        height: 80px;
        margin: 0 auto -40px;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        width: 80px;
    }
    .circle-tile-heading i {
        line-height: 80px;
    }
    .circle-tile-content {
        padding-top: 50px;
    }
    .circle-tile-number {
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
        padding: 5px 0 15px;
    }
    .circle-tile-description {
        text-transform: uppercase;
    }
    .circle-tile-footer {
        background-color: rgba(0, 0, 0, 0.1);
        display: block;
        padding: 5px;
        transition: all 0.3s ease-in-out 0s;
    }
    .circle-tile-footer:hover {
        background-color: rgba(0, 0, 0, 0.2);
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
    }

    .tile-img {
        text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
    }
</style>
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9">
                @include('author.partials.progress_message')
                <div class="row mt-2">
                    <div class="container bootstrap snippets bootdey">     
                        <div class="row">
                        <div class="col-md-4">
                          <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fas fa-paper-plane fa-3x"></i>
                                    
                                </div>
                            </a>
                            <div class="circle-tile-content bg-light-green">
                                <div class="circle-tile-description"> Sent Message </div>
                                <div class="circle-tile-number">0</div>
                                <a class="circle-tile-footer" href="#" class="form-label">
                                    More Info<i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </div>
                          </div>
                        </div> 
                         
                        <div class="col-md-4">
                          <div class="circle-tile ">
                            <a href="#"><div class="circle-tile-heading "><i class="far fa-comments fa-fw fa-3x"></i></div></a>
                            <div class="circle-tile-content bg-light-green">
                              <div class="circle-tile-description text-faded"> Recieved Message </div>
                              <div class="circle-tile-number text-faded ">0</div>
                              <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                          </div>
                        </div> 

                        <div class="col-md-4">
                          <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-ring fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content bg-light-green">
                              <div class="circle-tile-description text-faded"> Proposal </div>
                              <div class="circle-tile-number text-faded ">0</div>
                              <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                            </div>
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
    // loggedIn = $.trim(localStorage.getItem("userLoggedIn"));
    // if (loggedIn != "1") {
    //     window.location.href = "{{ route('index') }}";
    // }
</script>
@endpush
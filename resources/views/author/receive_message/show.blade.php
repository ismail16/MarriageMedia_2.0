@extends('author.layouts.master')
@section('title','Show Received Message')
@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('author.partials.sidebar')
        </div>
        <div class="col-md-9 mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-2 mb-2 bg-light-green">
                            <div class="card-header pb-0 pt-2">
                                <div >
                                    <h3>Received Message</h3>
                                </div>
                            </div>  
                            <div class="card-body p-2">
                                <ul class="timeline timeline-left">
                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="timeline-panel bg-light">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">
                                                    Sent To :
                                                    <a href="{{ route('single_groom_bride', $sent_from->id) }}" target="_blank"> 
                                                        {{ $sent_from->first_name }} {{ $sent_from->last_name }} 
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge success">
                                            <i class="fab fa-product-hunt"></i>
                                        </div>
                                        <div class="timeline-panel bg-light">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">
                                                    Subject : {{ $receive_message->subject }}
                                                </h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge success">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="timeline-panel bg-light">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">
                                                    Message : {{ $receive_message->message }}
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


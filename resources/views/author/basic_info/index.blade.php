@extends('author.layouts.master')
@section('title', 'Author | Basic Info')
@section('content')
    <section class="content session_contect">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('author.partials.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @if (session()->has('message'))
                            <div class="col-lg-12 col-xl-12 d-flex justify-content-center session_message">
                                <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                                    {{ session('message') }}
                                    <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-2 mb-2 bg-light-green">
                                        <div class="card-header pb-0 pt-2">
                                            <div class="">
                                                <a class="float-right btn btn-sm btn-primary"
                                                    href="{{ route('member.basic-info.edit', $user->id) }}">
                                                    <i class="nav-icon fas fa-edit"></i> Edit
                                                </a>
                                            </div>
                                            <div>
                                                <h4>Basic Information</h4>
                                            </div>
                                        </div>
                                        <div class="card-body bg-body-green p-2">
                                            <div class="form-row">
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Name</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->first_name }}
                                                        {{ $user->last_name }}</p>
                                                </div>
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Email address</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->email }}</p>
                                                </div>
                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">mobile</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->mobile }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Gender</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->gender }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Profession</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ str_replace('_', ' ', $user->profession) }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Meretial status</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ str_replace('_', ' ', $user->marital_status) }}</p>
                                                </div>

                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Birthday</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->birthday }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Country</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->country->name ?? 'N/A' }}
                                                    </p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Division</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ $user->division->name ?? 'N/A' }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">City / District</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ $user->district->name ?? 'N/A' }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Upazila/Thana</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ $user->upazila->name ?? 'N/A' }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Looking For</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->looking_for }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Religion</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->religion }}</p>
                                                </div>

                                                <div class="form-group mb-1 col-md-4">
                                                    <label class="mb-0 form-label">Caste</label>
                                                    <p class="border p-1 m-0 text-dark">
                                                        {{ str_replace('_', ' ', $user->social_order) }}</p>
                                                </div>

                                                <div class="col-md-4 form-group mb-1">
                                                    <label class="mb-0 form-label">Profile Create By</label>
                                                    <p class="border p-1 m-0 text-dark">{{ $user->createdby }}</p>
                                                </div>
                                            </div>
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

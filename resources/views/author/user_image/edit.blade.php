@extends('author.layouts.master')
@section('title','Edit Profile Image')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2 bg-light-green ">
                    <div class="p-4 m-4">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{route('member.images.update', $UserProfileImage->id)}}" method="post" enctype="multipart/form-data" class="p-3 bg-body-green">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{$UserProfileImage->user_id}}" name="user_id">
                            <div class="form-row">
                                <div class="col-md-5 form-group mb-1 mr-2">
                                    <label class="mb-0">Image </label>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <img height="65" width="100" src="{{asset('images/user_profile_image/'.$UserProfileImage->image)}}"
                                                 alt="{{$UserProfileImage->image}}"> 
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control-sm w-100 border" style="padding: 1px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="form-group mb-2 col-md-12">
                                            <label class="mb-0">Show Frontend</label>
                                            <select id="status" name="status" class="form-control-sm w-100" >
                                                <option value="1" {{$UserProfileImage->status==1?'selected':''}}>Yes</option>
                                                <option value="0" {{$UserProfileImage->status==0?'selected':''}}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-1 col-md-12">
                                            <label class="mb-0">Set Profile</label>
                                            <select id="profile_image" name="profile_image" class="form-control-sm w-100" >
                                                <option value="1" {{$UserProfileImage->profile_image==1?'selected':''}}>Yes</option>
                                                <option value="0" {{$UserProfileImage->profile_image==0?'selected':''}}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                               
                            </div> 
                            <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" name="upload" value="upload" id="upload" class="btn btn-primary mt-4 mb-3"><i class="fa fa-fw fa-sync"></i> Update</button>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
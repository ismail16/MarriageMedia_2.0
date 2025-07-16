@extends('author.layouts.master')
@section('title','Create Profile Image')
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
                <div class="card mt-2 bg-light-green">
                    <div class="p-4 m-4">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{route('member.images.store')}}" method="post" enctype="multipart/form-data" class="p-3 bg-body-green">
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <div class="form-row">
                                <div class="col-md-6 form-group mb-1">
                                    <label class="mb-0">Image </label>   
                                    <input type="file" name="image" class="form-control-sm w-100 border" style="padding: 1px;">
                                </div>

                                <div class="form-group mb-1 col-md-6">
                                    <label class="mb-0">Show Frontend</label>
                                    <select id="gender" name="status" class="form-control-sm w-100" >
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" name="upload" value="upload" id="upload" class="btn btn-primary mt-4 mb-3"><i class="fa fa-fw fa-upload"></i> Upload</button>
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
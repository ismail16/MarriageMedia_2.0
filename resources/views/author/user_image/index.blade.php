@extends('author.layouts.master')
@section('title','Show Profile Image')

@push('css')
    <link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('content')
<section class="content session_contect">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('author.partials.sidebar')
            </div>
            <div class="col-md-9 mt-2">
                @include('author.partials.progress_message')

                <div class="row">
                    @if(session()->has('message'))
                        <div class="col-lg-12 col-xl-12 d-flex justify-content-center session_message">
                            <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                                {{session('message')}}
                                <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if($ProfileImage)
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center border">
                                <img height="200" src="{{asset('images/user_profile_image/'.$ProfileImage->image)}}"
                                     alt="{{$ProfileImage->image}}">
                            </div>
                            <div class="col-md-12 p-2 border text-center">
                                <h2 class="mb-0">Profile Image</h2>
                                @if($ProfileImage->status == 0 )
                                    <button class="btn btn-xs bg-red-active"><i class="fa fa-times-circle"></i> Not Show Public</button>
                                @else
                                    <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Show Public</button>
                                @endif
                                <a href="{{route('member.images.edit', $ProfileImage->id)}}"
                                   class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                <form action="{{route('member.images.destroy', $ProfileImage->id)}}" method="post"
                                      style="display: inline;"
                                      onsubmit="return confirm('Are you Sure? Want to delete')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    
                    @foreach($UserProfileImages as $UserProfileImage)
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center border">
                                <img height="200" src="{{asset('images/user_profile_image/'.$UserProfileImage->image)}}"
                                     alt="{{$UserProfileImage->image}}">
                            </div>
                            <div class="col-md-12 border p-2 text-center">
                                <h2 class="mb-0">Gallary Image</h2>
                                @if($UserProfileImage->status == 0 )
                                    <button class="btn btn-xs bg-red-active"><i class="fa fa-times-circle"></i> Not Show Public</button>
                                @else
                                    <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Show Public</button>
                                @endif
                                <a href="{{route('member.images.edit', $UserProfileImage->id)}}"
                                   class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                <form action="{{route('member.images.destroy', $UserProfileImage->id)}}" method="post"
                                      style="display: inline;"
                                      onsubmit="return confirm('Are you Sure? Want to delete')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="p-5">
                            <a href="{{ route('member.images.create') }}" class="btn btn-lg btn-primary"> 
                            <i class="fa fa-plus"></i> Add New Image
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="card mt-2 mb-2 bg-light-green">
                            <div class="card-body">
                                <div class="table-responsive">
                                <a href="{{ route('member.images.create') }}" class="float-right btn btn-sm btn-primary ml-1"> <i
                                    class="fa fa-plus"></i> Add New Image</a>
                                <table id="example1" class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr>
                                            <th class="form-label">S.N</th>
                                            <th class="form-label">Image</th>
                                            <th class="form-label">status</th>
                                            <th class="form-label">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($UserProfileImages as $UserProfileImage)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    <img height="65" width="100" src="{{asset('images/user_profile_image/'.$UserProfileImage->image)}}"
                                                         alt="{{$UserProfileImage->image}}">
                                                </td>
                                                <td class="text-center">
                                                    @if($UserProfileImage->status == 0 )
                                                        <button class="btn btn-xs bg-red-active"><i class="fa fa-times-circle"></i> Not Show frontend</button>
                                                    @else
                                                        <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Show frontend</button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('member.images.edit', $UserProfileImage->id)}}"
                                                       class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                                    <form action="{{route('member.images.destroy', $UserProfileImage->id)}}" method="post"
                                                          style="display: inline;"
                                                          onsubmit="return confirm('Are you Sure? Want to delete')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
    </div>
    </div>
</section>
@endsection


@push('scripts')
    <script src="{{asset('backend_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
        })
    </script>

@endpush
@extends('author.layouts.master')
@section('title','Image request')

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
            <div class="col-md-9">
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
                    <div class="col-md-12">
                        <div class="card mt-2 mb-2 bg-light-green">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr>
                                            <th class="form-label">S.N</th>
                                            <th class="form-label">Name</th>
                                            <th class="form-label">Image</th>
                                            <th class="form-label">Status</th>
                                            <th class="form-label">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($user_req_for_images as $user_image_acces)
                                            <?php 
                                            $req_users = \App\user::where('id', $user_image_acces)->first();
                                            $req_user_image = App\Models\UserProfileImage::where('id', $user_image_acces)->first();
                                            ?>
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    <a href="{{ route('single_groom_bride', $req_users->id) }}" target="_blank">
                                                        {{ $req_users->first_name}} {{ $req_users->last_name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($req_user_image)
                                                        <img src="{{ asset('images/user_profile_image/'. $req_user_image->image) }}" height="65" width="100">
                                                    @else
                                                        @if($req_users->gender == 'Female')
                                                            <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}" height="65" width="100">
                                                        @else
                                                            <img src="{{ asset('images/icons/flaticon/businessman.png') }}" height="65" width="100">
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="btn btn-xs btn-warning">
                                                         <i class="fa fa-spinner"></i>
                                                        pending
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('member.image_access_approved') }}" method="post"style="display: inline;" onsubmit="return confirm('Are you Sure? Want to Approved')">
                                                        @csrf
                                                        <input type="hidden" name="image_request_to_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="image_request_from_id" value="{{ $req_users->id }}">
                                                        <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></button>
                                                    </form>

                                                    <!-- <a href="#" class="btn btn-xs btn-success"><i class="fas fa-window-close"></i></a> -->

                                                    <form action="#" method="post"
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
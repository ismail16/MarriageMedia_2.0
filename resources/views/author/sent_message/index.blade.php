@extends('author.layouts.master')
@section('title','Message Sent')

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
                                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr>
                                            <th class="form-label">S.N</th>
                                            <th class="form-label">Message To</th>
                                            <th class="form-label">Image</th>
                                            <th class="form-label">Subject</th>
                                            <th class="form-label">Message</th>
                                            <th class="form-label">Status</th>
                                            <th class="form-label">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sent_messages as $sent_message)
                                            @php  
                                                $sent_to = \App\User::find($sent_message->to_id);
                                                $sent_to_image = \App\Models\UserProfileImage::Where('user_id', $sent_to->id)->where('status', 1)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    <a href="{{ route('single_groom_bride', $sent_to->u_id) }}" target="_blank">
                                                        {{ $sent_to->first_name}} {{ $sent_to->last_name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($sent_to_image)
                                                    <img src="{{ asset('images/user_profile_image/'.$sent_to_image->image) }}" class="img-fluid" style="width: 50px;">
                                                    @else
                                                        @if($sent_to->gender == 'Female')
                                                            <img src="{{ asset('images/icons/flaticon/arab-woman.png') }}" style="width: 50px;">
                                                        @else
                                                            <img src="{{ asset('images/icons/flaticon/businessman.png') }}" style="width: 50px;">
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{$sent_message->subject}}</td>
                                                <td class="w-25">{{$sent_message->message}}</td>
                                                
                                                <td class="text-center">
                                                    @if($sent_message->opened == 0 )
                                                        <button class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Not Seen</button>
                                                    @else
                                                        <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Seen</button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('member.sent-message.show', $sent_message->id)}}"
                                                       class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                    <form action="{{route('member.sent-message.destroy', $sent_message->id)}}" method="post"
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
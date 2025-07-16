@extends('author.layouts.master')
@section('title','Message Receive')

@push('css')
    <link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <style type="text/css">
        .btn-xs{
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
        }
        .bg-off-pink{
            background-color: pink;
            color: #000;
        }
        .session_contect{
            position: relative;
        }
        .session_message{
            position: absolute;
            z-index: 1;
            top: -38px;
        }
        .table tbody tr td{
            padding: 0px 0px !important;
        }
    </style>
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
                                <table id="example1" class="table table-striped table-sm bg-light">
                                    <thead>
                                        <tr>
                                            <th class="form-label">S.N</th>
                                            <th class="form-label">Message From</th>
                                            <th class="form-label">Image</th>
                                            <th class="form-label">Subject</th>
                                            <th class="form-label">Message</th>
                                            <th class="form-label">Status</th>
                                            <th class="form-label">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($receive_messages as $receive_message)
                                            @php  
                                                $sent_from = \App\User::find($receive_message->from_id);
                                                $sent_from_image = \App\Models\UserProfileImage::Where('user_id', $sent_from->id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    <a href="{{ route('single_groom_bride', $sent_from->id) }}" target="_blank">
                                                        {{ $sent_from->first_name}} {{ $sent_from->last_name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($sent_from_image)
                                                        <img src="{{ asset('images/user_profile_image/'.$sent_from_image->image) }}" class="img-fluid" style="width: 50px;">
                                                    @else
                                                        <img src="{{ asset('images/default.png') }}" class="img-fluid" style="width: 50px;">
                                                    @endif
                                                    
                                                </td>
                                                <td>{{$receive_message->subject}}</td>
                                                <td class="w-25">{{$receive_message->message}}</td>
                                                
                                                <td class="text-center">
                                                    @if($receive_message->opened == 0 )
                                                        <button class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Not Seen</button>
                                                    @else
                                                        <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Seen</button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('member.receive-message.show', $receive_message->id)}}"
                                                       class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                    <form action="{{route('member.receive-message.destroy', $receive_message->id)}}" method="post"
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
                                    </tfoot>
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
</div>
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
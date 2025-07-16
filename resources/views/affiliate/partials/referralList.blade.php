<div class="active tab-pane" id="activity">

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2 mb-2 bg-light-green">
                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped bg-light">
                            <thead>
                                <tr>
                                    <th class="form-label">S.N</th>
                                    <th class="form-label">Name</th>
                                    <th class="form-label">Mobile</th>
                                    <th class="form-label">Email</th>
                                    <th class="form-label">Credit</th>
                                    <th class="form-label">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referral_users as $refuser)
                                @include('admin.partials.modal')

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$refuser->user->first_name ?? 'N/A' }}</td>
                                    <td>{{$refuser->user->mobile ?? 'N/A' }}</td>
                                    <td>{{$refuser->user->email ?? 'N/A'}}</td>
                                    <td>{{$refuser->credit}}</td>
                                    <td class="text-center">
                                        @if($refuser->status == 0 )
                                        <button class="btn btn-xs bg-warning"><i class="fa fa-spinner"></i> Pending</button>
                                        @elseif($refuser->status == 1 )
                                        <button class="btn btn-xs bg-success"><i class="fa fa-check-circle"></i> Accepted</button>
                                        @else
                                        <button class="btn btn-xs bg-danger"><i class="fa fa-times-circle"></i> Declined</button>

                                        @endif
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
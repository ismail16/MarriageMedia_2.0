<div class="tab-pane" id="timeline">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2 mb-2 bg-light-green">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped bg-light">
                                <thead>
                                    <tr>
                                        <th class="form-label">S.N</th>
                                        <th class="form-label">Payment Method</th>
                                        <th class="form-label">AC Number</th>
                                        <th class="form-label">Amount</th>
                                        <th class="form-label">Date</th>
                                        <th class="form-label">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$payment->payment_method}}</td>
                                        <td>{{$payment->account_number}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->created_at->format('Y-m-d')}}</td>
                                        <td class="text-center">
                                            @if($payment->status == 0 )
                                            <button class="btn btn-xs bg-warning"><i class="fa fa-spinner"></i> Pending</button>
                                            @elseif($payment->status == 1 )
                                            <button class="btn btn-xs bg-success"><i class="fa fa-check-circle"></i> Accepted</button>
                                            @else
                                            <button class="btn btn-xs bg-info"><i class="fa fa-dollar-sign"></i> Paid</button>

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
</div>
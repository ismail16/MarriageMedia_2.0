<div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('affiliate.wallet.store')}}" method="post">
            @method('post')
            @csrf



            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title text-success" id="exampleModalLongTitle">
                        Balance Withdraw</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-md-5 col-form-label">Name Of Bank:</label>
                        <div class="col-md-7">
                            <select class="form-control" name="payment_method" required>
                                <option value="" disabled selected>Select payment method</option>
                                <option value="bkash">Bkash</option>
                                <option value="nagad">Nagad</option>
                                <option value="rocket">Rocket</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-md-5 col-form-label">Account Number:</label>
                        <div class="col-md-7">
                            <input class="form-control" type="number" name="account_number" value="" required placeholder="Enter Your AC Number...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-md-5 col-form-label">Withdraw Amount:</label>
                        <div class="col-md-7">
                            <input class="form-control" type="number" name="amount" value="" required placeholder="Enter amount..." min="500">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm  btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Withdraw</button>
                </div>
            </div>
        </form>
    </div>
</div>
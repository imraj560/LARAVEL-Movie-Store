<div class="row" style="padding:20px;">

    <div class="col-md-8" style="margin: 0 auto 0 auto;">
        <div class="card">
        <div class="card-header">
          Your Checkout Details
          <span id="totalAmount" style="float:right; color:red; font-weight:bold; font-size:20px;">${{ $paidAmount }}</span>
        </div>
        <div class="card-body">

            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" class="form-control" id="number" placeholder="Enter phone">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Pin</label>
                        <input type="text" class="form-control" id="pin" placeholder="Enter pin">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address">
                            </div>

                    </div>
                </div>

            </form>

        </div>
      </div>
        <div class="card" style="margin-top:20px; width:30%; float:right;">
            <h5 class="card-header">Payment Options</h5>
            <div class="card-body">

                <button class="btn btn-success" style="color:white;">Cash on Delivery</button>
                <button class="btn btn-primary" style="color:white;">Paypal</button>

            </div>
          </div>


    </div>



</div>

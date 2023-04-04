<div class="row" style="padding:20px;">

    <div class="col-md-8" style="margin: 0 auto 0 auto;">
        <div class="card">
        <div class="card-header">
          Your Checkout Details
          <span id="totalAmount" style="float:right; color:red; font-weight:bold; font-size:20px;">${{ $paidAmount }}</span>
        </div>
        <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" wire:model.defer="fullname" class="form-control" id="fullname" placeholder="Enter Name">
                        </div>
                        @error('fullname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <span id="msg_name" style="color:red;"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input wire:model.defer="phone" type="number" class="form-control" id="phone" placeholder="Enter phone">
                        </div>
                        @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <span id="msg_phone" style="color:red;"></span>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input wire:model.defer="email" type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <span id="msg_email" style="color:red;"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Pin</label>
                        <input wire:model.defer="pincode" type="text" class="form-control" id="pincode" placeholder="Enter pin">
                        </div>
                        @error('pincode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <span id="msg_pin" style="color:red;"></span>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input wire:model.defer="address" type="text" class="form-control" id="address" placeholder="Enter address">
                            </div>

                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <span id="msg_address" style="color:red;"></span>

                    </div>
                </div>

        </div>
      </div>
        <div class="card" style="margin-top:20px; width:50%; float:right;">
            <h5 class="card-header">Payment Options</h5>
            <div class="card-body">

                <div class="tab-content col-md-12" id="v-pills-tabContent">

                    <h6>Please select mode of payment</h6>
                    <button id="cash_btn" class="btn btn-primary btn-xs">Cash</button> <button id="online_btn" class="btn btn-info btn-xs">Paypal</button>
                      <hr/>

                    <div id="cod_div" style="margin-bottom:20px; display:none;">


                        <button wire:loading.attr="disabled" style="width:100%;" type="button" wire:click="codOrder" class="btn btn-primary">
                            <span wire:traget="codOrder" wire:loading.remove>
                                Place Order (Cash on Delivery)
                            </span>

                            <span wire:target="codOrder" wire:loading>
                                Placing Order..Please wait
                            </span>

                        </button>

                    </div>


                    <div id="paypal_div" style="display:none">

                        <div id="paypal-button-container"></div>

                    </div>


                </div>

            </div>
          </div>


    </div>



</div>

@section('scripts')

<script>
    document.getElementById('cash_btn').onclick = ()=>{

       document.getElementById('cod_div').style.display = 'block';
       document.getElementById('paypal_div').style.display = 'none';
    }

    document.getElementById('online_btn').onclick = ()=>{

    document.getElementById('cod_div').style.display = 'none';
    document.getElementById('paypal_div').style.display = 'block';


    }
</script>


@endsection

@push('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=Af5YnHo-LRkdC_wR28UNQeskfhdhQVESuzt85mBvSr7NFplEy062ptzXCY-V67rvqDWXbOzM_47oJpQr&currency=USD"></script>

<script>


     paypal.Buttons({

        onClick: function()  {

        // Show a validation error if the checkbox is not checked
        if (!document.getElementById('fullname').value || !document.getElementById('phone').value || !document.getElementById('email').value || !document.getElementById('pincode').value
             || !document. getElementById('address').value){

             document.getElementById('msg_name').textContent = 'Please fill out this field';
             document.getElementById('msg_phone').textContent = 'Please fill out this field';
             document.getElementById('msg_email').textContent = 'Please fill out this field';
             document.getElementById('msg_pin').textContent = 'Please fill out this field';
             document.getElementById('msg_address').textContent = 'Please fill out this field';
           

            return false;

        }else{

            @this.set('fullname', document.getElementById('fullname').value);
            @this.set('email', document.getElementById('email').value);
            @this.set('phone', document.getElementById('phone').value);
            @this.set('pincode', document.getElementById('pincode').value);
            @this.set('address', document.getElementById('address').value);
        }
        },

      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '0.1' //"{{ $this->totalProductAmount }}" // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];

          if(transaction.status == "COMPLETED"){
            Livewire.emit('transactionEmit',transaction.id);
          }

          //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

        });
      }
    }).render('#paypal-button-container');

   
  </script>
@endpush

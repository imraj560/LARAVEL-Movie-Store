
<div class="row" style="width:100vw">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
<div class="d-flex justify-content-center">
    <div class="col-md-10" style="text-align:center; padding:20px 15px">
        <h3 style="margin-bottom:40px">Your cart details goes here</h3>
        {{-- Delete Modal Begins here --}}

                <div wire:ignore.self class="modal fade" id="deleteCartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <span style="font-size:18px;" class="modal-title fs-5" id="exampleModalLabel">Alert</span>
                        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                            <form wire:submit.prevent="destroyCart">
                                <div class="modal-body">
                                    <span style="font-size:18px;">Remove from Cart?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Yes. Delete</button>
                            </div>
                        </form>



                    </div>
                    </div>
                </div>

                {{-- Delete Modal Ends here --}}
        <table class="table table-stripped" style=" width:70%; margin:0 auto 0 auto">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($carts as $cart)
                    <tr>
                        <td>{{ $cart->movies->name }}</td>
                        <td>{{ $cart->movies->genre->name }}</td>
                        <td>RM: {{ $cart->movies->price }}</td>
                        <td><img src="{{ asset($cart->movies->image) }}" width="80" height="120"></td>
                        <td>
                            <button wire:click="deleteCart({{ $cart->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCartModal">Delete</button>
                        </td>
                    </tr>

                    @php
                        $totalPrice += $cart->movies->price;
                    @endphp
                @empty

                <h5>Your cart is Empty</h5>

                @endforelse


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"><h3>Total RM: {{ $totalPrice }}</h3></td>
                </tr>
                <tr>
                    @if($totalPrice != 0)
                        <td colspan="5"><a href="{{ url('/checkout') }}"><button class="btn btn-success float-end">Checkout</button></a></td>
                    @endif

                </tr>
            </tfoot>
        </table>


    </div>


</div>



</div>

</div>

@push('script')

<script>
 document.addEventListener('DOMContentLoaded', () => {
    var modal = new bootstrap.Modal('#deleteCartModal');
    document.addEventListener('close-modal', () => {
        modal.hide();
    });
});

 </script>

@endpush

<div class="d-flex justify-content-center">
    <div class="col-md-10" style="text-align:center; padding:20px 15px">
        <h3 style="margin-bottom:40px">Your cart details goes here</h3>
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
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                @empty

                @endforelse


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"><h3>Total RM: 55.45</h3></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

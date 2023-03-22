<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Movies
        </div>

        <div class="card-body">

            <div>
                {{-- Delete Modal Begins here --}}

                <div wire:ignore.self class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <span style="font-size:18px;" class="modal-title fs-5" id="exampleModalLabel">Alert</span>
                          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                            <form wire:submit.prevent="destroyOrder">
                                <div class="modal-body">
                                    <span style="font-size:18px;">Are you sure you want to delete this Order?</span>
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
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Trackig Id</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr>
                        <td>{{ $order->fullname }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->tracking_no }}</td>
                        <td>
                           <a type="button" class="btn btn-primary btn-sm" href="{{ url('/admin/order/download/'.$order->id) }}">Pdf</a>
                            <button wire:click="deleteOrder({{ $order->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteOrderModal">Delete</button>
                        </td>

                    </tr>

                    @empty

                    <tr colspan="6">
                        <td>No Orders Added</td>
                    </tr>

                    @endforelse

                </tbody>
            </table>

            {{ $orders->links() }}

            </div>



        </div>
      </div>
    </div>
  </div>


@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $("#deleteMovieModal").modal('hide');

    })
    </script>

@endpush

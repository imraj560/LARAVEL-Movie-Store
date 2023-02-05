
<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Movies

         <a href="{{ url('admin/movie/create') }}" class="btn btn-primary btn-sm text-white float-end text-white">Add Movies</a>
        </div>

        <div class="card-body">

            <div>
                {{-- Delete Modal Begins here --}}

                <div wire:ignore.self class="modal fade" id="deleteMovieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <span style="font-size:18px;" class="modal-title fs-5" id="exampleModalLabel">Alert</span>
                          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                            <form wire:submit.prevent="destroyMovie">
                                <div class="modal-body">
                                    <span style="font-size:18px;">Are you sure you want to delete this Movie?</span>
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
                        <th>Image</th>
                        <th>Genre</th>
                        <th>Language</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($movies as $movie)

                    <tr>
                        <td>{{ $movie->name }}</td>
                        <td>
                            @if ($movie->image)
                                  <img src="{{ asset($movie->image) }}" />
                            @else
                                No Image Found
                            @endif

                        </td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>{{ $movie->language->name }}</td>
                        <td>{{ $movie->price }}</td>
                        <td>{{ $movie->status == 1 ? 'Not Active' : 'Active' }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm"><a style="text-decoration:none; color:white;" href="{{ url('admin/movie/edit/'.$movie->id) }}">Edit</a></button>
                            <button wire:click="deleteMovie({{ $movie->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMovieModal">Delete</button>
                        </td>

                    </tr>

                    @empty

                    <tr colspan="6">
                        <td>No Movies Added</td>
                    </tr>

                    @endforelse

                </tbody>
            </table>

            {{ $movies->links() }}

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

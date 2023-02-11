<div class="row" style="padding:20px 30px">
    <div class="col-2">
        <div class="card">
            <div class="card-header" style="background:black; color:white;"><h4>Genre</h4></div>
                <div class="card-body">
                    @forelse ($genres as $genre)

                    <div class="form-check">
                        <input wire:model="genreInputs" class="form-check-input" type="checkbox" value="{{ $genre->id }}"/>
                        <label class="form-check-label" for="exampleCheck1">{{ $genre->name }}</label>
                      </div>

                    @empty

                    @endforelse

            </div>

            <div class="card-header" style="background:black; color:white;"><h4>Language</h4></div>
            <div class="card-body">

                @forelse ($languages as $language)

                <div class="form-check">
                    <input wire:model="languageInputs" class="form-check-input" type="checkbox" value="{{ $language->id }}"/>
                    <label class="form-check-label" for="exampleCheck1">{{ $language->name }}</label>
                  </div>

                @empty

                @endforelse




        </div>

        <div class="card-header" style="background:black; color:white;"><h4>Price</h4></div>
                <div class="card-body">


                    <label class="d-block">
                        <input name="priceSort" class="form-check-input" wire:model="priceInput" type="radio" value="high-to-low"/> High To Low

                    </label>

                    <label class="d-block">
                    <input name="priceSort" class="form-check-input" wire:model="priceInput" type="radio" value="low-to-high"/> High To Low
                    </label>


            </div>
        </div>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="form-group" style="margin-bottom:20px;">

                <input style="border:2px solid black;" type="text" class="form-control" id="search" name="search" placeholder="Enter Movie Name">
              </div>
              @forelse ($movies as $movie)

              <div class="col-3">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ $movie->image }}" alt="Card image cap">
                    <div class="card-body" style="background:black; color:white;">
                      <p class="card-text">{{ $movie->name }} : RM {{ $movie->price }}</p>
                    </div>
                  </div>
            </div>

              @empty

              @endforelse


        </div>
    </div>
</div>

<div class="row" style="padding:20px 30px">
    <div class="col-2">
        <div class="card">
            <div class="card-header" style="background:black; color:white;"><h4>Genre</h4></div>
                <div class="card-body">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Horror</label>
                      </div>

                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Comedy</label>
                      </div>

                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Documentary</label>
                      </div>


            </div>

            <div class="card-header" style="background:black; color:white;"><h4>Language</h4></div>
            <div class="card-body">

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">English</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Hindi</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Spanish</label>
                  </div>


        </div>

        <div class="card-header" style="background:black; color:white;"><h4>Price</h4></div>
                <div class="card-body">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Low To High</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">High To Low</label>
                      </div>


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

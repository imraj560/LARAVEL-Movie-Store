@extends('layouts.admin');

@section('title','Edit Movies')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Add Movies

         <a href="{{ url('admin/movie') }}" class="btn btn-primary btn-sm text-white float-end text-white">Back</a>
        </div>

        <div class="card-body">

            <form method="post" action="{{ url('/admin/movie/update/'.$movies->id) }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Movie Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $movies->name }}">
                   @error('name')
                        <span style="color:red; font-size:15px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                     @error('image')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>
                  <img src="{{ asset($movies->image) }}" width="70px" height="100px" /><br><br>

                  <div class="mb-3">
                    <label for="language_id" class="form-label">Language</label>
                    <select class="form-control" id="language_id" name="language_id">
                        <option value="{{ $movies->language->id }}">{{ $movies->language->name }}</option>
                        @forelse ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @empty
                        <option value="">No Language Available</option>
                    @endforelse
                      </select>
                     @error('language_id')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select class="form-control" id="genre_id" name="genre_id">
                        <option value="{{ $movies->genre->id }}">{{ $movies->genre->name }}</option>
                        @forelse ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @empty
                        <option value="">No genre Available</option>
                        @endforelse
                      </select>
                     @error('genre_id')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $movies->price }}">
                     @error('price')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>
                <div class="mb-3 form-check" style="padding-left:22px;">
                  <input type="checkbox" name="status" class="form-check-input" {{ $movies->status == '1' ? '' : 'checked' }} id="status">
                  <label class="form-check-label" for="exampleCheck1">Active if Checked</label>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
              </form>


        </div>
      </div>
    </div>
  </div>


@endsection

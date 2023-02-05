@extends('layouts.admin')

@section('title','Add Genre')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <h2>{{ session('message') }}</h2>
      @endif
      <div class="card">

        <div class="card-header">
         Genre

         <a href="{{ url('admin/genre/view') }}" class="btn btn-primary btn-sm text-white float-end text-white">Back</a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ url('/admin/genre/store') }}">
                @csrf
                <div class="mb-3">
                  <label for="genre_name" class="form-label">Genre Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                  <div id="genre_name" class="form-text">Horror, crime etc</div>
                   @error('name')
                        <span style="color:red; font-size:15px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-check" style="padding-left:22px;">
                  <input type="checkbox" name="status" class="form-check-input" id="status">
                  <label class="form-check-label" for="exampleCheck1">Active if Checked</label>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
              </form>


        </div>
      </div>
    </div>
  </div>

@endsection

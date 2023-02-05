@extends('layouts.admin')

@section('title','View Language')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Add Language

         <a href="{{ url('admin/language/view') }}" class="btn btn-primary btn-sm text-white float-end text-white">Back</a>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ url('/admin/language/store') }}">
                @csrf
                <div class="mb-3">
                  <label for="genre_name" class="form-label">Language Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                  <div id="genre_name" class="form-text">English, Hindi, etc</div>
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

@extends('layouts.app')
@section('title','View Movie')

@section('content')

<livewire:frontend.product-view :id="$movies->id" />

@endsection
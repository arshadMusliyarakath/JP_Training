@extends('layouts.master')
@section('title','New User')
@section('content_area')

<form action="{{ route('save.user')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
    @error('name') <p class="alert alert-danger">{{ $message }}</p> @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
    @error('email') <p class="alert alert-danger">{{ $message }}</p> @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" value="1997-12-12">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Upload Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
      <option value="1">Active</option>
      <option value="0">Inactive</option>

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
@extends('layouts.master')
@section('title','Edit User')
@section('content_area')

<form action="{{ route('update.user')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{encrypt($user->user_id)}}">
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
  </div>
  <img src="{{asset('storage/images/'.$user->image)}}" alt="" class='mb-2' style="width: 200px">
  <div class="mb-3">
    <label for="" class="form-label">Change or upload Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" @if($user->status=='1') selected="selected" @endif >Active</option>
        <option value="0" @if($user->status=='0') selected="selected" @endif >Inactive</option>

    </select>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
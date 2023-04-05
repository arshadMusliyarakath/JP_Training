@extends('layouts.master')
@section('title','Admin Users List')
@section('content_area')
<h2>Users</h2>

<h3>Welcome {{ Auth::guard('admin')->user()->name }}</h3>

<a href="{{ route('admin.do.logout') }}" class="btn btn-danger">Logout</a>
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif

<div class="add_btn" style="text-align: right;">
    <a href="{{ route('create.user')}}" class="btn btn-success mt-3 mb-3">Add User</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Orders</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->orders_count}}</td>
            <td> @if($user->trashed()) Trashed @else Active @endif </td>
            <td>
                @if($user->trashed()) <a href="{{ route('activate.user', encrypt($user->user_id))}}" class="btn btn-success">Activate</a> @endif
                <a href="{{ route('view.user', encrypt($user->user_id))}}" class="btn btn-warning">View</a>
                <a href="{{ route('edit.user', encrypt($user->user_id))}}" class="btn btn-primary">Edit</a>
                <a href="{{ route('delete.user', encrypt($user->user_id))}}" class="btn btn-danger   ">Delete</a>
                <a href="{{ route('forceDelete.user', encrypt($user->user_id))}}" class="btn btn-info   ">Force Delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div>{{$users->links()}}</div>
@endsection
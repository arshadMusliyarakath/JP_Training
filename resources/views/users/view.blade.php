@extends('layouts.master')
@section('title','Edit User')
@section('content_area')

<ul>
  <li>Name: {{ $user->name}}</li>
  <li>Email: {{ $user->email}}</li>
</ul>


@if($user->address)
<hr>
<ul>
  <li>Address Line 1: {{ $user->address->address_line_1}}</li>
  <li>City: {{ $user->address->city}}</li>
  <li>Postcode: {{ $user->address->post_code}}</li>
  <li>State: {{ $user->address->state}}</li>
</ul>
@endif


@if($user->orders)
<hr>
<table class="table">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Price</th>
      <th>Status</th>
      <th>PlacedAt</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($user->orders as $order)

    <tr>

      <td>{{ $order->order_id}}</td>
      <td>{{ number_format($order->price,2)}}</td>
      <td>{{ $order->status_text}}</td>
      <td>{{ $order->created_at}}</td>

    </tr>

    @endforeach
    
  </tbody>
</table>
@endif
@endsection
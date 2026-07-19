@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

Pending Room Bookings

</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded mb-6">

{{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow">

<table class="w-full">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4">Guest</th>

<th>Room</th>

<th>Arrival</th>

<th>Departure</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($bookings as $booking)

<tr class="border-b">

<td class="p-4">

{{ $booking->user->first_name }}

{{ $booking->user->last_name }}

</td>

<td>

{{ $booking->room->room_number }}

</td>

<td>

{{ $booking->check_in_date }}

<br>

{{ $booking->arrival_time }}

</td>

<td>

{{ $booking->check_out_date }}

<br>

{{ $booking->departure_time }}

</td>

<td>

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

Pending

</span>

</td>

<td>

<div class="flex gap-2">

<form
action="{{ route('room-bookings.approve',$booking) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="bg-green-700 text-white px-4 py-2 rounded">

Approve

</button>

</form>

<form
action="{{ route('room-bookings.reject',$booking) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="bg-red-700 text-white px-4 py-2 rounded">

Reject

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center py-6">

No pending bookings.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
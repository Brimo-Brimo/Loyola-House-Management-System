@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

Pending Room Bookings

</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

{{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4 text-left">Guest</th>

<th class="p-4">Room</th>

<th class="p-4">Arrival</th>

<th class="p-4">Departure</th>

<th class="p-4">Status</th>

<th class="p-4">Actions</th>

</tr>

</thead>

<tbody>

@forelse($pending as $booking)

<tr class="border-b">

<td class="p-4">

{{ $booking->guest_name }}

</td>

<td>

{{ $booking->room->room_number }}

</td>

<td>

{{ $booking->check_in_date }}

</td>

<td>

{{ $booking->check_out_date }}

</td>

<td>

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

Pending

</span>

</td>

<td>

<div class="flex gap-2">

<form method="POST"

action="{{ route('booking-approvals.approve',$booking) }}">

@csrf

@method('PUT')

<button

class="bg-green-700 text-white px-4 py-2 rounded">

Approve

</button>

</form>

<form method="POST"

action="{{ route('booking-approvals.reject',$booking) }}">

@csrf

@method('PUT')

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

class="text-center p-6 text-gray-500">

No pending bookings.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
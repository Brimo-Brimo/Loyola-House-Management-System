@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

Book Room

</h1>

<div class="bg-white rounded-xl shadow p-8">

<h2 class="text-2xl font-bold">

Room {{ $room->room_number }}

</h2>

<div class="grid grid-cols-2 gap-6 mt-6">

<div>

<strong>Building</strong>

<br>

{{ $room->building->name }}

</div>

<div>

<strong>Wing</strong>

<br>

{{ $room->wing->name }}

</div>

<div>

<strong>Floor</strong>

<br>

{{ $room->floor->name }}

</div>

<div>

<strong>Room Type</strong>

<br>

{{ $room->room_type }}

</div>

<div>

<strong>Capacity</strong>

<br>

{{ $room->capacity }}

</div>

<div>

<strong>Status</strong>

<br>

{{ $room->status }}

</div>

</div>

<form
action="{{ route('room-bookings.store') }}"
method="POST"
class="mt-8">

@csrf

<input
type="hidden"
name="room_id"
value="{{ $room->id }}">

<div class="grid grid-cols-2 gap-6">

<div>

<label>

Arrival Date

</label>

<input
type="date"
name="check_in_date"
class="w-full border rounded p-3"
required>

</div>

<div>

<label>

Arrival Time

</label>

<input
type="time"
name="arrival_time"
class="w-full border rounded p-3"
required>

</div>

<div>

<label>

Departure Date

</label>

<input
type="date"
name="check_out_date"
class="w-full border rounded p-3"
required>

</div>

<div>

<label>

Departure Time

</label>

<input
type="time"
name="departure_time"
class="w-full border rounded p-3"
required>

</div>

</div>

<div class="mt-6">

<label>

Purpose of Visit

</label>

<textarea
name="purpose"
rows="4"
class="w-full border rounded p-3"></textarea>

</div>

<div class="mt-8">

<button
class="bg-green-900 text-white px-8 py-3 rounded-lg">

Submit Booking

</button>

</div>

</form>

</div>

@endsection
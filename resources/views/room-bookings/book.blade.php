@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">

<h1 class="text-3xl font-bold text-green-900 mb-6">

Room Booking

</h1>

<form method="POST"

action="{{ route('room-bookings.store',$room) }}">

@csrf

<div class="grid grid-cols-2 gap-6">

<div>

<label>Name</label>

<input
type="text"
name="guest_name"
class="w-full border rounded-lg p-3"
required>

</div>

<div>

<label>Email</label>

<input
type="email"
name="guest_email"
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Phone</label>

<input
type="text"
name="guest_phone"
class="w-full border rounded-lg p-3"
required>

</div>

<div>

<label>Country</label>

<input
type="text"
name="guest_country"
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Check In</label>

<input
type="date"
name="check_in_date"
required
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Check Out</label>

<input
type="date"
name="check_out_date"
required
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Arrival Time</label>

<input
type="time"
name="arrival_time"
required
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Departure Time</label>

<input
type="time"
name="departure_time"
required
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Guests</label>

<input
type="number"
name="number_of_guests"
value="1"
required
class="w-full border rounded-lg p-3">

</div>

<div class="col-span-2">

<label>Purpose</label>

<textarea
name="purpose"
rows="4"
class="w-full border rounded-lg p-3"></textarea>

</div>

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
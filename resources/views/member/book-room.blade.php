@extends('layouts.admin')

@section('content')

<div class="space-y-8">

<div>

<h1 class="text-3xl font-bold text-green-900">

Book a Guest Room

</h1>

<p class="text-gray-600 mt-2">

Choose an available room for your guest.

</p>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg">

{{ session('error') }}

</div>

@endif

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

@foreach($rooms as $room)

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

<div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-5xl">

🛏

</div>

<div class="p-6">

<h2 class="text-2xl font-bold text-green-900">

Room {{ $room->room_number }}

</h2>

<p class="mt-3">

<b>Building:</b>

{{ $room->building->name }}

</p>

<p>

<b>Wing:</b>

{{ $room->wing->name }}

</p>

<p>

<b>Capacity:</b>

{{ $room->capacity }}

Person(s)

</p>

<p class="mt-2">

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

Available

</span>

</p>

<form method="POST"
action="{{ route('room.booking.store') }}"
class="mt-6">

@csrf

<input
type="hidden"
name="room_id"
value="{{ $room->id }}">

<div class="space-y-3">

<div>

<label>

Arrival Date

</label>

<input
type="date"
name="arrival_date"
required
class="w-full border rounded-lg p-2">

</div>

<div>

<label>

Arrival Time

</label>

<input
type="time"
name="arrival_time"
required
class="w-full border rounded-lg p-2">

</div>

<div>

<label>

Departure Date

</label>

<input
type="date"
name="departure_date"
required
class="w-full border rounded-lg p-2">

</div>

<div>

<label>

Departure Time

</label>

<input
type="time"
name="departure_time"
required
class="w-full border rounded-lg p-2">

</div>

<div>

<label>

Purpose

</label>

<textarea
name="purpose"
rows="2"
class="w-full border rounded-lg p-2"></textarea>

</div>

<button
class="w-full bg-green-900 hover:bg-green-800 text-white py-3 rounded-lg">

Book this Room

</button>

</div>

</form>

</div>

</div>

@endforeach

</div>

</div>

@endsection
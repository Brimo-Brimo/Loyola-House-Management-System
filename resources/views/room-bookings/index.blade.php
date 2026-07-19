@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

Guest Room Booking

</h1>

<div class="bg-white rounded-xl shadow overflow-x-auto">

<table class="w-full border-collapse">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4">

Room

</th>

@foreach($days as $day)

<th class="text-center">

{{ $day->format('d M') }}

</th>

@endforeach

</tr>

</thead>

<tbody>

@foreach($rooms as $room)

<tr class="border-b">

<td class="p-4">

<strong>

{{ $room->room_number }}

</strong>

<br>

{{ $room->building->name }}

-

{{ $room->wing->name }}

-

{{ $room->floor->name }}

</td>

@foreach($days as $day)

@php

$booked = $room->bookings
->where('status','Approved')
->first(function($booking) use ($day){

return

$day->between(

\Carbon\Carbon::parse($booking->check_in_date),

\Carbon\Carbon::parse($booking->check_out_date)

);

});

@endphp

<td class="text-center">

@if($booked)

<span class="text-red-600 text-2xl">

🔴

</span>

@else

<a

href="{{ route('room-bookings.create',['room'=>$room->id,'date'=>$day->toDateString()]) }}"

class="text-green-600 text-2xl">

🟢

</a>

@endif

</td>

@endforeach

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
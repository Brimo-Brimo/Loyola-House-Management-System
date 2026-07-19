@extends('layouts.admin')

@section('content')

<div class="flex justify-between mb-8">

<h1 class="text-3xl font-bold">

My Meal Bookings

</h1>

<a href="{{ route('meal-bookings.create') }}"

class="bg-green-900 text-white px-6 py-3 rounded">

Book Meals

</a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded mb-6">

{{ session('success') }}

</div>

@endif

<table class="w-full bg-white rounded-xl shadow">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4">

Date

</th>

<th>

Meal

</th>

<th>

Status

</th>

</tr>

</thead>

<tbody>

@foreach($bookings as $booking)

<tr class="border-b">

<td class="p-4">

{{ $booking->meal_date }}

</td>

<td>

{{ $booking->meal }}

</td>

<td>

{{ $booking->status }}

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection
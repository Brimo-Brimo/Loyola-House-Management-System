@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

My Meal Planner (Next 7 Days)

</h1>

<form method="POST"
      action="{{ route('meal-bookings.store') }}">

@csrf

<div class="bg-white rounded-xl shadow">

<table class="w-full">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4 text-left">

Date

</th>

<th class="text-center">

Lunch

</th>

<th class="text-center">

Supper

</th>

</tr>

</thead>

<tbody>

@foreach($days as $day)

<tr class="border-b hover:bg-gray-50">

<td class="p-4">

<strong>{{ $day->format('l') }}</strong>

<br>

{{ $day->format('d M Y') }}

</td>

<td class="text-center">

<input
type="checkbox"

name="meals[{{ $day->toDateString() }}][Lunch]"

@checked(isset($bookings[$day->toDateString().'_Lunch']))

>

</td>

<td class="text-center">

<input
type="checkbox"

name="meals[{{ $day->toDateString() }}][Supper]"

@checked(isset($bookings[$day->toDateString().'_Supper']))

>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="mt-8">

<button
class="bg-green-900 text-white px-8 py-3 rounded-lg hover:bg-green-800">

Save Meal Plan

</button>

</div>

</form>

@endsection
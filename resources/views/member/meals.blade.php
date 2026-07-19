@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

My Meal Booking

</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded mb-6">

{{ session('success') }}

</div>

@endif
<div class="grid grid-cols-3 gap-6 mb-8">

    <div class="bg-green-900 text-white rounded-xl p-6">

        <p class="uppercase text-sm">

            Total Lunch

        </p>

        <h2 class="text-4xl font-bold mt-3">

            {{ $bookings->where('meal','Lunch')->count() }}

        </h2>

    </div>

    <div class="bg-red-700 text-white rounded-xl p-6">

        <p class="uppercase text-sm">

            Total Supper

        </p>

        <h2 class="text-4xl font-bold mt-3">

            
{{ $bookings->where('meal','Supper')->count() }}
        </h2>

    </div>

    <div class="bg-blue-700 text-white rounded-xl p-6">

        <p class="uppercase text-sm">

            Total Meals

        </p>

        <h2 class="text-4xl font-bold mt-3">

            {{ $bookings->count() }}

        </h2>

    </div>

</div>

<form action="{{ route('my-meals.save') }}" method="POST">

@csrf

<table class="w-full bg-white shadow rounded-xl">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4">

Date

</th>

<th>

Lunch

</th>

<th>

Supper

</th>

</tr>

</thead>

<tbody>

@foreach($dates as $date)

<tr class="border-b {{ $date->isToday() ? 'bg-yellow-100 font-bold' : '' }}">

<td class="p-4">

{{ $date->format('l d M Y') }}

</td>

<td class="text-center">

<input
type="checkbox"
name="meals[{{ $date->toDateString() }}][]"
value="Lunch"
{{ $date->isPast() ? 'disabled' : '' }}
@checked(isset($bookings[$date->toDateString().'_Lunch']))
>

</td>

<td class="text-center">

<input
type="checkbox"
name="meals[{{ $date->toDateString() }}][]"
value="Supper"
{{ $date->isPast() ? 'disabled' : '' }}
@checked(isset($bookings[$date->toDateString().'_Supper']))
>

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="mt-8">

<button class="bg-green-900 text-white px-8 py-3 rounded">

Save Meals

</button>

</div>

</form>

@endsection
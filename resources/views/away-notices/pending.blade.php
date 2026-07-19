@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-green-900 mb-8">

Pending Away Notices

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

<th class="p-4">Member</th>

<th>Departure</th>

<th>Return</th>

<th>Destination</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($awayNotices as $notice)

<tr class="border-b">

<td class="p-4">

{{ $notice->user->first_name }}

{{ $notice->user->last_name }}

</td>

<td>

{{ $notice->departure_date }}

@if($notice->departure_time)

<br>

{{ $notice->departure_time }}

@endif

</td>

<td>

{{ $notice->return_date }}

@if($notice->return_time)

<br>

{{ $notice->return_time }}

@endif

</td>

<td>

{{ $notice->destination }}

</td>

<td>

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

Pending

</span>

</td>

<td>

<div class="flex gap-2">

<form
action="{{ route('away-notices.approve',$notice) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="bg-green-700 text-white px-4 py-2 rounded">

Approve

</button>

</form>

<form
action="{{ route('away-notices.reject',$notice) }}"
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

<td colspan="6" class="text-center py-8">

No Pending Away Notices

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
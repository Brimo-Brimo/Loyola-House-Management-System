@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold text-green-900">
            Announcements
        </h1>

        <p class="text-gray-500">
            Community Announcements
        </p>

    </div>

    <a href="{{ route('announcements.create') }}"
       class="bg-green-900 text-white px-5 py-3 rounded-lg hover:bg-green-800">

        + New Announcement

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-5">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow">

<table class="w-full">

<thead class="bg-green-900 text-white">

<tr>

<th class="p-4 text-left">Title</th>

<th class="p-4">Audience</th>

<th class="p-4">Status</th>

<th class="p-4">Start</th>

<th class="p-4">End</th>

<th class="p-4">Actions</th>

</tr>

</thead>

<tbody>

@forelse($announcements as $announcement)

<tr class="border-b">

<td class="p-4">

{{ $announcement->title }}

</td>

<td class="text-center">

{{ $announcement->audience }}

</td>

<td class="text-center">

@if($announcement->status=="Approved")

<span class="text-green-700 font-bold">

Approved

</span>

@elseif($announcement->status=="Rejected")

<span class="text-red-700 font-bold">

Rejected

</span>

@else

<span class="text-yellow-700 font-bold">

Pending

</span>

@endif

</td>

<td class="text-center">

{{ $announcement->start_date }}

</td>

<td class="text-center">

{{ $announcement->end_date }}

</td>

<td class="text-center space-x-2">

<a href="{{ route('announcements.edit',$announcement) }}"
class="bg-blue-600 text-white px-3 py-1 rounded">

Edit

</a>

@if($announcement->status=="Pending")

<form
method="POST"
action="{{ route('announcements.approve',$announcement) }}"
class="inline">

@csrf

<button
class="bg-green-700 text-white px-3 py-1 rounded">

Approve

</button>

</form>

<form
method="POST"
action="{{ route('announcements.reject',$announcement) }}"
class="inline">

@csrf

<button
class="bg-red-700 text-white px-3 py-1 rounded">

Reject

</button>

</form>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center p-8 text-gray-500">

No announcements found.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
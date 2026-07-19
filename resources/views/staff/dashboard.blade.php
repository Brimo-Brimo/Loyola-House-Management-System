@extends('layouts.admin')

@section('title', 'Staff Dashboard')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-green-900">
        Welcome {{ Auth::user()->first_name }}
    </h1>

    <p class="mt-3 text-gray-600">
        Staff Portal
    </p>

</div>

@endsection
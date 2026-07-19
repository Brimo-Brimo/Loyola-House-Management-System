@extends('layouts.admin')

@section('title', 'Community Member Dashboard')

@section('content')

<div class="space-y-8">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold text-green-900">
            Welcome {{ Auth::user()->first_name }}
        </h1>

        <p class="text-gray-600 mt-2">
            Community Member Portal
        </p>

    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="{{ route('my-meals') }}"
           class="bg-green-900 text-white rounded-xl p-6 hover:bg-green-800">

            🍽
            <h2 class="text-xl font-bold mt-3">My Meals</h2>

        </a>

        <a href="{{ route('room.booking') }}"
           class="bg-blue-700 text-white rounded-xl p-6 hover:bg-blue-600">

            🛏
            <h2 class="text-xl font-bold mt-3">Book Guest Room</h2>

        </a>

        <a href="{{ route('away-notices.pending') }}"
           class="bg-orange-600 text-white rounded-xl p-6 hover:bg-orange-500">

            🚶
            <h2 class="text-xl font-bold mt-3">Away Notices</h2>

        </a>

        <a href="#"
           class="bg-purple-700 text-white rounded-xl p-6 hover:bg-purple-600">

            📢
            <h2 class="text-xl font-bold mt-3">Announcements</h2>

        </a>

    </div>

</div>

@endsection
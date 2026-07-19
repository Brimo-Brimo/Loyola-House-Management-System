@extends('layouts.admin')

@section('title','My Dashboard')

@section('content')

<div class="bg-white rounded-xl shadow p-10">

    <h1 class="text-3xl font-bold text-green-900">

        Welcome {{ Auth::user()->first_name }}

    </h1>

    <p class="mt-4 text-gray-600">

        This is your personal Loyola House portal.

    </p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10">

        <a href="#" class="bg-green-700 text-white rounded-xl p-6 text-center">

            🍽<br><br>

            My Meals

        </a>

        <a href="#" class="bg-blue-700 text-white rounded-xl p-6 text-center">

            🛏<br><br>

            Book Guest Room

        </a>

        <a href="#" class="bg-orange-700 text-white rounded-xl p-6 text-center">

            🚶<br><br>

            Away Notice

        </a>

        <a href="#" class="bg-purple-700 text-white rounded-xl p-6 text-center">

            📢<br><br>

            My Announcements

        </a>

    </div>

</div>

@endsection
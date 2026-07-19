@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <!-- Welcome -->

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold text-green-900">

            Welcome,

            {{ Auth::user()->first_name }}

        </h1>

        <p class="text-gray-600 mt-2">

            Loyola House Community Management System

        </p>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Members -->

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-5xl mb-4">

                👥

            </div>

            <h2 class="text-gray-500">

                Community Members

            </h2>

            <p class="text-4xl font-bold text-green-900 mt-2">

                {{ $totalMembers }}

            </p>

        </div>

        <!-- Rooms -->

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-5xl mb-4">

                🚪

            </div>

            <h2 class="text-gray-500">

                Rooms

            </h2>

            <p class="text-4xl font-bold text-green-900 mt-2">

                --

            </p>

        </div>

        <!-- Away -->

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-5xl mb-4">

                ✈️

            </div>

            <h2 class="text-gray-500">

                Away

            </h2>

            <p class="text-4xl font-bold text-green-900 mt-2">

                --

            </p>

        </div>

        <!-- Announcements -->

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-5xl mb-4">

                📢

            </div>

            <h2 class="text-gray-500">

                Announcements

            </h2>

            <p class="text-4xl font-bold text-green-900 mt-2">

                --

            </p>

        </div>

    </div>

</div>

@endsection
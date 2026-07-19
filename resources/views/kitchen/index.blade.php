@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-green-900">
            Kitchen Dashboard
        </h1>

        <p class="text-gray-600 mt-2">
            Meal Summary for {{ now()->format('l, d F Y') }}
        </p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-red-700 text-white rounded-xl shadow-lg p-6">

            <p class="uppercase text-sm opacity-80">
                Lunch Today
            </p>

            <h2 class="text-5xl font-bold mt-3">
                {{ $membersLunch }}
            </h2>

        </div>

        <div class="bg-gray-800 text-white rounded-xl shadow-lg p-6">

            <p class="uppercase text-sm opacity-80">
                Supper Today
            </p>

            <h2 class="text-5xl font-bold mt-3">
                {{ $membersSupper }}
            </h2>

        </div>

        <div class="bg-blue-700 text-white rounded-xl shadow-lg p-6">

            <p class="uppercase text-sm opacity-80">
                Tomorrow Lunch
            </p>

            <h2 class="text-5xl font-bold mt-3">
                {{ $tomorrowLunch }}
            </h2>

        </div>

        <div class="bg-green-700 text-white rounded-xl shadow-lg p-6">

            <p class="uppercase text-sm opacity-80">
                Tomorrow Supper
            </p>

            <h2 class="text-5xl font-bold mt-3">
                {{ $tomorrowSupper }}
            </h2>

        </div>

    </div>

    {{-- Lunch List --}}
    <div class="bg-white rounded-xl shadow-lg">

        <div class="border-b p-6">

            <h2 class="text-2xl font-bold text-red-700">

                Lunch Today

            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">Name</th>

                    <th class="p-4 text-left">Role</th>

                </tr>

            </thead>

            <tbody>

            @forelse($lunchBookings as $booking)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        {{ $booking->user->first_name }}
                        {{ $booking->user->last_name }}

                    </td>

                    <td class="p-4">

                        {{ $booking->user->role->name }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="2"
                        class="text-center py-6 text-gray-500">

                        No lunch bookings.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    {{-- Supper List --}}
    <div class="bg-white rounded-xl shadow-lg">

        <div class="border-b p-6">

            <h2 class="text-2xl font-bold text-gray-800">

                Supper Today

            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">Name</th>

                    <th class="p-4 text-left">Role</th>

                </tr>

            </thead>

            <tbody>

            @forelse($supperBookings as $booking)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        {{ $booking->user->first_name }}
                        {{ $booking->user->last_name }}

                    </td>

                    <td class="p-4">

                        {{ $booking->user->role->name }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="2"
                        class="text-center py-6 text-gray-500">

                        No supper bookings.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
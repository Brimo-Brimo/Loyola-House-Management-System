@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">

                Guests & Retreatants

            </h2>

            <p class="text-gray-500">

                Manage Visitors and Retreatants

            </p>

        </div>

        <a href="{{ route('guests.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Register Guest

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($guests->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No guests have been registered.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Guest</th>

                    <th class="p-4 text-left">Institution</th>

                    <th class="p-4 text-left">Purpose</th>

                    <th class="p-4 text-left">Check In</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($guests as $guest)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 font-medium">

                        {{ $guest->full_name }}

                    </td>

                    <td class="p-4">

                        {{ $guest->institution }}

                    </td>

                    <td class="p-4">

                        {{ $guest->purpose }}

                    </td>

                    <td class="p-4">

                        {{ $guest->check_in }}

                    </td>

                    <td class="p-4">

                        @if($guest->status == 'Checked In')

                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">

                                {{ $guest->status }}

                            </span>

                        @else

                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">

                                {{ $guest->status }}

                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-center">

                        <a href="{{ route('guests.edit', $guest) }}"
                           class="text-green-700 hover:text-green-900">

                            ✏ Edit

                        </a>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    @endif

</div>

@endsection
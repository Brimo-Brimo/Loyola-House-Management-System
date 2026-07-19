@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h2 class="text-3xl font-bold text-green-900">
                Guest Room Allocation
            </h2>

            <p class="text-gray-500">
                Manage Guest Accommodation
            </p>
        </div>

        <a href="{{ route('guest-room-allocations.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Allocate Room

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($allocations->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No guest room allocations found.

        </div>

    @else

    <table class="w-full">

        <thead class="bg-green-900 text-white">

            <tr>

                <th class="p-4 text-left">Guest</th>

                <th class="p-4 text-left">Room</th>

                <th class="p-4 text-left">Building</th>

                <th class="p-4 text-left">From</th>

                <th class="p-4 text-center">Action</th>

            </tr>

        </thead>

        <tbody>

        @foreach($allocations as $allocation)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-4">

                    {{ $allocation->guest->full_name }}

                </td>

                <td class="p-4">

                    {{ $allocation->room->room_number }}

                </td>

                <td class="p-4">

                    {{ $allocation->room->floor->wing->building->name }}

                </td>

                <td class="p-4">

                    {{ $allocation->allocated_from }}

                </td>

                <td class="p-4 text-center">

                    <form action="{{ route('guest-room-allocations.destroy', $allocation) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Check out this guest?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

                            Check Out

                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    @endif

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Room Allocation
            </h2>

            <p class="text-gray-500">
                Allocate Community Members to Rooms
            </p>

        </div>

        <a href="{{ route('room-allocations.create') }}"
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

            No room allocations found.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Member</th>

                    <th class="p-4 text-left">Location</th>

                    <th class="p-4 text-left">Room</th>

                    <th class="p-4 text-left">Allocated From</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Action</th>

                </tr>

            </thead>

            <tbody>

            @foreach($allocations as $allocation)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 font-medium">

                        {{ $allocation->member->first_name }}
                        {{ $allocation->member->other_names }}
                        {{ $allocation->member->last_name }}

                    </td>

                    <td class="p-4">

                        {{ $allocation->room->floor->wing->building->name }}

                        →

                        {{ $allocation->room->floor->wing->name }}

                        →

                        {{ $allocation->room->floor->name }}

                    </td>

                    <td class="p-4 font-semibold">

                        {{ $allocation->room->room_number }}

                    </td>

                    <td class="p-4">

                        {{ $allocation->allocated_from }}

                    </td>

                    <td class="p-4">

                        @if($allocation->active)

                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">

                                Active

                            </span>

                        @else

                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">

                                Ended

                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-center">

                        <form action="{{ route('room-allocations.destroy',$allocation) }}"
                              method="POST"
                              onsubmit="return confirm('End this room allocation?')">

                            @csrf
                            @method('DELETE')

                            <button
                                class="text-red-600 hover:text-red-800">

                                End Allocation

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
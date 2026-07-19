@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Rooms
            </h2>

            <p class="text-gray-500">
                Manage Loyola House Rooms
            </p>

        </div>

        <a href="{{ route('rooms.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Add Room

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif

    @if($rooms->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No rooms have been created yet.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Building</th>

                    <th class="p-4 text-left">Wing</th>

                    <th class="p-4 text-left">Floor</th>

                    <th class="p-4 text-left">Room</th>

                    <th class="p-4 text-left">Type</th>

                    <th class="p-4 text-center">Capacity</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($rooms as $room)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $room->floor->wing->building->name }}
                    </td>

                    <td class="p-4">
                        {{ $room->floor->wing->name }}
                    </td>

                    <td class="p-4">
                        {{ $room->floor->name }}
                    </td>

                    <td class="p-4 font-semibold">
                        {{ $room->room_number }}
                    </td>

                    <td class="p-4">
                        {{ $room->room_type }}
                    </td>

                    <td class="p-4 text-center">
                        {{ $room->capacity }}
                    </td>

                    <td class="p-4">

                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">

                            {{ $room->status }}

                        </span>

                    </td>

                    <td class="p-4 text-center">

                        <a href="{{ route('rooms.edit',$room) }}"
                           class="text-green-700 hover:text-green-900 mr-4">

                            ✏ Edit

                        </a>

                        <form action="{{ route('rooms.destroy',$room) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Delete this room?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:text-red-800">

                                🗑 Delete

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
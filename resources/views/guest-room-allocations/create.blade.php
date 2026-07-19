@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Allocate Guest Room

    </h2>

    <form action="{{ route('guest-room-allocations.store') }}" method="POST">

        @csrf

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Guest

            </label>

            <select name="guest_id"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

                <option value="">Select Guest</option>

                @foreach($guests as $guest)

                    <option value="{{ $guest->id }}">

                        {{ $guest->full_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Room

            </label>

            <select name="room_id"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

                <option value="">Select Room</option>

                @foreach($rooms as $room)

                    <option value="{{ $room->id }}">

                        {{ $room->room_number }}
                        -
                        {{ $room->floor->wing->building->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Allocated From

            </label>

            <input
                type="date"
                name="allocated_from"
                value="{{ date('Y-m-d') }}"
                class="w-full border rounded-lg px-4 py-3"
                required>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('guest-room-allocations.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Allocate Room

            </button>

        </div>

    </form>

</div>

@endsection
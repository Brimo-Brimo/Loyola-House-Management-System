@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Edit Room

    </h2>

    <form action="{{ route('rooms.update',$room) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Floor

            </label>

            <select
                name="floor_id"
                class="w-full border rounded-lg px-4 py-3">

                @foreach($floors as $floor)

                    <option value="{{ $floor->id }}"
                        {{ $floor->id==$room->floor_id ? 'selected' : '' }}>

                        {{ $floor->wing->building->name }}
                        -
                        {{ $floor->wing->name }}
                        -
                        {{ $floor->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Room Number

            </label>

            <input
                type="text"
                name="room_number"
                value="{{ old('room_number',$room->room_number) }}"
                class="w-full border rounded-lg px-4 py-3">

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Room Type

            </label>

            <select
                name="room_type"
                class="w-full border rounded-lg px-4 py-3">

                @foreach([
                    'Resident Room',
                    'Guest Room',
                    'Provincial Room',
                    'Office',
                    'Meeting Room',
                    'Store',
                    'Utility Room'
                ] as $type)

                    <option value="{{ $type }}"
                        {{ $room->room_type==$type ? 'selected' : '' }}>

                        {{ $type }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Capacity

            </label>

            <input
                type="number"
                name="capacity"
                value="{{ old('capacity',$room->capacity) }}"
                class="w-full border rounded-lg px-4 py-3">

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Status

            </label>

            <select
                name="status"
                class="w-full border rounded-lg px-4 py-3">

                @foreach([
                    'Available',
                    'Occupied',
                    'Reserved',
                    'Maintenance'
                ] as $status)

                    <option value="{{ $status }}"
                        {{ $room->status==$status ? 'selected' : '' }}>

                        {{ $status }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Description

            </label>

            <textarea
                name="description"
                rows="3"
                class="w-full border rounded-lg px-4 py-3">{{ old('description',$room->description) }}</textarea>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('rooms.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Update Room

            </button>

        </div>

    </form>

</div>

@endsection
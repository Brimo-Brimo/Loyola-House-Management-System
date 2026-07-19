@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Add Room

    </h2>

    <form action="{{ route('rooms.store') }}" method="POST">

        @csrf

        <!-- Floor -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Floor

            </label>

            <select
                name="floor_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                <option value="">Select Floor</option>

                @foreach($floors as $floor)

                    <option value="{{ $floor->id }}">

                        {{ $floor->wing->building->name }}
                        -
                        {{ $floor->wing->name }}
                        -
                        {{ $floor->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Room Number -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Room Number

            </label>

            <input
                type="text"
                name="room_number"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="A101"
                required>

        </div>

        <!-- Room Type -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Room Type

            </label>

            <select
                name="room_type"
                class="w-full border rounded-lg px-4 py-3">

                <option>Resident Room</option>

                <option>Guest Room</option>

                <option>Provincial Room</option>

                <option>Office</option>

                <option>Meeting Room</option>

                <option>Store</option>

                <option>Utility Room</option>

            </select>

        </div>

        <!-- Capacity -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Capacity

            </label>

            <input
                type="number"
                name="capacity"
                value="1"
                min="1"
                class="w-full border rounded-lg px-4 py-3">

        </div>

        <!-- Status -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Status

            </label>

            <select
                name="status"
                class="w-full border rounded-lg px-4 py-3">

                <option>Available</option>

                <option>Occupied</option>

                <option>Reserved</option>

                <option>Maintenance</option>

            </select>

        </div>

        <!-- Description -->

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Description

            </label>

            <textarea
                name="description"
                rows="3"
                class="w-full border rounded-lg px-4 py-3"></textarea>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('rooms.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                type="submit"
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Room

            </button>

        </div>

    </form>

</div>

@endsection
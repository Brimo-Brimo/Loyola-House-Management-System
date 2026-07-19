@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Allocate Room

    </h2>

    <form action="{{ route('room-allocations.store') }}" method="POST">

        @csrf

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Community Member

            </label>

            <select
                name="community_member_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                <option value="">Select Member</option>

                @foreach($members as $member)

                    <option value="{{ $member->id }}">

                        {{ trim($member->first_name . ' ' . $member->other_names . ' ' . $member->last_name) }}
@if($member->religious_name)
    ({{ $member->religious_name }})
@endif

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Room

            </label>

            <select
                name="room_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                <option value="">Select Room</option>

                @foreach($rooms as $room)

                    <option value="{{ $room->id }}">

                        {{ $room->floor->wing->building->name }}

                        →

                        {{ $room->floor->wing->name }}

                        →

                        {{ $room->floor->name }}

                        →

                        {{ $room->room_number }}
(
{{ $room->building->name ?? $room->floor->wing->building->name }}
-
{{ $room->floor->wing->name }}
-
{{ $room->floor->name }}
)

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Allocation Date

            </label>

            <input
                type="date"
                name="allocated_from"
                value="{{ date('Y-m-d') }}"
                class="w-full border rounded-lg px-4 py-3"
                required>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('room-allocations.index') }}"
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
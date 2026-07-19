@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Add Wing

    </h2>

    <form action="{{ route('wings.store') }}" method="POST">

        @csrf

        <!-- Building -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Building

            </label>

            <select
                name="building_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                <option value="">Select Building</option>

                @foreach($buildings as $building)

                    <option value="{{ $building->id }}">

                        {{ $building->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Wing Name -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Wing Name

            </label>

            <input
                type="text"
                name="name"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="East Wing"
                required>

        </div>

        <!-- Wing Code -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Wing Code

            </label>

            <input
                type="text"
                name="code"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="EW"
                required>

        </div>

        <!-- Description -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Description

            </label>

            <textarea
                name="description"
                rows="3"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="Optional"></textarea>

        </div>

        <!-- Status -->

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Status

            </label>

            <select
                name="active"
                class="w-full border rounded-lg px-4 py-3">

                <option value="1">Active</option>

                <option value="0">Inactive</option>

            </select>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('wings.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                type="submit"
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Wing

            </button>

        </div>

    </form>

</div>

@endsection

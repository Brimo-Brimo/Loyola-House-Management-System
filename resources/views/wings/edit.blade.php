@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Edit Wing

    </h2>

    <form action="{{ route('wings.update', $wing) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Building -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">

                Building

            </label>

            <select
                name="building_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                @foreach($buildings as $building)

                    <option value="{{ $building->id }}"
                        {{ $building->id == $wing->building_id ? 'selected' : '' }}>

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
                value="{{ old('name', $wing->name) }}"
                class="w-full border rounded-lg px-4 py-3"
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
                value="{{ old('code', $wing->code) }}"
                class="w-full border rounded-lg px-4 py-3"
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
                class="w-full border rounded-lg px-4 py-3">{{ old('description', $wing->description) }}</textarea>

        </div>

        <!-- Status -->

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Status

            </label>

            <select
                name="active"
                class="w-full border rounded-lg px-4 py-3">

                <option value="1" {{ $wing->active ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ !$wing->active ? 'selected' : '' }}>
                    Inactive
                </option>

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

                Update Wing

            </button>

        </div>

    </form>

</div>

@endsection
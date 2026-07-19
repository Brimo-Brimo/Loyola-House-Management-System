@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">
        Edit Floor
    </h2>

    <form action="{{ route('floors.update', $floor) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Wing -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Wing
            </label>

            <select
                name="wing_id"
                class="w-full border rounded-lg px-4 py-3">

                @foreach($wings as $wing)

                    <option value="{{ $wing->id }}"
                        {{ $wing->id == $floor->wing_id ? 'selected' : '' }}>

                        {{ $wing->building->name }} - {{ $wing->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Floor Name -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Floor Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $floor->name) }}"
                class="w-full border rounded-lg px-4 py-3">

        </div>

        <!-- Floor Code -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Floor Code
            </label>

            <input
                type="text"
                name="code"
                value="{{ old('code', $floor->code) }}"
                class="w-full border rounded-lg px-4 py-3">

        </div>

        <!-- Description -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Description
            </label>

            <textarea
                name="description"
                rows="3"
                class="w-full border rounded-lg px-4 py-3">{{ old('description', $floor->description) }}</textarea>

        </div>

        <!-- Status -->

        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select
                name="active"
                class="w-full border rounded-lg px-4 py-3">

                <option value="1" {{ $floor->active ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ !$floor->active ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>

        <div class="flex justify-between">

            <a href="{{ route('floors.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                type="submit"
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Update Floor

            </button>

        </div>

    </form>

</div>

@endsection
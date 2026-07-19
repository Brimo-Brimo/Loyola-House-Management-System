@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">
        Add Floor
    </h2>

    <form action="{{ route('floors.store') }}" method="POST">

        @csrf

        <!-- Wing -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Wing
            </label>

            <select
                name="wing_id"
                class="w-full border rounded-lg px-4 py-3"
                required>

                <option value="">Select Wing</option>

                @foreach($wings as $wing)

                    <option value="{{ $wing->id }}">
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
                class="w-full border rounded-lg px-4 py-3"
                placeholder="Ground Floor"
                required>

        </div>

        <!-- Floor Code -->

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Floor Code
            </label>

            <input
                type="text"
                name="code"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="GF"
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
                class="w-full border rounded-lg px-4 py-3"></textarea>

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

            <a href="{{ route('floors.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                type="submit"
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Floor

            </button>

        </div>

    </form>

</div>

@endsection
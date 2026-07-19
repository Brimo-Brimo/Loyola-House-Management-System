@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-2">
        Edit Building
    </h2>

    <p class="text-gray-500 mb-8">
        Create a new building within the Loyola House Community.
    </p>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <<form action="{{ route('buildings.update', $building) }}" method="POST">

    @csrf
    @method('PUT')

        <!-- Building Name -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Building Name
            </label>

            <input
                type="text"
                name="name"
               value="{{ old('name', $building->name) }}"
                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none"
                placeholder="Main Block">

        </div>

        <!-- Building Code -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Building Code
            </label>

            <input
                type="text"
                name="code"
                value="{{ old('code', $building->code) }}"
                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none"
                placeholder="MB">

        </div>

        <!-- Building Type -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Building Type
            </label>

            <select
                name="type"
                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none">

                <option value="Residence">Residence</option>
                <option value="Guest House">Guest House</option>
                <option value="Administration">Administration</option>
                <option value="Office">Office</option>
                <option value="Other">Other</option>

            </select>

        </div>

        <!-- Number of Floors -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Number of Floors
            </label>

            <input
                type="number"
                name="floors"
                value="{{ old('floors', $building->floors) }}"
                min="1"
                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none">

        </div>

        <!-- Description -->
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Description
            </label>

            <textarea
    name="description"
    rows="4"
    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none">{{ old('description', $building->description) }}</textarea>

        </div>

        <!-- Status -->
        <div class="mb-8">

            <label class="block mb-2 font-semibold text-gray-700">
                Status
            </label>

            <select
                name="type"
                class="w-full border rounded-lg px-4 py-3">

                <option value="Residence" {{ $building->type == 'Residence' ? 'selected' : '' }}>Residence</option>

                <option value="Guest House" {{ $building->type == 'Guest House' ? 'selected' : '' }}>Guest House</option>

                <option value="Administration" {{ $building->type == 'Administration' ? 'selected' : '' }}>Administration</option>

                <option value="Office" {{ $building->type == 'Office' ? 'selected' : '' }}>Office</option>

                <option value="Other" {{ $building->type == 'Other' ? 'selected' : '' }}>Other</option>

            </select>

        </div>

        <!-- Buttons -->
        <div class="flex gap-4">

            <button
                type="submit"
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Building

            </button>

            <a href="{{ route('buildings.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection